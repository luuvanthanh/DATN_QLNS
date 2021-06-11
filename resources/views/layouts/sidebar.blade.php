<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.dashboard') }}" class="brand-link">
        <img src="/avatar/AdminLogo.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3 text-center"
            style="opacity: .8">
        <span class="brand-text font-weight-light" style="font-family: sans-serif">Quản lí nhân sự</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <a href="{{ route('admin.profile') }}">
                    <img src="{{ asset(Auth::user()->avatar) }}" alt="" class="img-fluid"
                        style="width: 43px; height: auto; border-radius: 50%;">
                </a>
            </div>
            <div class="info mt-2">
                <a href="{{ route('admin.profile') }}" class="d-block"
                    style="font-family: sans-serif; font-size: 17px;">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        {{-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> --}}

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                {{-- menu for home page --}}
                {{-- <li>
            <h5 class="text-muted">QUẢN LÝ NHÂN SỰ</h5>
          </li>
          <li class="nav-item {{ Route::currentRouteName() == 'admin.dashboard' ? 'menu-open' : '' }}">
            <a href="" class="nav-link {{ Route::currentRouteName() == 'admin.dashboard' ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Thống kê, báo cáo
              </p>
            </a>
            <a href="{{ route('admin.workers.index') }}" class="nav-link {{ Route::currentRouteName() == 'admin.dashboard' ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Quản lý nhân viên
              </p>
            </a>
            <a href="{{ route('admin.departments.index') }}" class="nav-link {{ Route::currentRouteName() == 'admin.dashboard' ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Quản lý phòng ban
              </p>
            </a>
          </li>
          <li> --}}
                @if (Auth::user()->role_id == 1)
                    <li class="nav-header mt-1">QUẢN LÝ NHÂN SỰ</li>
                    <li class="nav-item">
                        <a href={{ route('admin.dashboard') }}
                            class="nav-link {{ Route::currentRouteName() == 'admin.dashboard' ? 'active' : '' }}">
                            <i class="nav-icon fas fa-chart-line"></i>
                            <p>Thống kê, báo cáo</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href={{ route('admin.workers.index') }}
                            class="nav-link {{ Route::currentRouteName() == 'admin.workers.index' ? 'active' : '' }}">
                            <i class="nav-icon fas fa-users"></i>
                            <p>Quản lý nhân viên</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href={{ route('admin.departments.index') }}
                            class="nav-link {{ Route::currentRouteName() == 'admin.departments.index' ? 'active' : '' }}">
                            <i class="nav-icon fas fa-building"></i>
                            <p>Quản lý phòng ban</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href={{ route('admin.project.index') }}
                            class="nav-link {{ Route::currentRouteName() == 'admin.projects.index' ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tasks"></i>
                            <p>Quản lý dự án</p>
                        </a>
                    </li>

                    <li class="nav-header mt-3">QUẢN TRỊ HỆ THỐNG</li>
                    </li>
                    <li class="nav-item">
                        <a href={{ route('admin.user.index') }}
                            class="nav-link {{ Route::currentRouteName() == 'admin.user.index' ? 'active' : '' }}">
                            <i class="nav-icon fas fa-user"></i>
                            <p>Quản lý người dùng</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href={{ route('admin.role.index') }}
                            class="nav-link {{ Route::currentRouteName() == 'admin.role.index' ? 'active' : '' }}">
                            <i class="nav-icon fas fa-user-shield"></i>
                            <p>Quản lý phân quyền</p>
                        </a>
                    </li>


                @elseif(Auth::user()->role_id == 2)
                    <li class="nav-header mt-1">QUẢN LÝ NHÂN SỰ</li>
                    <li class="nav-item">
                        <a href={{ route('admin.dashboard') }}
                            class="nav-link {{ Route::currentRouteName() == 'admin.dashboard' ? 'active' : '' }}">
                            <i class="nav-icon fas fa-chart-line"></i>
                            <p>Thống kê, báo cáo</p>
                        </a>
                    </li>
                @elseif(Auth::user()->role_id == 3)
                    <li class="nav-header mt-1">QUẢN LÝ NHÂN SỰ</li>
                    <li class="nav-item">
                        <a href={{ route('admin.dashboard') }}
                            class="nav-link {{ Route::currentRouteName() == 'admin.dashboard' ? 'active' : '' }}">
                            <i class="nav-icon fas fa-chart-line"></i>
                            <p>Thống kê, báo cáo</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href={{ route('admin.workers.index') }}
                            class="nav-link {{ Route::currentRouteName() == 'admin.workers.index' ? 'active' : '' }}">
                            <i class="nav-icon fas fa-users"></i>
                            <p>Quản lý nhân viên</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href={{ route('admin.departments.index') }}
                            class="nav-link {{ Route::currentRouteName() == 'admin.departments.index' ? 'active' : '' }}">
                            <i class="nav-icon fas fa-building"></i>
                            <p>Quản lý phòng ban</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href={{ route('admin.project.index') }}
                            class="nav-link {{ Route::currentRouteName() == 'admin.projects.index' ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tasks"></i>
                            <p>Quản lý dự án</p>
                        </a>
                    </li>


                @endif
                
                {{-- menu of category module --}}
                {{-- @php
            $routeCategoryArr = [
              'admin.category.index',
              'admin.category.create',
              'admin.category.edit',
              'admin.category.show',
            ];
          @endphp --}}
                {{-- <li class="nav-item {{ in_array(Route::currentRouteName(), $routeCategoryArr) ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Category
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.category.index') }}" class="nav-link {{ Route::currentRouteName() == 'admin.category.index' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.category.create') }}" class="nav-link {{ Route::currentRouteName() == 'admin.category.create' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Category</p>
                </a>
              </li>
            </ul>
          </li> --}}

                {{-- menu of post module --}}
                {{-- @php
            $routePostArr = [
              'admin.post.index',
              'admin.post.create',
              'admin.post.edit',
              'admin.post.show',
            ];
          @endphp --}}
                {{-- <li class="nav-item {{ in_array(Route::currentRouteName(), $routePostArr) ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Post
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.post.index') }}" class="nav-link {{ Route::currentRouteName() == 'admin.post.index' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Post</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.post.create') }}" class="nav-link {{ Route::currentRouteName() == 'admin.post.create' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Post</p>
                </a>
              </li>
            </ul>
          </li> --}}
            </ul>

            {{-- <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger mt-3" onclick="return confirm('Bạn có đồng ý đăng xuất ?')">Logout</button>
            </form> --}}

        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
