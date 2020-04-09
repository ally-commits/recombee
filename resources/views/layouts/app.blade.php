<!doctype html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>RECOMBEE DASHBOARD</title>  
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        @yield("css")
        <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />

    </head>
    <body data-topbar="colored"> 
        
        <div id="layout-wrapper">
            <header id="page-topbar">
                <div class="navbar-header">
                    <div class="d-flex"> 
                        <div class="navbar-brand-box">
                            <a href="#" class="logo logo-dark">
                                <span class="logo-sm text-muted">
                                    RCD
                                </span>
                                <span class="logo-lg text-muted">
                                    Recombee Dashboard
                                </span>
                            </a> 
                        </div>

                        <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                            <i class="mdi mdi-backburger"></i>
                        </button> 
                    </div>

                    <div class="d-flex">

                        <div class="dropdown d-inline-block d-lg-none ml-2">
                            <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="mdi mdi-magnify"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0" aria-labelledby="page-header-search-dropdown">
                    
                                <form class="p-3">
                                    <div class="form-group m-0">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>  

                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded-circle header-profile-user" src="{{ asset('assets/img/admin.jpg') }}" alt="Header Avatar">
                                <span class="d-none d-sm-inline-block ml-1">Hello Admin</span>
                                <i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right"> 
                                <div class="dropdown-divider"></div>
                            </div>
                        </div>
            
                    </div>
                </div>
            </header>

            <div class="vertical-menu mm-active">
                <div data-simplebar="init" class="h-100 mm-show">
                    <div class="simplebar-wrapper" style="margin: 0px;">
                        <div class="simplebar-height-auto-observer-wrapper">
                            <div class="simplebar-height-auto-observer"></div>
                        </div>
                        <div class="simplebar-mask">
                            <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                                <div class="simplebar-content-wrapper" style="height: 100%; overflow: hidden scroll;">
                                    <div class="simplebar-content" style="padding: 0px;">
                                        <div id="sidebar-menu" class="mm-active"> 
                                            <ul class="metismenu list-unstyled mm-show" id="side-menu">
                                                <li class="menu-title">Menu</li>

                                                <li>
                                                    <a href="/" class="waves-effect">
                                                        <div class="d-inline-block icons-sm mr-1"><i class="mdi mdi-home"></i></div>
                                                        <span>Dashboard</span>
                                                    </a>
                                                </li> 

                                                <li>
                                                    <a href="/add-data" class="waves-effect">
                                                        <div class="d-inline-block icons-sm mr-1"><i class="mdi mdi-plus"></i></div>
                                                        <span>Add - Data</span>
                                                    </a>
                                                </li> 

                                                <li>
                                                    <a href="/view-data" class="waves-effect">
                                                        <div class="d-inline-block icons-sm mr-1"><i class="mdi mdi-eye"></i></div>
                                                        <span>View - Data</span>
                                                    </a>
                                                </li> 
                                                
                                                <li>
                                                    <a href="/users" class="waves-effect">
                                                        <div class="d-inline-block icons-sm mr-1"><i class="mdi mdi-format-wrap-tight"></i></div>
                                                        <span>Users</span>
                                                    </a>
                                                </li>  

                                                <li>
                                                    <a href="/contents" class="waves-effect">
                                                        <div class="d-inline-block icons-sm mr-1"><i class="mdi mdi-map"></i></div>
                                                        <span>Contents</span>
                                                    </a>
                                                </li>  
                                            </ul>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="simplebar-placeholder" style="width: auto; height: 763px;"></div>
                    </div>
                    <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                        <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
                    </div>
                    <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
                        <div class="simplebar-scrollbar" style="height: 470px; transform: translate3d(0px, 0px, 0px); display: block;"></div>
                    </div>
                </div>
            </div>

            <div class="main-content">
                @yield('content') 
            </div>
        </div>
        <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/libs/metismenu/metisMenu.min.js') }}"></script>
        <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
        <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>
        @yield("js")
        <script src="https://unicons.iconscout.com/release/v2.0.1/script/monochrome/bundle.js"></script>
        <script src="{{ asset('assets/js/pages/dashboard.init.js') }}"></script>
        <script src="{{ asset('assets/js/app.js') }}"></script>

    </body>
    </html>
