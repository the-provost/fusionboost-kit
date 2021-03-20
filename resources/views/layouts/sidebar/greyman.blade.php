
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="{{ asset('assets/dashboard/images/avatars/svg/001-man.svg') }}" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
          <a href="/home/auction-manager" class="d-block">{{ Auth::user()->name }}<br>
            Auction Manager 🌐</br>
          </div>
        </div>
  
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column nav-flat nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            <li class="nav-item">
              <router-link to="/home" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                  <i class="right fas fa-th"></i>
                </p>
              </router-link>
            </li>
            
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-folder"></i>
                <p>
                  Lots
                  <i class="fas fa-angle-left right"></i>
                  {{-- <span class="badge badge-info right">6</span> --}}
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <router-link to="/home/auction-manager/add-new-lot" class="nav-link">
                    <i class="fas fa-folder-plus"></i>
                    <p>Add New Lot</p>
                  </router-link>
                </li>
                
              </ul>
            </li>

            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-folder"></i>
                <p>
                  Users
                  <i class="fas fa-angle-left right"></i>
                  {{-- <span class="badge badge-info right">6</span> --}}
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <router-link to="/home/auction-manager/add-new-seller" class="nav-link">
                    <i class="fas fa-folder-plus"></i>
                    <p>Add New Seller</p>
                  </router-link>
                </li>
                <li class="nav-item">
                  <router-link to="/home/auction-manager/seller-list" class="nav-link">
                    <i class="fas fa-folder-open"></i>
                    <p>Seller List</p>
                  </router-link>
                </li>
                <li class="nav-item">
                  <router-link to="/home/auction-manager/buyer-list" class="nav-link">
                    <i class="fas fa-folder-open"></i>
                    <p>Buyer List</p>
                  </router-link>
                </li>
                <li class="nav-item">
                  <router-link to="/home/auction-manager/manage-user-access" class="nav-link">
                    <i class="fas fa-folder-open"></i>
                    <p>Manage User Access</p>
                  </router-link>
                </li>
              </ul>
            </li>

            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-folder"></i>
                <p>
                  Auctions
                  <i class="fas fa-angle-left right"></i>
                  {{-- <span class="badge badge-info right">6</span> --}}
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <router-link to="/home/auction-manager/create-auction" class="nav-link">
                    <i class="fas fa-folder-open"></i>
                    <p>Create Auction</p>
                  </router-link>
                </li>
                <li class="nav-item">
                  <router-link to="/home/auction-manager/add-lots" class="nav-link">
                    <i class="fas fa-bezier-curve"></i>
                    <p>Add Lots to Auction</p>
                  </router-link>
                </li>
                <li class="nav-item">
                  <router-link to="/home/auction-manager/current-auctions" class="nav-link">
                    <i class="fas fa-bezier-curve"></i>
                    <p>Current Auctions</p>
                  </router-link>
                </li>
                <li class="nav-item">
                  <router-link to="/home/auction-manager/past-auctions" class="nav-link">
                    <i class="fas fa-bezier-curve"></i>
                    <p>Past Auctions</p>
                  </router-link>
                </li>
                <li class="nav-item">
                  <router-link to="/home/auction-manager/upcoming-auctions" class="nav-link">
                    <i class="fas fa-bezier-curve"></i>
                    <p>Upcoming Auctions</p>
                  </router-link>
                </li>
              </ul>
            </li>


  
            <li class="nav-header"></li>
            <li class="nav-item">
              <router-link to="/home/auction-manager/calendar" class="nav-link">
                <i class="nav-icon far fa-calendar-alt"></i>
                <p>
                  Calendar
                  {{-- <span class="badge badge-info right">2</span> --}}
                </p>
              </router-link>
            </li>

            <li class="nav-header"></li>
            <li class="nav-item">
              <router-link to="/home/auction-manager/old-data-entry" class="nav-link">
                <i class="nav-icon far fa-calendar-alt"></i>
                <p>
                  Enter Past Records
                  {{-- <span class="badge badge-info right">OLD DATA</span> --}}
                </p>
              </router-link>
            </li>
  
  
            <li class="nav-header"></li>
            <li class="nav-item">
              <router-link to="/home/auction-manager/settings" class="nav-link">
                <i class="nav-icon fas fa-cogs"></i>
                <p>
                  Settings
                  {{-- <span class="badge badge-info right">2</span> --}}
                </p>
              </router-link>
            </li>

            <li class="nav-header"></li>
          <li class="nav-item">
            <router-link to="/home/auction-manager/support-ticket" class="nav-link">
              <i class="nav-icon fas fa-receipt"></i>
              <p>
                Support Tickets
                {{-- <span class="badge badge-info right">2</span> --}}
              </p>
            </router-link>
          </li>
            
  
  
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
  
  
