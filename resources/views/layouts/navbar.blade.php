<nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
  <a class="navbar-brand" href="index.php">
      <img src="imgs/384999.png" width="30" height="30" class="d-inline-block align-top" alt="">
   Shop
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav" >
      <ul class="navbar-nav">
      
      </ul>
    </div>
    <a href="{{route('cart')}}"> <img src="imgs/4379876.png" height="40px" width="40px" alt="cart"></a>
   @auth
   <div class="dropdown mx-4 ">
    <button class="btn btn-secondary dropdown-toggle " type="button" data-bs-toggle="dropdown"
      aria-expanded="false">
      {{ Auth::user()->name }}
    </button>

    <ul class="dropdown-menu ">
      <li><a class="dropdown-item " href="{{ route('profile.edit') }}">Profile</a></li>
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        


        <li><a class="dropdown-item" href="{{ route('logout') }}"
            onclick="event.preventDefault();
  this.closest('form').submit();">Logout</a></li>

      </form>
    </ul>
  </div>  
   @endauth

   @guest
       
   <a href="{{route('login')}}" type="button" class="btn btn-primary mx-2" >Login</a>
   <a href="{{route('register')}}" type="button" class="btn btn-warning mx-2" >sign up</a>
   @endguest
  </nav>
  