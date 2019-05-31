{{-- resouces/views/navbar.blade.php --}}
 
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
 
    ...    
 
    <!-- メニュー -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- 左寄せメニュー -->
 
      ...
 
      <!-- 右寄せメニュー -->
      <ul class="navbar-nav">
        {{-- ① --}}
        @guest
          <!-- ログインしていない時のメニュー -->
          <li class="nav-item">
            {{-- ②  --}}
            <a class="nav-link" href="{{ route('login') }}">Login</a>
          </li>
          <li class="nav-item">
            {{-- ③ --}}
            <a class="nav-link" href="{{ route('register') }}">Register</a>
          </li>
        @else
          <!-- ログインしている時のメニュー -->
          <li class="nav-item">
            {{-- ④ --}}
            <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}">Home</a>
          </li>
 
          <!-- ドロップダウンメニュー -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              {{-- ⑤ --}}
              {{ Auth::user()->name }} <span class="caret"></span>
            </a>
 
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              {{-- ⑥ --}}
              <a class="dropdown-item" href="#"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
              >
                Logout
              </a>
 
              {{-- ⑦ --}}
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
            </div>
          </li>
        @endguest
      </ul>
    </div>
  </div>
</nav>