<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <p style="margin-top: 22px; font-weight: bold;color: white !important">
                    {{ env('APP_NAME') }}
                </p>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn" style="color: white !important">
                <i class="fa fa-fw fa-bars"></i>
            </button>

        </div>

        <div class="d-flex">

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img class="rounded-circle header-profile-user" src="https://www.gravatar.com/avatar/{{ md5('123456') }}" alt="{{ \Auth::user()->name }}">
                    <span class="d-none d-xl-inline-block ms-1" key="t-{{ \Auth::user()->name }}">{{ \Auth::user()->name }}</span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <a class="dropdown-item" href="{{ route('profile.index') }}"><i class="bx bx-user font-size-16 align-middle me-1"></i> <span key="t-profile">@lang('Profile')</span></a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="{{ route('logout') }}"><i class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> <span key="t-logout">@lang('Logout')</span></a>
                </div>
            </div>

        </div>
    </div>
</header>
