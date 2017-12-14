<?php

namespace App\Http\Controllers;

use net\authorize\api\controller as AnetController;
use net\authorize\api\contract\v1 as AnetAPI;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;
use App\Product;
use App\Order;
use App\Cart;
use Session;
use Auth;
use DB;


define("AUTHORIZENET_LOG_FILE", "phplog");

class ProductController extends Controller
{
    public function getIndex(){
    	$products = Product::paginate(12);
    	return view('shop.index',['products'=>$products]);
    }

    public function getAddToCart(Request $request,$id){
    	$product = Product::find($id);
    	$oldCart = Session::has('cart') ? Session::get('cart') : null;
    	$cart = new Cart($oldCart);
    	$cart->add($product,$product->id);

    	$request->session()->put('cart',$cart);
    	return redirect()->route('product.index');
    }

    public function getCart(){
        if(!Session::has('cart')){
            return view('shop.shoping-cart');
        }

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('shop.shoping-cart',['products'=>$cart->items,'totalPrice'=>$cart->totalPrice]);
    }

    public function getCheckout(){
        if(!Session::has('cart')){
            return view('shop.shoping-cart');
        }

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;
        return view('shop.checkout',['total'=>$total]);
    }

    public function postCheckout(Request $request){
        if(!Session::has('cart')){
            return redirect()->route('product.shoping-cart');
        }

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        // Common setup for API credentials
        $merchantAuthentication = new AnetAPI\MerchantAuthenticationType();
        $merchantAuthentication->setName("4s55wUMtE");
        $merchantAuthentication->setTransactionKey("9u2A4W2yTQt69cMC");

        try {
          // Create the payment data for a credit card
          $creditCard = new AnetAPI\CreditCardType();
          $creditCard->setCardNumber($request->input('card-number'));
          $creditCard->setExpirationDate("2038-12");
          $creditCard->setCardCode($request->input('card-code'));
          $paymentOne = new AnetAPI\PaymentType();
          $paymentOne->setCreditCard($creditCard);

          // Create a transaction
          $transactionRequestType = new AnetAPI\TransactionRequestType();
          $transactionRequestType->setTransactionType( "authCaptureTransaction");
          $transactionRequestType->setAmount($cart->totalPrice);
          $transactionRequestType->setPayment($paymentOne);

          $authorizerequest = new AnetAPI\CreateTransactionRequest();
          $authorizerequest->setMerchantAuthentication($merchantAuthentication);
          $authorizerequest->setTransactionRequest( $transactionRequestType);
          $controller = new AnetController\CreateTransactionController($authorizerequest);
          $response = $controller->executeWithApiResponse( \net\authorize\api\constants\ANetEnvironment::SANDBOX);

          $tresponse = $response->getTransactionResponse();


        } catch (Exception $e) {
          return redirect()->route('checkout')->with('error',$e->getMessage());
        }

        $order =  new Order();
        $order->user_id = Auth::user()->id;
        $order->cart = serialize($cart);
        $order->name = $request->input('cardholdername');
        $order->address = $request->input('address');
        $order->payment_id = $tresponse->getTransId();
        $order->save();

        Session::forget('cart');
        return redirect()->route('product.index')->with('success','Successfuly purchased products');
    }

    public function getSingle($id){
        $product = Product::find($id);

        return view('shop.single')->with('product',$product);
    }

}
