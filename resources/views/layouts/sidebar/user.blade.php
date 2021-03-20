
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="{{ asset('assets/dashboard/images/avatars/svg/001-man.svg') }}" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
          <a href="/home/auction-manager" class="d-block">{{ Auth::user()->name }}<br>
            User 🌐</br>
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

            <li class="nav-header"></li>
            <li class="nav-item">
              <router-link to="/marketplace" class="nav-link">
                <i class="nav-icon far fa-calendar-alt"></i>
                <p>
                  Marketplace
                  {{-- <span class="badge badge-info right">2</span> --}}
                </p>
              </router-link>
            </li>



            <li class="nav-header"></li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-folder"></i>
                <p>
                  Organization
                  <i class="fas fa-angle-left right"></i>
                  {{-- <span class="badge badge-info right">6</span> --}}
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <router-link to="/add-organization" class="nav-link">
                    <i class="fas fa-folder-plus"></i>
                    <p>Add New Organization</p>
                  </router-link>
                </li>
                <li class="nav-item">
                  <router-link to="/manage-organization" class="nav-link">
                    <i class="fas fa-folder-plus"></i>
                    <p>Manage Organization</p>
                  </router-link>
                </li>
                <li class="nav-item">
                  <router-link to="/manage-access" class="nav-link">
                    <i class="fas fa-folder-plus"></i>
                    <p>Manage User Access</p>
                  </router-link>
                </li>
              </ul>
            </li>

            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-folder"></i>
                <p>
                  Employees
                  <i class="fas fa-angle-left right"></i>
                  {{-- <span class="badge badge-info right">6</span> --}}
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <router-link to="/add-employee" class="nav-link">
                    <i class="fas fa-folder-plus"></i>
                    <p>Add New Employee</p>
                  </router-link>
                </li>
                <li class="nav-item">
                  <router-link to="/manage-employees" class="nav-link">
                    <i class="fas fa-folder-plus"></i>
                    <p>Manage Employees</p>
                  </router-link>
                </li>
                <li class="nav-item">
                  <router-link to="/view-employee-allocation" class="nav-link">
                    <i class="fas fa-folder-plus"></i>
                    <p>Employee Allocation</p>
                  </router-link>
                </li>
              </ul>
            </li>

            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-folder"></i>
                <p>
                  Requirements
                  <i class="fas fa-angle-left right"></i>
                  {{-- <span class="badge badge-info right">6</span> --}}
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <router-link to="/add-requirement" class="nav-link">
                    <i class="fas fa-folder-plus"></i>
                    <p>Add New Requirement</p>
                  </router-link>
                </li>
                <li class="nav-item">
                  <router-link to="/manage-requirements" class="nav-link">
                    <i class="fas fa-folder-open"></i>
                    <p>Manage Requirments</p>
                  </router-link>
                </li>
                <!-- <li class="nav-item">
                  <router-link to="/requirement-details" class="nav-link">
                    <i class="fas fa-folder-open"></i>
                    <p>Requirement Details</p>
                  </router-link>
                </li> -->
              </ul>
            </li>

            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-folder"></i>
                <p>
                  Availability
                  <i class="fas fa-angle-left right"></i>
                  {{-- <span class="badge badge-info right">6</span> --}}
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <router-link to="/add-availability" class="nav-link">
                    <i class="fas fa-folder-plus"></i>
                    <p>Add New Availability</p>
                  </router-link>
                </li>
                <li class="nav-item">
                  <router-link to="/manage-availability" class="nav-link">
                    <i class="fas fa-folder-open"></i>
                    <p>Manage Availability</p>
                  </router-link>
                </li>
                <!-- <li class="nav-item">
                  <router-link to="/availability-details" class="nav-link">
                    <i class="fas fa-folder-open"></i>
                    <p>Availability Details</p>
                  </router-link>
                </li> -->
              </ul>
            </li>

  
            
            <li class="nav-header"></li>
            <li class="nav-item">
              <router-link to="/calendar" class="nav-link">
                <i class="nav-icon far fa-calendar-alt"></i>
                <p>
                  Calendar
                  {{-- <span class="badge badge-info right">OLD DATA</span> --}}
                </p>
              </router-link>
            </li>
  
  
            <li class="nav-header"></li>
            <li class="nav-item">
              <router-link to="/settings" class="nav-link">
                <i class="nav-icon fas fa-cogs"></i>
                <p>
                  Settings
                  {{-- <span class="badge badge-info right">2</span> --}}
                </p>
              </router-link>
            </li>

            <li class="nav-header"></li>
          <li class="nav-item">
            <router-link to="/support-ticket" class="nav-link">
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
  
  
