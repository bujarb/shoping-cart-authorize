<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{route('product.index')}}">Brand</a>
    </div>

     <div class="col-md-3 col-md-offset-4 aaa clearfix">
          <div class="input-group">
      <input type="text" class="form-control" placeholder="Search for...">
      <span class="input-group-btn">
        <button class="btn btn-default" type="button">Go!</button>
      </span>
    </div><!-- /input-group -->
     </div>
      </form>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="{{route('product.shoppingCart')}}"><i class="fa fa-shopping-cart" aria-hidden="true"></i>
 Shoping Cart <span class="badge">{{Session::has('cart') ? Session::get('cart')->totalQty : ''}}</span></a></li>
        
            @if(!Auth::check())
              <li><a href="{{route('login')}}"><i class="fa fa-user" aria-hidden="true"></i>
 Sign In</a></li>
            @endif
            @if(Auth::check())
            <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user" aria-hidden="true"></i>
 {{Auth::user()->email}} <span class="caret"></span></a>
          <ul class="dropdown-menu">
            @if(Route::currentRouteName() != 'user.profile')
              <li><a href="{{route('user.profile')}}">Profile</a></li>
            @endif
            <li><a href="{{route('product.add')}}">Add Product</a></li>
            <li><a href="{{route('user.logout')}}">Logout</a></li>
            @endif
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>