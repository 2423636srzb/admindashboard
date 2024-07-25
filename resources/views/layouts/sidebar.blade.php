<aside class="main-sidebar sidebar-light-gray-dark elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="">
        </div>
        <div class="info">
          <div class="px-4">
            <div class="font-weight-bold text-white">{{ Auth::user()->name ?? '' }}</div>
            <div class="text-muted">{{ Auth::user()->email  ?? ''}}</div>
        </div>
        </div>
      </div> --}}
    

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
                <a href="{{route('admin.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard</p>
                </a>
              </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                User Management
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.user.index')}}" class="nav-link">
                  <p>User</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.roles.index')}}" class="nav-link">
                 
                  <p>Role</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.permissions.index')}}" class="nav-link">
                  <p>Permission</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-file" ></i>
              <p>
                Content
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              {{-- <li class="nav-item">
                <a href="{{route('admin.contents.index')}}" class="nav-link">
                  <p>Content</p>
                </a>
              </li> --}}
              <li class="nav-item">
                <a href="{{route('admin.posts.index')}}" class="nav-link">
                  <p>Post</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.products.index')}}" class="nav-link">
                  <p>Product</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.categories.index')}}" class="nav-link">  
                  <p>Categories</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.tags.index')}}" class="nav-link">  
                  <p>Tags</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                General Setting
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.site.setting.index')}}" class="nav-link">
                  <p>Site Setting</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.smtp.setting.index')}}" class="nav-link">
                  <p>SMTP Setting</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.email.create')}}" class="nav-link">
                  <p>Test Mail</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-key"></i>
              <p>
               API Keys
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.api_keys.create')}}" class="nav-link">
                  <p>Create API Keys</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.api_keys.index')}}" class="nav-link">
                  <p>Manage API Keys</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-flag"></i>
              <p>
                Reports
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.activity.report')}}" class="nav-link">
                  <p>User activity logs</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/forms/advanced.html" class="nav-link">
                  <p>Content performance</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('log-viewer')}}" class="nav-link">
                  <p>System logs</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-file" ></i>
              <p>
                File Management
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('files.index')}}" class="nav-link">
                  <p>Manage Files</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-bell" ></i>
              <p>
                Notification
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.notifications')}}" class="nav-link">
                  <p>New User</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.criticalError')}}" class="nav-link">
                  <p>Critical System Error</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.event.index')}}" class="nav-link">
                  <p>Create Event Mail</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-store" ></i>
              <p>
                Backups
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <p>Backups
                  </p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="pages/forms/advanced.html" class="nav-link">
              <form method="POST" action="{{ route('logout') }}" class="d-inline">
                @csrf
                
                <button type="submit" class="nav-link"><i class="nav-icon fas fa-sign-out"></i>LogOut</button>
            </form>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>