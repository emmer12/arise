<div class="nav-bar d-none d-sm-block d-md-block">
    <div class="container">
      <div class="row">
        <div class="left col-md-4">
          <a href='/' class="wow slideInLeft">
            <img src="/images/logo.png" style="height:50px;width:80px;position:relative;margin-top: 10px;" alt="" class=""/>
          </a>
        </div>

      <div class="right col-md-8" >
          <ul>
              <li class="active"><a href="/">Home</a></li>
              <li><a href="/about">About</a></li>
              <li><a href="/connect">Connect</a></li>
              <li><a href="#">Mindshift</a></li>
              <li><a href="#">Resources</a></li>
              @auth
               <a href="/dashboard" style="color:white;text-decoration:none">
                <i class="fa fa-user-circle-o" aria-hidden="true"></i> {{Auth::user()->nickname}}
               </a>
              @endauth
              @guest
                <a class="c-btn" href="/register">Join our community</a>
              @endguest
            </ul>
          </div>
      </div>
    </div>
</div>

<div class="d-sm-none" style="height: 70px;">
<div class=" nav-bar-mobile d-sm-none">

    <div class="container">
      <div class="row">
        <div class="left col-xs-6">
          <a href='/'>
            <img src="/images/logo.png" style="height:32px;width:50px;position:relative;margin-top:15px;" alt="" class=""/>
          </a>
        </div>

         <div class="col-xs-6">
             <div class="right" id="bar">
              <span></span>
              <span></span>
              <span></span>
             </div>
          </div>
      </div>
    </div>
  </div>
    <div class="drop">
      <ul>
        <li class="active"><a href="/">Home</a></li>
        <li><a href="/about">About</a></li>
        <li><a href="/connect">Connect</a></li>
        <li><a href="#">Mindshift</a></li>
        <li><a href="#">Resources</a></li>
        @auth

        
        <a href="/dashboard" style="color:white;text-decoration:none">
         <i class="fa fa-user-circle-o" aria-hidden="true"></i> {{Auth::user()->name}}
        </a>
       @endauth
       @guest
       <a href="/register"><button class="c-btn">Join our community</button></a>
       @endguest
        
      </ul>
    </div>
</div>
