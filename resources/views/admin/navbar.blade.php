<nav class="navbar navbar-expand-lg navbar-dark bg-dark justify-content-end px-4">

    
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
   
   
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
  <a href="{{route('login')}}" type="button" class="btn btn-primary" >Login</a>
  <a href="{{route('register')}}" type="button" class="btn btn-warning m-4" >sign up</a>

  
   @endguest

  </nav>
  