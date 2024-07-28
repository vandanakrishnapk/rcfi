<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
            

                <li>
                    <a href="{{ route('admin.home') }}" class="waves-effect">
                        <i class="ti-home"></i><span class="badge rounded-pill bg-primary float-end">1</span>
                        <span>Dashboard</span>
                    </a>
                </li>

               

                <li>
                    <a href="#" class="has-arrow waves-effect">
                        <i class="ti-layout"></i>
                        <span>Configuration</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        
                        <li>
                            <a href="{{ route('data_table') }}" class="has-arrow">User</a>
                            
                        </li>
                        <li>
                            <a href="#" class="has-arrow">Donor</a>
                            
                        </li>
                    </ul>
                </li>



        

      

    

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->