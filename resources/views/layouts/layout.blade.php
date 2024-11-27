<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Accounting</title>
    <meta name="viewport"
          content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"/>
    <meta name="msapplication-tap-highlight" content="no">
    @yield('meta')

    {{--    <link href="/assets/main.css" rel="stylesheet">--}}
    <link href="{{asset('assets/main.css')}}" rel="stylesheet">


    @yield('css')

</head>
<body>
<div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
    {{--    <div class="app-header header-shadow">--}}
    <div class="app-header header-shadow bg-vicious-stance header-text-light">
        <div class="app-header__logo">
            <div class="logo-src"></div>
            <div class="header__pane ml-auto">
                <div>
                    <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                            data-class="closed-sidebar">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                    </button>
                </div>
            </div>
        </div>
        <div class="app-header__mobile-menu">
            <div>
                <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                </button>
            </div>
        </div>
        <div class="app-header__menu">
                <span>
                    <button type="button"
                            class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                        <span class="btn-icon-wrapper">
                            <i class="fa fa-ellipsis-v fa-w-6"></i>
                        </span>
                    </button>
                </span>
        </div>
        <div class="app-header__content">
            <div class="app-header-right">
                <div class="header-btn-lg pr-0">
                    <div class="widget-content p-0">
                        <div class="widget-content-wrapper">
                            <div class="widget-content-left">
                                <div class="btn-group">
                                    <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                       class="p-0 btn">
                                        <img width="42" class="rounded-circle"
                                             src="{{asset('assets/images/avatars/dummy.jpg')}}"
                                             alt="">
                                        <i class="fa fa-angle-down ml-2 opacity-8"></i>
                                    </a>
                                    <div tabindex="-1" role="menu" aria-hidden="true"
                                         class="dropdown-menu dropdown-menu-right">
                                        <button type="button" tabindex="0" class="dropdown-item">User Account</button>
                                        <button type="button" tabindex="0" class="dropdown-item">Settings</button>
                                        {{--                                        <h6 tabindex="-1" class="dropdown-header">Header</h6>--}}
                                        <div tabindex="-1" class="dropdown-divider"></div>
                                        <a href="/logout" class="dropdown-item">Logout</a>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content-left  ml-3 header-user-info">
                                <div class="widget-heading">
                                    {{\Illuminate\Support\Facades\Auth::user()->name}}
                                </div>
                                <div class="widget-subheading">
                                    {{\Illuminate\Support\Facades\Auth::user()->email}}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ui-theme-settings">
        <button type="button" id="TooltipDemo" class="btn-open-options btn btn-warning">
            <i class="fa fa-cog fa-w-16 fa-spin fa-2x"></i>
        </button>
        {{--<div class="theme-settings__inner">--}}
        {{--<div class="scrollbar-container">--}}
        {{--<div class="theme-settings__options-wrapper">--}}
        {{--<h3 class="themeoptions-heading">Layout Options--}}
        {{--</h3>--}}
        {{--<div class="p-3">--}}
        {{--<ul class="list-group">--}}
        {{--<li class="list-group-item">--}}
        {{--<div class="widget-content p-0">--}}
        {{--<div class="widget-content-wrapper">--}}
        {{--<div class="widget-content-left mr-3">--}}
        {{--<div class="switch has-switch switch-container-class"--}}
        {{--data-class="fixed-header">--}}
        {{--<div class="switch-animate switch-on">--}}
        {{--<input type="checkbox" checked data-toggle="toggle"--}}
        {{--data-onstyle="success">--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<div class="widget-content-left">--}}
        {{--<div class="widget-heading">Fixed Header--}}
        {{--</div>--}}
        {{--<div class="widget-subheading">Makes the header top fixed, always visible!--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</li>--}}
        {{--<li class="list-group-item">--}}
        {{--<div class="widget-content p-0">--}}
        {{--<div class="widget-content-wrapper">--}}
        {{--<div class="widget-content-left mr-3">--}}
        {{--<div class="switch has-switch switch-container-class"--}}
        {{--data-class="fixed-sidebar">--}}
        {{--<div class="switch-animate switch-on">--}}
        {{--<input type="checkbox" checked data-toggle="toggle"--}}
        {{--data-onstyle="success">--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<div class="widget-content-left">--}}
        {{--<div class="widget-heading">Fixed Sidebar--}}
        {{--</div>--}}
        {{--<div class="widget-subheading">Makes the sidebar left fixed, always visible!--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</li>--}}
        {{--<li class="list-group-item">--}}
        {{--<div class="widget-content p-0">--}}
        {{--<div class="widget-content-wrapper">--}}
        {{--<div class="widget-content-left mr-3">--}}
        {{--<div class="switch has-switch switch-container-class"--}}
        {{--data-class="fixed-footer">--}}
        {{--<div class="switch-animate switch-off">--}}
        {{--<input type="checkbox" data-toggle="toggle" data-onstyle="success">--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<div class="widget-content-left">--}}
        {{--<div class="widget-heading">Fixed Footer--}}
        {{--</div>--}}
        {{--<div class="widget-subheading">Makes the app footer bottom fixed, always--}}
        {{--visible!--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</li>--}}
        {{--</ul>--}}
        {{--</div>--}}
        {{--<h3 class="themeoptions-heading">--}}
        {{--<div>--}}
        {{--Header Options--}}
        {{--</div>--}}
        {{--<button type="button"--}}
        {{--class="btn-pill btn-shadow btn-wide ml-auto btn btn-focus btn-sm switch-header-cs-class"--}}
        {{--data-class="">--}}
        {{--Restore Default--}}
        {{--</button>--}}
        {{--</h3>--}}
        {{--<div class="p-3">--}}
        {{--<ul class="list-group">--}}
        {{--<li class="list-group-item">--}}
        {{--<h5 class="pb-2">Choose Color Scheme--}}
        {{--</h5>--}}
        {{--<div class="theme-settings-swatches">--}}
        {{--<div class="swatch-holder bg-primary switch-header-cs-class"--}}
        {{--data-class="bg-primary header-text-light">--}}
        {{--</div>--}}
        {{--<div class="swatch-holder bg-secondary switch-header-cs-class"--}}
        {{--data-class="bg-secondary header-text-light">--}}
        {{--</div>--}}
        {{--<div class="swatch-holder bg-success switch-header-cs-class"--}}
        {{--data-class="bg-success header-text-dark">--}}
        {{--</div>--}}
        {{--<div class="swatch-holder bg-info switch-header-cs-class"--}}
        {{--data-class="bg-info header-text-dark">--}}
        {{--</div>--}}
        {{--<div class="swatch-holder bg-warning switch-header-cs-class"--}}
        {{--data-class="bg-warning header-text-dark">--}}
        {{--</div>--}}
        {{--<div class="swatch-holder bg-danger switch-header-cs-class"--}}
        {{--data-class="bg-danger header-text-light">--}}
        {{--</div>--}}
        {{--<div class="swatch-holder bg-light switch-header-cs-class"--}}
        {{--data-class="bg-light header-text-dark">--}}
        {{--</div>--}}
        {{--<div class="swatch-holder bg-dark switch-header-cs-class"--}}
        {{--data-class="bg-dark header-text-light">--}}
        {{--</div>--}}
        {{--<div class="swatch-holder bg-focus switch-header-cs-class"--}}
        {{--data-class="bg-focus header-text-light">--}}
        {{--</div>--}}
        {{--<div class="swatch-holder bg-alternate switch-header-cs-class"--}}
        {{--data-class="bg-alternate header-text-light">--}}
        {{--</div>--}}
        {{--<div class="divider">--}}
        {{--</div>--}}
        {{--<div class="swatch-holder bg-vicious-stance switch-header-cs-class"--}}
        {{--data-class="bg-vicious-stance header-text-light">--}}
        {{--</div>--}}
        {{--<div class="swatch-holder bg-midnight-bloom switch-header-cs-class"--}}
        {{--data-class="bg-midnight-bloom header-text-light">--}}
        {{--</div>--}}
        {{--<div class="swatch-holder bg-night-sky switch-header-cs-class"--}}
        {{--data-class="bg-night-sky header-text-light">--}}
        {{--</div>--}}
        {{--<div class="swatch-holder bg-slick-carbon switch-header-cs-class"--}}
        {{--data-class="bg-slick-carbon header-text-light">--}}
        {{--</div>--}}
        {{--<div class="swatch-holder bg-asteroid switch-header-cs-class"--}}
        {{--data-class="bg-asteroid header-text-light">--}}
        {{--</div>--}}
        {{--<div class="swatch-holder bg-royal switch-header-cs-class"--}}
        {{--data-class="bg-royal header-text-light">--}}
        {{--</div>--}}
        {{--<div class="swatch-holder bg-warm-flame switch-header-cs-class"--}}
        {{--data-class="bg-warm-flame header-text-dark">--}}
        {{--</div>--}}
        {{--<div class="swatch-holder bg-night-fade switch-header-cs-class"--}}
        {{--data-class="bg-night-fade header-text-dark">--}}
        {{--</div>--}}
        {{--<div class="swatch-holder bg-sunny-morning switch-header-cs-class"--}}
        {{--data-class="bg-sunny-morning header-text-dark">--}}
        {{--</div>--}}
        {{--<div class="swatch-holder bg-tempting-azure switch-header-cs-class"--}}
        {{--data-class="bg-tempting-azure header-text-dark">--}}
        {{--</div>--}}
        {{--<div class="swatch-holder bg-amy-crisp switch-header-cs-class"--}}
        {{--data-class="bg-amy-crisp header-text-dark">--}}
        {{--</div>--}}
        {{--<div class="swatch-holder bg-heavy-rain switch-header-cs-class"--}}
        {{--data-class="bg-heavy-rain header-text-dark">--}}
        {{--</div>--}}
        {{--<div class="swatch-holder bg-mean-fruit switch-header-cs-class"--}}
        {{--data-class="bg-mean-fruit header-text-dark">--}}
        {{--</div>--}}
        {{--<div class="swatch-holder bg-malibu-beach switch-header-cs-class"--}}
        {{--data-class="bg-malibu-beach header-text-light">--}}
        {{--</div>--}}
        {{--<div class="swatch-holder bg-deep-blue switch-header-cs-class"--}}
        {{--data-class="bg-deep-blue header-text-dark">--}}
        {{--</div>--}}
        {{--<div class="swatch-holder bg-ripe-malin switch-header-cs-class"--}}
        {{--data-class="bg-ripe-malin header-text-light">--}}
        {{--</div>--}}
        {{--<div class="swatch-holder bg-arielle-smile switch-header-cs-class"--}}
        {{--data-class="bg-arielle-smile header-text-light">--}}
        {{--</div>--}}
        {{--<div class="swatch-holder bg-plum-plate switch-header-cs-class"--}}
        {{--data-class="bg-plum-plate header-text-light">--}}
        {{--</div>--}}
        {{--<div class="swatch-holder bg-happy-fisher switch-header-cs-class"--}}
        {{--data-class="bg-happy-fisher header-text-dark">--}}
        {{--</div>--}}
        {{--<div class="swatch-holder bg-happy-itmeo switch-header-cs-class"--}}
        {{--data-class="bg-happy-itmeo header-text-light">--}}
        {{--</div>--}}
        {{--<div class="swatch-holder bg-mixed-hopes switch-header-cs-class"--}}
        {{--data-class="bg-mixed-hopes header-text-light">--}}
        {{--</div>--}}
        {{--<div class="swatch-holder bg-strong-bliss switch-header-cs-class"--}}
        {{--data-class="bg-strong-bliss header-text-light">--}}
        {{--</div>--}}
        {{--<div class="swatch-holder bg-grow-early switch-header-cs-class"--}}
        {{--data-class="bg-grow-early header-text-light">--}}
        {{--</div>--}}
        {{--<div class="swatch-holder bg-love-kiss switch-header-cs-class"--}}
        {{--data-class="bg-love-kiss header-text-light">--}}
        {{--</div>--}}
        {{--<div class="swatch-holder bg-premium-dark switch-header-cs-class"--}}
        {{--data-class="bg-premium-dark header-text-light">--}}
        {{--</div>--}}
        {{--<div class="swatch-holder bg-happy-green switch-header-cs-class"--}}
        {{--data-class="bg-happy-green header-text-light">--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</li>--}}
        {{--</ul>--}}
        {{--</div>--}}
        {{--<h3 class="themeoptions-heading">--}}
        {{--<div>Sidebar Options</div>--}}
        {{--<button type="button"--}}
        {{--class="btn-pill btn-shadow btn-wide ml-auto btn btn-focus btn-sm switch-sidebar-cs-class"--}}
        {{--data-class="">--}}
        {{--Restore Default--}}
        {{--</button>--}}
        {{--</h3>--}}
        {{--<div class="p-3">--}}
        {{--<ul class="list-group">--}}
        {{--<li class="list-group-item">--}}
        {{--<h5 class="pb-2">Choose Color Scheme--}}
        {{--</h5>--}}
        {{--<div class="theme-settings-swatches">--}}
        {{--<div class="swatch-holder bg-primary switch-sidebar-cs-class"--}}
        {{--data-class="bg-primary sidebar-text-light">--}}
        {{--</div>--}}
        {{--<div class="swatch-holder bg-secondary switch-sidebar-cs-class"--}}
        {{--data-class="bg-secondary sidebar-text-light">--}}
        {{--</div>--}}
        {{--<div class="swatch-holder bg-success switch-sidebar-cs-class"--}}
        {{--data-class="bg-success sidebar-text-dark">--}}
        {{--</div>--}}
        {{--<div class="swatch-holder bg-info switch-sidebar-cs-class"--}}
        {{--data-class="bg-info sidebar-text-dark">--}}
        {{--</div>--}}
        {{--<div class="swatch-holder bg-warning switch-sidebar-cs-class"--}}
        {{--data-class="bg-warning sidebar-text-dark">--}}
        {{--</div>--}}
        {{--<div class="swatch-holder bg-danger switch-sidebar-cs-class"--}}
        {{--data-class="bg-danger sidebar-text-light">--}}
        {{--</div>--}}
        {{--<div class="swatch-holder bg-light switch-sidebar-cs-class"--}}
        {{--data-class="bg-light sidebar-text-dark">--}}
        {{--</div>--}}
        {{--<div class="swatch-holder bg-dark switch-sidebar-cs-class"--}}
        {{--data-class="bg-dark sidebar-text-light">--}}
        {{--</div>--}}
        {{--<div class="swatch-holder bg-focus switch-sidebar-cs-class"--}}
        {{--data-class="bg-focus sidebar-text-light">--}}
        {{--</div>--}}
        {{--<div class="swatch-holder bg-alternate switch-sidebar-cs-class"--}}
        {{--data-class="bg-alternate sidebar-text-light">--}}
        {{--</div>--}}
        {{--<div class="divider">--}}
        {{--</div>--}}
        {{--<div class="swatch-holder bg-vicious-stance switch-sidebar-cs-class"--}}
        {{--data-class="bg-vicious-stance sidebar-text-light">--}}
        {{--</div>--}}
        {{--<div class="swatch-holder bg-midnight-bloom switch-sidebar-cs-class"--}}
        {{--data-class="bg-midnight-bloom sidebar-text-light">--}}
        {{--</div>--}}
        {{--<div class="swatch-holder bg-night-sky switch-sidebar-cs-class"--}}
        {{--data-class="bg-night-sky sidebar-text-light">--}}
        {{--</div>--}}
        {{--<div class="swatch-holder bg-slick-carbon switch-sidebar-cs-class"--}}
        {{--data-class="bg-slick-carbon sidebar-text-light">--}}
        {{--</div>--}}
        {{--<div class="swatch-holder bg-asteroid switch-sidebar-cs-class"--}}
        {{--data-class="bg-asteroid sidebar-text-light">--}}
        {{--</div>--}}
        {{--<div class="swatch-holder bg-royal switch-sidebar-cs-class"--}}
        {{--data-class="bg-royal sidebar-text-light">--}}
        {{--</div>--}}
        {{--<div class="swatch-holder bg-warm-flame switch-sidebar-cs-class"--}}
        {{--data-class="bg-warm-flame sidebar-text-dark">--}}
        {{--</div>--}}
        {{--<div class="swatch-holder bg-night-fade switch-sidebar-cs-class"--}}
        {{--data-class="bg-night-fade sidebar-text-dark">--}}
        {{--</div>--}}
        {{--<div class="swatch-holder bg-sunny-morning switch-sidebar-cs-class"--}}
        {{--data-class="bg-sunny-morning sidebar-text-dark">--}}
        {{--</div>--}}
        {{--<div class="swatch-holder bg-tempting-azure switch-sidebar-cs-class"--}}
        {{--data-class="bg-tempting-azure sidebar-text-dark">--}}
        {{--</div>--}}
        {{--<div class="swatch-holder bg-amy-crisp switch-sidebar-cs-class"--}}
        {{--data-class="bg-amy-crisp sidebar-text-dark">--}}
        {{--</div>--}}
        {{--<div class="swatch-holder bg-heavy-rain switch-sidebar-cs-class"--}}
        {{--data-class="bg-heavy-rain sidebar-text-dark">--}}
        {{--</div>--}}
        {{--<div class="swatch-holder bg-mean-fruit switch-sidebar-cs-class"--}}
        {{--data-class="bg-mean-fruit sidebar-text-dark">--}}
        {{--</div>--}}
        {{--<div class="swatch-holder bg-malibu-beach switch-sidebar-cs-class"--}}
        {{--data-class="bg-malibu-beach sidebar-text-light">--}}
        {{--</div>--}}
        {{--<div class="swatch-holder bg-deep-blue switch-sidebar-cs-class"--}}
        {{--data-class="bg-deep-blue sidebar-text-dark">--}}
        {{--</div>--}}
        {{--<div class="swatch-holder bg-ripe-malin switch-sidebar-cs-class"--}}
        {{--data-class="bg-ripe-malin sidebar-text-light">--}}
        {{--</div>--}}
        {{--<div class="swatch-holder bg-arielle-smile switch-sidebar-cs-class"--}}
        {{--data-class="bg-arielle-smile sidebar-text-light">--}}
        {{--</div>--}}
        {{--<div class="swatch-holder bg-plum-plate switch-sidebar-cs-class"--}}
        {{--data-class="bg-plum-plate sidebar-text-light">--}}
        {{--</div>--}}
        {{--<div class="swatch-holder bg-happy-fisher switch-sidebar-cs-class"--}}
        {{--data-class="bg-happy-fisher sidebar-text-dark">--}}
        {{--</div>--}}
        {{--<div class="swatch-holder bg-happy-itmeo switch-sidebar-cs-class"--}}
        {{--data-class="bg-happy-itmeo sidebar-text-light">--}}
        {{--</div>--}}
        {{--<div class="swatch-holder bg-mixed-hopes switch-sidebar-cs-class"--}}
        {{--data-class="bg-mixed-hopes sidebar-text-light">--}}
        {{--</div>--}}
        {{--<div class="swatch-holder bg-strong-bliss switch-sidebar-cs-class"--}}
        {{--data-class="bg-strong-bliss sidebar-text-light">--}}
        {{--</div>--}}
        {{--<div class="swatch-holder bg-grow-early switch-sidebar-cs-class"--}}
        {{--data-class="bg-grow-early sidebar-text-light">--}}
        {{--</div>--}}
        {{--<div class="swatch-holder bg-love-kiss switch-sidebar-cs-class"--}}
        {{--data-class="bg-love-kiss sidebar-text-light">--}}
        {{--</div>--}}
        {{--<div class="swatch-holder bg-premium-dark switch-sidebar-cs-class"--}}
        {{--data-class="bg-premium-dark sidebar-text-light">--}}
        {{--</div>--}}
        {{--<div class="swatch-holder bg-happy-green switch-sidebar-cs-class"--}}
        {{--data-class="bg-happy-green sidebar-text-light">--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</li>--}}
        {{--</ul>--}}
        {{--</div>--}}
        {{--<h3 class="themeoptions-heading">--}}
        {{--<div>Main Content Options</div>--}}
        {{--<button type="button" class="btn-pill btn-shadow btn-wide ml-auto active btn btn-focus btn-sm">--}}
        {{--Restore Default--}}
        {{--</button>--}}
        {{--</h3>--}}
        {{--<div class="p-3">--}}
        {{--<ul class="list-group">--}}
        {{--<li class="list-group-item">--}}
        {{--<h5 class="pb-2">Page Section Tabs--}}
        {{--</h5>--}}
        {{--<div class="theme-settings-swatches">--}}
        {{--<div role="group" class="mt-2 btn-group">--}}
        {{--<button type="button"--}}
        {{--class="btn-wide btn-shadow btn-primary btn btn-secondary switch-theme-class"--}}
        {{--data-class="body-tabs-line">--}}
        {{--Line--}}
        {{--</button>--}}
        {{--<button type="button"--}}
        {{--class="btn-wide btn-shadow btn-primary active btn btn-secondary switch-theme-class"--}}
        {{--data-class="body-tabs-shadow">--}}
        {{--Shadow--}}
        {{--</button>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</li>--}}
        {{--</ul>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
    </div>
    <div class="app-main">
        {{--        <div class="app-sidebar sidebar-shadow">--}}
        {{--<div class="app-sidebar sidebar-shadow bg-asteroid sidebar-text-light">--}}
        <div class="app-sidebar sidebar-shadow bg-vicious-stance sidebar-text-light">
            <div class="app-header__logo">
                <div class="logo-src"></div>
                <div class="header__pane ml-auto">
                    <div>
                        <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                                data-class="closed-sidebar">
                                    <span class="hamburger-box">
                                        <span class="hamburger-inner"></span>
                                    </span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="app-header__mobile-menu">
                <div>
                    <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                    </button>
                </div>
            </div>
            <div class="app-header__menu">
                        <span>
                            <button type="button"
                                    class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                                <span class="btn-icon-wrapper">
                                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                                </span>
                            </button>
                        </span>
            </div>
            <div class="scrollbar-sidebar">
                <div class="app-sidebar__inner mt-2">
                    <ul class="vertical-nav-menu">
                        <li>
                            <a href="/" class="{{Request::is('/') ? 'mm-active' : ''}}">
                                <i class="metismenu-icon pe-7s-rocket"></i>
                                Dashboard
                            </a>
                        </li>
                        <li>
                            <a href="/general-ledgers" class="{{Request::is('general-ledgers') ? 'mm-active' : ''}}">
                                <i class="metismenu-icon pe-7s-wallet"></i>
                                General Ledger
                            </a>
                        </li>
                        @if(Request::path() =='jvs' || Request::path() =='jvs/create')
                            <li class="mm-active">
                        @else
                            <li>
                                @endif
                                <a href="#">
                                    <i class="metismenu-icon pe-7s-cash"></i>
                                    JV
                                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                </a>
                                <ul>
                                    <li>
                                        <a href="/jvs/create"
                                           class="{{Request::path() =='products/stocks' ? 'mm-active' : ''}}">
                                            <i class="metismenu-icon">
                                            </i>Create JV
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/jvs"
                                           class="{{Request::path() =='jvs' ? 'mm-active' : ''}}">
                                            <i class="metismenu-icon">
                                            </i>JV List
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            @if(Request::path() =='account-heads' || Request::path() =='account-heads/create')
                                <li class="mm-active">
                            @else
                                <li>
                                    @endif
                                    <a href="#">
                                        <i class="metismenu-icon pe-7s-bookmarks"></i>
                                        Charts of account
                                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                    </a>
                                    <ul>
                                        <li>
                                            <a href="/account-heads/create"
                                               class="{{Request::path() =='account-heads/create' ? 'mm-active' : ''}}">
                                                <i class="metismenu-icon">
                                                </i>New Account head
                                            </a>
                                        </li>
                                        <li>
                                            <a href="/account-heads"
                                               class="{{Request::path() =='account-heads' ? 'mm-active' : ''}}">
                                                <i class="metismenu-icon">
                                                </i>Chart of Account
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li>
                                    <a href="/general-ledgers/send"
                                       class="{{Request::is('general-ledgers/send') ? 'mm-active' : ''}}">
                                        <i class="metismenu-icon pe-7s-mail"></i>
                                        Email Excel FIle
                                    </a>
                                </li>
                                <li>
                                    <a onclick="location.reload()">
                                        <i class="metismenu-icon pe-7s-refresh"></i>
                                        Reload
                                    </a>
                                </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="app-main__outer">
            <div class="app-main__inner">
                @if(Session::has('message'))
                    <div class="col-12">
                        <div class="alert {{ Session::get('alert-class', 'alert-info') }} alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            {{ Session::get('message') }}
                        </div>
                    </div>
                @endif
                @isset($title)
                    {{--                <div class="app-page-title">--}}
                    {{--                    <div class="page-title-wrapper">--}}
                    {{--                        <div class="page-title-heading">--}}
                    {{--                            <div>{{ $title }}--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}

                    {{--                    </div>--}}
                    {{--                </div>--}}
                @endif
                @yield('content')
            </div>
            <div class="app-wrapper-footer">
                <div class="app-footer">
                    <div class="app-footer__inner">
                        {{--                        <div class="app-footer-left">--}}
                        {{--                            <ul class="nav">--}}
                        {{--                                <li class="nav-item">--}}
                        {{--                                    <a href="javascript:void(0);" class="nav-link">--}}
                        {{--                                        Footer Link 1--}}
                        {{--                                    </a>--}}
                        {{--                                </li>--}}
                        {{--                                <li class="nav-item">--}}
                        {{--                                    <a href="javascript:void(0);" class="nav-link">--}}
                        {{--                                        Footer Link 2--}}
                        {{--                                    </a>--}}
                        {{--                                </li>--}}
                        {{--                            </ul>--}}
                        {{--                        </div>--}}
                        <div class="app-footer-right">

                            <ul class="nav">

                                <li class="nav-item">

                                    <a target="_blank" href="https://www.shadownicsoft.com/" class="nav-link">
                                        Maintain And Developed By Shadownicsoft
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{--<script type="text/javascript" src="/assets/scripts/main.js"></script>--}}
<script type="text/javascript" src="{{asset('assets/scripts/main.js')}}"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
@yield('script')
</body>
</html>

