<div class="top">
    <div class="top__background"></div>
    <div class="container">
        <div class="top__tagline"> Counseling and psychotherapy for individuals, couples and families</div>
        <nav class="top__menu">
            <ul id="menu-top-menu" class="top-navigation">
                <li class="menu-item menu-item-has-children"><a href="extras.html">Extras</a>
                    <ul class="sub-menu">
                        <li class="menu-item"><a href="shortcodes.html">Shortcodes</a></li>
                        <li class="menu-item"><a href="brochure-box.html">Brochure Box</a></li>
                    </ul>
                </li>
                <li class="menu-item"><a href="http://themeforest.net/item/psychology-counseling-medical-website-template-mentalpress/14310650?ref=surjithctly&amp;utm_source=live_demo_link">Buy Now</a></li>
                <li class="menu-item"><a target="_blank" href="https://demo.web3canvas.com/themeforest/docs/html/mentalpress/">Theme Documentation</a></li>
            </ul>
        </nav>
    </div>
</div>

<!-- ========  // END TOP BAR ======== -->

<!-- ============================
  HEADER
 ============================ -->

<div class="container">
    <header class="header">
        <div class="logo">
            <a href="index.html"> <img src="{{asset('assets/images/logo.png') }}" alt="MentalPress" srcset="{{asset('assets/images/logo.png') }}, {{asset('assets/images/logo_2x.png 2x') }}" class="img-responsive" width="260" height="90"> </a>
        </div>
        <a href="#main-navigation" class="navbar-toggle"> <span class="navbar-toggle__text">MENU</span> <span class="navbar-toggle__icon-bar"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </span>
        </a>
        <div class="header-widgets">
            <div class="widget  header-widgets__widget  widget-icon-box">
                <div class="icon-box"><i class="fa  fa-home  fa-3x"></i>
                    <div class="icon-box__text">
                        <h4 class="icon-box__title">227 Marion Street</h4>
                        <span class="icon-box__subtitle">Columbia, SC 29201</span></div>
                </div>
            </div>
            <div class="widget  header-widgets__widget  widget-icon-box">
                <div class="icon-box"><i class="fa  fa-clock-o  fa-3x"></i>
                    <div class="icon-box__text">
                        <h4 class="icon-box__title">Mon - Sat 8.00 - 18.00</h4>
                        <span class="icon-box__subtitle">Sunday CLOSED</span></div>
                </div>
            </div>

            <div class="widget header-widgets__widget widget-social-icons">
                <!-- Social Media Icons -->
             
                <a class="social-icons__link" href="https://www.youtube.com/user/surjithctly" target="_blank">
                    <i class="fa fa-youtube"></i>
                </a>
            
                <!-- Authenticated User Links -->
                @guest
                    <!-- Show Login and Register Icons if user is not authenticated -->
                    <a class="social-icons__link" href="{{ route('login') }}">
                        <i class="fa fa-sign-in"></i>
                    </a>
                    <a class="social-icons__link" href="{{ route('register') }}">
                        <i class="fa fa-user-plus"></i>
                    </a>
                @else
                    <!-- Show Logout Icon if user is authenticated -->
                    <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                        @csrf
                        <button type="submit" class="social-icons__link" style="background: none; border: none; cursor: pointer;">
                            <i class="fa fa-sign-out"></i>
                        </button>
                    </form>
                @endguest
            </div>

            <div class="widget  header-widgets__widget  widget_text">
                <div class="textwidget"><a class="btn  btn-danger  btn-rounded" href="tel:18881234567" target="_self"><i class="fa fa-phone"></i> 1-888-123-4567</a></div>

            </div>

        </div>
    </header>
</div>
