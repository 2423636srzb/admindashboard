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
                  <p>@lang('messages.Dashboard')</p>
                </a>
              </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                @lang('messages.user-management')
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.user.index')}}" class="nav-link">
                  <p>@lang('messages.user')</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.roles.index')}}" class="nav-link">
                 
                  <p>@lang('messages.role')</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.permissions.index')}}" class="nav-link">
                  <p>@lang('messages.permission')</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-file" ></i>
              <p>
                @lang('messages.content')
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
                  <p>@lang('messages.post')</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.products.index')}}" class="nav-link">
                  <p>@lang('messages.product')</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.categories.index')}}" class="nav-link">  
                  <p>@lang('messages.categories')</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.tags.index')}}" class="nav-link">  
                  <p>@lang('messages.tags')</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                @lang('messages.general-setting')
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.site.setting.index')}}" class="nav-link">
                  <p>@lang('messages.site-setting')</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.smtp.setting.index')}}" class="nav-link">
                  <p>@lang('messages.smtp-setting')</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.email.create')}}" class="nav-link">
                  <p>@lang('messages.test-email')</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-key"></i>
              <p>
                @lang('messages.api-keys')
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.api_keys.create')}}" class="nav-link">
                  <p>@lang('messages.create-api-keys')</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.api_keys.index')}}" class="nav-link">
                  <p>@lang('messages.manage-api-keys')</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-flag"></i>
              <p>
                @lang('messages.reports')
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.activity.report')}}" class="nav-link">
                  <p>@lang('messages.user-activity-logs')</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/forms/advanced.html" class="nav-link">
                  <p>@lang('messages.content-performance')</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('log-viewer')}}" class="nav-link">
                  <p>@lang('messages.system-logs')</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-file" ></i>
              <p>
                @lang('messages.file-management')
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('files.index')}}" class="nav-link">
                  <p>@lang('messages.manage-file')</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-bell" ></i>
              <p>
                @lang('messages.notififcation')
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.notifications')}}" class="nav-link">
                  <p>@lang('messages.new-user')</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.criticalError')}}" class="nav-link">
                  <p>@lang('messages.critical-systgem-error')</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.event.index')}}" class="nav-link">
                  <p>@lang('messages.create-event-mail')</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-store" ></i>
              <p>
                @lang('messages.backups')
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <p>@lang('messages.backups')
                  </p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="pages/forms/advanced.html" class="nav-link">
              <form method="POST" action="{{ route('logout') }}" class="d-inline">
                @csrf
                
                <button type="submit" class="nav-link"><i class="nav-icon fas fa-sign-out"></i>@lang('messages.logout')</button>
            </form>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>