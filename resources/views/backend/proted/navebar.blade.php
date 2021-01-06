  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
    <div class="container-fluid">
      <div class="navbar-wrapper">
        <a class="navbar-brand" href="javascript:;"></a>
      </div>
      <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
        <span class="sr-only">Toggle navigation</span>
        <span class="navbar-toggler-icon icon-bar"></span>
        <span class="navbar-toggler-icon icon-bar"></span>
        <span class="navbar-toggler-icon icon-bar"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end">

        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="javascript:;">
              <i class="material-icons">dashboard</i>
              <p class="d-lg-none d-md-block">
                Stats
              </p>
            </a>
          </li>
          @php

          @endphp
          <li class="nav-item dropdown">
            <a class="nav-link" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="material-icons">notifications</i>
              <span class="notification">{{App\Models\Order::total()}}</span>
              <p class="d-lg-none d-md-block">
                Some Actions
              </p>
            </a>




            <div class="dropdown-menu dropdown-menu-right">

              <a  class="dropdown-item" href="{{ asset('admin/order') }}">{{App\Models\Order::total1()}}</a>


          <li class="nav-item active">
            <li class="nav-item active dropdown">
                 <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    <i class="fa fa-user"style="font-size:15px;"> </i>{{ Auth::user()->name }}<span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a  class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                      <i class="fa fa-sign-out"style="font-size:15px;"> </i>  {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>






        </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->
