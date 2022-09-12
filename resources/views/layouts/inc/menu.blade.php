<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu">@lang('Menu')</li>
                <li>
                    <a href="{{ route('home') }}" class="waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span key="t-dashboards">
                            @lang('Statictis')
                        </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('users.index') }}" class="waves-effect">
                        <i class="bx bxs-user-pin"></i>
                        <span key="t-contacts">@lang('Users')</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('terminals.index') }}" class="waves-effect">
                        <i class="bx bxs-user-pin"></i>
                        <span key="t-contacts">@lang('Terminal')</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('branches.index') }}" class="waves-effect">
                        <i class="bx bxs-user-pin"></i>
                        <span key="t-contacts">@lang('Branches')</span>
                    </a>
                </li>

                <li class="menu-title" key="t-menu">@lang('Lookups')</li>

                <li>
                    <a href="{{ route('networks.index') }}" class="waves-effect">
                        <i class="bx bxs-user-pin"></i>
                        <span key="t-contacts">@lang('Network Providers')</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
