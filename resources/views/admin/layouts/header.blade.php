<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">

               <!-- LOGO -->
         <div class="navbar-brand-box">
            <a href="index.html" class="logo logo-dark">
                <span class="logo-sm">
                    <img src="{{asset('auth/assets/images/logo-sm.png')}}" alt="" height="22">
                </span>
                <span class="logo-lg">
                    <img src="{{asset('auth/assets/images/logo-dark.png')}}" alt="" height="20">
                </span>
            </a>

            <a href="index.html" class="logo logo-light">
                <span class="logo-sm">
                    <img src="{{asset('auth/assets/images/logo-sm.png')}}" alt="" height="22">
                </span>
                <span class="logo-lg">
                    <img src="{{asset('auth/assets/images/logo-light.png')}}" alt="" height="20">
                </span>
            </a>
        </div>

            <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                <i class="mdi mdi-menu"></i>
            </button>


            <div class="topbar-social-icon me-3 d-none d-md-block">
            </div>

        </div>

       

        <div class="d-flex">
            <div class="dropdown d-none d-lg-inline-block">
            </div>

            <div class="dropdown d-none d-md-block ms-2">
                <div class="dropdown-menu dropdown-menu-end">

                    <!-- item-->
                </div>
            </div>






            <div class="dropdown d-none d-lg-inline-block ms-1">
                <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                    <i class="mdi mdi-fullscreen"></i>
                </button>
            </div>

            <div class="dropdown d-inline-block">
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                    aria-labelledby="page-header-notifications-dropdown">
              
                    <div data-simplebar style="max-height: 230px;">
                        <a href="#" class="text-reset notification-item">
                            <div class="media">
                                <div class="avatar-xs me-3">
                                    <span class="avatar-title bg-primary rounded-circle font-size-16">
                                        <i class="mdi mdi-cart text-white"></i>
                                    </span>
                                </div>
                                <div class="media-body">
                                    <h6 class="mt-0 mb-1">Your order is placed</h6>
                                    <div class="font-size-13 text-muted">
                                        <p class="mb-1">If several languages coalesce the grammar</p>
                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 3 min ago</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="text-reset notification-item">
                            <div class="media">
                                <img src="{{asset('auth/assets/images/users/avatar-3.jpg')}}"
                                    class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                <div class="media-body">
                                    <h6 class="mt-0 mb-1">{{ auth()->user()->name }}</h6>
                                    <div class="font-size-13 text-muted">
                                        <p class="mb-1">It will seem like simplified English.</p>
                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 1 hours ago</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="text-reset notification-item">
                            <div class="media">
                                <div class="avatar-xs me-3">
                                    <span class="avatar-title bg-success rounded-circle font-size-16">
                                        <i class="mdi mdi-check text-white"></i>
                                    </span>
                                </div>
                                <div class="media-body">
                                    <h6 class="mt-0 mb-1">Your item is shipped</h6>
                                    <div class="font-size-13 text-muted">
                                        <p class="mb-1">If several languages coalesce the grammar</p>
                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 3 min ago</p>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <a href="#" class="text-reset notification-item">
                            <div class="media">
                                <img src="{{asset('auth/assets/images/users/avatar-4.jpg')}}"
                                    class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                <div class="media-body">
                                    <h6 class="mt-0 mb-1">Salena Layfield</h6>
                                    <div class="font-size-13 text-muted">
                                        <p class="mb-1">As a skeptical Cambridge friend of mine occidental.</p>
                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 1 hours ago</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="p-2 border-top">
                        <a class="btn btn-sm btn-link font-size-14 w-100 text-center" href="javascript:void(0)">
                            <i class="mdi mdi-arrow-right-circle me-1"></i> View More..
                        </a>
                    </div>
                </div>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user" src="{{ asset( auth()->user()->image) }}"
                        alt="Header Avatar">
                    <span class="d-none d-xl-inline-block ms-1">{{ auth()->user()->name }}</span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- Check if the user is authenticated -->
                    @if(Auth::check())
                        <!-- Display Profile and Logout options -->
                        <a class="dropdown-item" href="{{route('profiles.index')}}"><i class="mdi mdi-account-circle-outline font-size-16 align-middle me-1"></i> Profile</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="mdi mdi-power font-size-16 align-middle me-1 text-danger"></i> Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @else
                        <!-- Display Login and Register options -->
                        <a class="dropdown-item" href="{{ route('login') }}"><i class="mdi mdi-login font-size-16 align-middle me-1"></i> Login</a>
                        <a class="dropdown-item" href="{{ route('register') }}"><i class="mdi mdi-account-plus font-size-16 align-middle me-1"></i> Register</a>
                    @endif
                </div>
                
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                    <i class="mdi mdi-cog-outline font-size-20"></i>
                </button>
            </div>

        </div>
    </div>
</header>
