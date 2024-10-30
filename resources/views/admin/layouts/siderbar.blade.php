  <!-- ========== Left Sidebar Start ========== -->
  <div class="vertical-menu">

    <div data-simplebar class="h-100">


        <div class="user-sidebar text-center">
            <div class="dropdown">
                <div class="user-img">
                    <img src="{{ asset( auth()->user()->image) }}" alt="" class="rounded-circle">
                    <span class="avatar-online bg-success"></span>
                </div>
                <div class="user-info">
                    <h5 class="mt-3 font-size-16 text-white">{{ auth()->user()->name }}</h5>
                    <span class="font-size-13 text-white-50">Administrator</span>
                </div>
            </div>
        </div>



        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="{{ url('admin/dashboard') }}" class="waves-effect">
                        <i class="dripicons-home"></i><span class="badge rounded-pill bg-info float-end"></span>
                        <span>Dashboard</span>
                    </a>
                </li>
                

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="dripicons-mail"></i>
                        <span>Services</span>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="{{route('services.create')}}">Create Services</a></li>
                        <li><a href="{{route('services.index')}}">Show Services</a></li>
                    </ul>
                </li>

           
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="dripicons-cart"></i>
                        <span>Ecommerce</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="ecommerce-products.html">Products</a></li>
                        <li><a href="ecommerce-product-detail.html">Product Detail</a></li>
                        <li><a href="ecommerce-orders.html">Orders</a></li>
                        <li><a href="ecommerce-customers.html">Customers</a></li>
                        <li><a href="ecommerce-cart.html">Cart</a></li>
                        <li><a href="ecommerce-checkout.html">Checkout</a></li>
                        <li><a href="ecommerce-shops.html">Shops</a></li>
                        <li><a href="ecommerce-add-product.html">Add Product</a></li>
                    </ul>
                </li>

           

          
          

             

            

          

   

        

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>


<!-- Left Sidebar End -->