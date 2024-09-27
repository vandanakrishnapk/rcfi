<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->


            <ul class="metismenu list-unstyled" id="side-menu">
                

                <li>
                    <a href="{{ route('user.home') }}" class="waves-effect">
                        <i class="bi bi-houses-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>            

              
                <!--Application -->

                <li>
                    <a href="{{ route('user.userProject')}}" class=" waves-effect">
                        <i class="bi bi-folder-fill"></i>
                        <span>Projects</span>
                    </a>
                </li>




                {{-- <li>
                    <a href="#" class=" waves-effect">
                        <i class="ti-archive"></i>
                        <span> Authentication </span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="pages-login">Login 1</a></li>
                        <li><a href="pages-login-2">Login 2</a></li>
                        <li><a href="pages-register">Register 1</a></li>
                        <li><a href="pages-register-2">Register 2</a></li>
                        <li><a href="pages-recoverpw">Recover Password 1</a></li>
                        <li><a href="pages-recoverpw-2">Recover Password 2</a></li>
                        <li><a href="pages-lock-screen">Lock Screen 1</a></li>
                        <li><a href="pages-lock-screen-2">Lock Screen 2</a></li>
                    </ul>
                </li> --}}

                {{-- <li>
                    <a href="#" class=" waves-effect">
                        <i class="ti-support"></i>
                        <span>  Extra Pages  </span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="pages-starter">Starter Page</a></li>
                        <li><a href="pages-404">Error 404</a></li>
                        <li><a href="pages-500">Error 500</a></li>
                        <li><a href="pages-maintenance">Maintenance</a></li>
                        <li><a href="pages-comingsoon">Coming Soon</a></li>
                    </ul>
                </li> --}}

                {{-- <li>
                    <a href="#" class=" waves-effect">
                        <i class="ti-more"></i>
                        <span>Multi Level</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="#">Level 1.1</a></li>
                        <li><a href="#" class="">Level 1.2</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="#">Level 2.1</a></li>
                                <li><a href="#">Level 2.2</a></li>
                            </ul>
                        </li>
                    </ul>
                </li> --}}

            </ul>
            {{-- <ul class="metismenu list-unstyled" id="side-menu">
            

                <li>
                    <a href="{{ route('admin.home') }}" class="waves-effect d-flex">
                        <i class="ti-home"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

               

                <li>
                    <a href="#" class=" waves-effect d-flex">
                        <i class="ti-layout"></i>
                        <span>Configuration</span>
                    </a>
                    <ul class="sub-menu text-start" aria-expanded="true">
                      
                <li>
                            
                            <a href="{{ route('data_table') }}" class="waves-effect mx-2">User</a>
                            
                </li>
                <li>
                    <a href="#" class="waves-effect mx-2">
                        
                        <span>Donor</span>
                    </a>
                    <ul class="sub-menu mx-2" aria-expanded="false">
                    <li><a href="#" data-bs-toggle="modal" data-bs-target="#addPartnerModal">Add donor</a></li>
                        <li><a href="{{ route('donor.view') }}">view donor</a></li>
                       
                    </ul>
                </li>
               </li>

                    </ul>
               --}}
        </div>
        <!-- Sidebar -->
    </div>
</div>