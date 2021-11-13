<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  
  <a class="navbar-brand px-5" href={{ route('post.index') }}>Tweet</a>
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" style="justify-content: space-between" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link {{request() -> is('/') ? 'active' : ''}}" href={{ route('post.create')}}>Create post</a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{request() -> is('/') ? 'active' : ''}}" href={{ route('contact.create')}}>Contact</a>
      </li>
    </ul>
    
    <ul class="navbar-nav mx-2">
      @auth
      <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
          logged in as: {{ auth()->user()->email }}
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
          <li><a class="dropdown-item" href="{{ route('edit.profil', auth()->user()->id) }}">Edit Profil</a></li>
          <li><a class="dropdown-item" href="{{ route('edit.password', auth()->user()->id) }}">Edit Password</a></li>
          <li><a class="dropdown-item" style="background: none">
            <form action={{ route('auth.logout') }} method="POST">
              @csrf
              <button type="submit" class="btn btn-success">
                {{ __('Logout') }}
              </button>
              </form>
            </a>
          </li>
        </ul>
      </div>
      @else
      <li class="nav-item">
        <a class="nav-link {{request() -> is('/') ? 'active' : ''}}" href={{ route('auth.login')}}>{{ __('Login') }}</a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{request() -> is('/') ? 'active' : ''}}" href={{ route('auth.register')}}>{{ __('Register') }}</a>
      </li>
      @endauth
    </ul>
  </div>
</nav>
