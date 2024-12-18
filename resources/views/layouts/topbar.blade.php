<header id="page-topbar">
    <div class="navbar-header pb-3 pt-3">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
               
                <h3 class="forgot p-3">RCFI </h3>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn" aria-label="Vertical Menu Button">
                <i class="mdi mdi-menu"></i>
            </button>

       
        </div>

        <div class="d-flex">
         

            <div class="dropdown d-inline-block d-lg-none ms-2">
                <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" aria-label="notification icon">
                    <i class="mdi mdi-magnify"></i>
                </button>
            
            </div>

          
            <div class="dropdown d-none d-lg-inline-block">
             
                <button type="button" class="btn header-item noti-icon waves-effect" data-bs-toggle="fullscreen" aria-label="fullscreen button">
                    <i class="mdi mdi-fullscreen"></i>
                </button>
            </div>

     

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" aria-label="user dropdown">
                 
                    <img class="rounded-circle header-profile-user" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT6WbkrAqlGF2Xzmb-prbginrkDNrv6zT05ID6KEjTbP2F-gn9w-wg1L3_NiSeXLq3HsqI&usqp=CAU" alt="Header Avatar"><br>
                    <span style="font-size:10px;font-weight:bolder">{{ Auth::user()->designation }} : {{ Auth::user()->name }}</span>
               
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                
                    <a class="dropdown-item text-danger" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"><i class="bx bx-power-off font-size-17 align-middle me-1 text-danger"></i>
                        Logout </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>

       

        </div>
    </div>
</header>
