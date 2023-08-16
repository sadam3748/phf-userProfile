<!-- BEGIN: SideNav-->
<aside class="sidenav-main nav-expanded nav-lock nav-collapsible sidenav-light sidenav-active-square">
    <div class="brand-sidebar">
        <h1 class="logo-wrapper">
            <a class="brand-logo darken-1" href="{{route('admin.dashboard')}}">
                <img class="hide-on-med-and-down" src="../../../app-assets/images/logo/materialize-logo-color.png" alt="materialize logo"/>
                <img class="show-on-medium-and-down hide-on-med-and-up" src="../../../app-assets/images/logo/materialize-logo.png" alt="materialize logo"/>
                <span class="logo-text hide-on-med-and-down">Nursing</span>
            </a>
            <a class="navbar-toggler" href="#"><i class="material-icons">radio_button_checked</i></a>
        </h1>
    </div>
    <ul class="sidenav sidenav-collapsible leftside-navigation collapsible sidenav-fixed menu-shadow" id="slide-out" data-menu="menu-navigation" data-collapsible="menu-accordion">
        <li class="bold">
            <a class="waves-effect waves-cyan {{Request::is('admin/dashboard') ? 'active' : ''}}" href="{{route('admin.dashboard')}}">
                <i class="material-icons">settings_input_svideo</i>
                <span class="menu-title" data-i18n="Dashboard">Dashboard</span>
            </a>
        </li>

        <li class="bold">
            <a class="waves-effect waves-cyan {{Request::is('admin/nursing-recruitments') ? 'active' : ''}}" href="{{ route('admin.nursing.recruitments') }}">
                <i class="material-icons">face</i>
                <span class="menu-title" data-i18n="Settings">Nursing Recruitments</span>
            </a>
        </li>
{{--        <li class="bold {{ Request::is('admin/track-approved')--}}
{{--          || Request::is('admin/active-campaign')--}}
{{--            || Request::is('admin/track-pending')--}}

{{--            || Request::is('admin/track-details*')? 'active open' : '' }}">--}}
{{--            <a class="collapsible-header waves-effect waves-cyan" href="javascript:void(0)">--}}
{{--                <i class="material-icons">face</i>--}}
{{--                <span class="menu-title" data-i18n="User">Artist Tracks</span>--}}
{{--            </a>--}}
{{--            <div class="collapsible-body">--}}
{{--                <ul class="collapsible collapsible-sub" data-collapsible="accordion">--}}
{{--                    <li class="{{ Request::is('admin/track-approved') ? 'active' : '' }}">--}}
{{--                        <a class="{{ Request::is('admin/track-approved') ? 'active' : '' }}" href="{{ route('admin.approved.track') }}">--}}
{{--                            <i class="material-icons">radio_button_unchecked</i>--}}
{{--                            <span data-i18n="List">Approved</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="{{ Request::is('admin/track-pending') ? 'active' : '' }}">--}}
{{--                        <a class="{{ Request::is('admin/track-pending') ? 'active' : '' }}" href="{{ route('admin.pending.track') }}">--}}
{{--                            <i class="material-icons">radio_button_unchecked</i>--}}
{{--                            <span data-i18n="List">Pending</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="{{ Request::is('admin/active-campaign') ? 'active' : '' }}">--}}
{{--                        <a class="{{ Request::is('admin/active-campaign') ? 'active' : '' }}" href="{{ route('admin.campaign.active') }}">--}}
{{--                            <i class="material-icons">radio_button_unchecked</i>--}}
{{--                            <span data-i18n="List">Active Campaign</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        </li>--}}

    </ul>
    <div class="navigation-background"></div><a class="sidenav-trigger btn-sidenav-toggle btn-floating btn-medium waves-effect waves-light hide-on-large-only" href="#" data-target="slide-out"><i class="material-icons">menu</i></a>
</aside>
<!-- END: SideNav-->
