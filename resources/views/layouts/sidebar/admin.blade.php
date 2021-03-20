
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="{{ asset('assets/dashboard/images/avatars/svg/001-man.svg') }}" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
          <a href="/admin/home" class="d-block">{{ Auth::user()->name }}<br>
            Admin 🌐</br>
          </a>
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
            
         

            <!-- <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-folder"></i>
                <p>
                  Users
                  <i class="fas fa-angle-left right"></i>
                  {{-- <span class="badge badge-info right">6</span> --}}
                </p>
              </a>
             
                <li class="nav-item">
                  <router-link to="/home/auction-manager/manage-user-access" class="nav-link">
                    <i class="fas fa-folder-open"></i>
                    <p>Manage User Access</p>
                  </router-link>
                </li>
              </ul>
            </li> -->

  
            <li class="nav-header"></li>
            <li class="nav-item">
              <router-link to="/admin/modify-user-types" class="nav-link">
                <i class="nav-icon far fa-calendar-alt"></i>
                <p>
                  Manage User Access
                </p>
              </router-link>
            </li>

            <li class="nav-header"></li>
            <li class="nav-item">
              <router-link to="/admin/manage-categories" class="nav-link">
                <i class="nav-icon far fa-calendar-alt"></i>
                <p>
                  Manage Categories
                  {{-- <span class="badge badge-info right">OLD DATA</span> --}}
                </p>
              </router-link>
            </li>

            <li class="nav-header"></li>
            <li class="nav-item">
              <router-link to="/admin/manage-types" class="nav-link">
                <i class="nav-icon far fa-calendar-alt"></i>
                <p>
                  Manage Types
                  {{-- <span class="badge badge-info right">OLD DATA</span> --}}
                </p>
              </router-link>
            </li>

            <li class="nav-header"></li>
            <li class="nav-item">
              <router-link to="/admin/manage-organizations" class="nav-link">
                <i class="nav-icon far fa-calendar-alt"></i>
                <p>
                  Manage Organizations
                  {{-- <span class="badge badge-info right"></span> --}}
                </p>
              </router-link>
            </li>
  
  
            <li class="nav-header"></li>
            <li class="nav-item">
              <router-link to="/admin/settings" class="nav-link">
                <i class="nav-icon fas fa-cogs"></i>
                <p>
                  Settings
                  {{-- <span class="badge badge-info right">2</span> --}}
                </p>
              </router-link>
            </li>

            <li class="nav-header"></li>
          <li class="nav-item">
            <router-link to="/admin/support-ticket" class="nav-link">
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
  
  
