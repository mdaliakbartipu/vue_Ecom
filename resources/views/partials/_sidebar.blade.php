<div id="sidebar" class="sidebar responsive  ace-save-state">
    <script type="text/javascript">
        try {
            ace.settings.loadState('sidebar')
        } catch (e) {}
    </script>



    <ul class="nav nav-list">
        <li class="{{ request()->is('home') ? 'active' : '' }}">
            <a href="{{ url('/sadmin') }}">
                <i class="menu-icon fa fa-tachometer"></i>
                <span class="menu-text"> Dashboard </span>
            </a>

            <a target="_blank" href="{{ url('/') }}" class="text-center" style="border:1px solid grey;padding:1em;margin:1em;background:rgb(140, 145, 152);color:rgb(170, 203, 255)">
                <span class="menu-text text-center"><b>Visit Website </b> </span>
            </a>

            <b class="arrow"></b>
        </li>



        <li class="{{ request()->segment(1) == "group" ? 'open' : '' }}">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-gear">
                </i>
                <span class="menu-text">
                    Product Management
                </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>


            <ul class="submenu">

                <li class="{{-- {{ request()->segment(1) == "group" ? 'open' : '' }} --}}">

                    <a href="{{ url('product') }}" class="dropdown-toggle">
                        </i>
                        <span class="menu-text">
                            Product
                        </span>
                        <b class="arrow fa fa-angle-down"></b>
                    </a><b class="arrow"></b>

                    <ul class="submenu">
                        <li class="{{ request()->is('product/create') ? 'active' : '' }}">
                            <a href="{{ url('product/create') }}">
                                <i class="menu-icon fa fa-list-alt"></i>
                                <span class="menu-text"> Add </span>
                            </a>
                            <b class="arrow"></b>
                        </li>
                        <li class="{{ request()->is('product') ? 'active' : '' }}">
                            <a href="{{ url('product') }}">
                                <i class="menu-icon fa fa-list-alt"></i>
                                <span class="menu-text"> List </span>
                            </a>
                            <b class="arrow"></b>
                        </li>
                    </ul>
                </li>

                <li class="{{ request()->is('category') ? 'active' : '' }}">

                    <a href="#" class="dropdown-toggle">
                        </i>
                        <span class="menu-text">
                            Category
                        </span>
                        <b class="arrow fa fa-angle-down"></b>
                    </a><b class="arrow"></b>

                    <ul class="submenu">
                        <li class="{{ request()->is('category/create') ? 'active' : '' }}">
                            <a href="{{ url('category/create') }}">
                                <i class="menu-icon fa fa-list-alt"></i>
                                <span class="menu-text"> Add </span>
                            </a>
                            <b class="arrow"></b>
                        </li>
                        <li class="{{ request()->is('category') ? 'active' : '' }}">
                            <a href="{{ url('category') }}">
                                <i class="menu-icon fa fa-list-alt"></i>
                                <span class="menu-text"> List </span>
                            </a>
                            <b class="arrow"></b>
                        </li>
                    </ul>
                </li>

                <li class="{{ request()->is('brand')||request()->is('brand/create') ? 'active' : '' }}">

                    <a href="#" class="dropdown-toggle">
                        </i>
                        <span class="menu-text">
                            Brands
                        </span>
                        <b class="arrow fa fa-angle-down"></b>
                    </a><b class="arrow"></b>

                    <ul class="submenu">
                        <li class="{{ request()->is('brand/create') ? 'active' : '' }}">
                            <a href="{{ url('brand/create') }}">
                                <i class="menu-icon fa fa-list-alt"></i>
                                <span class="menu-text"> Add </span>
                            </a>
                            <b class="arrow"></b>
                        </li>
                        <li class="{{ request()->is('brand') ? 'active' : '' }}">
                            <a href="{{ url('brand') }}">
                                <i class="menu-icon fa fa-list-alt"></i>
                                <span class="menu-text"> List </span>
                            </a>
                            <b class="arrow"></b>
                        </li>
                    </ul>
                </li>

                <li class="{{ request()->is('ptags')||request()->is('ptags/create') ? 'active' : '' }}">

                    <a href="#" class="dropdown-toggle">
                        </i>
                        <span class="menu-text">
                            Product Tags
                        </span>
                        <b class="arrow fa fa-angle-down"></b>
                    </a><b class="arrow"></b>

                    <ul class="submenu">
                        <li class="{{ request()->is('ptags/create') ? 'active' : '' }}">
                            <a href="{{ url('ptags/create') }}">
                                <i class="menu-icon fa fa-list-alt"></i>
                                <span class="menu-text"> Add </span>
                            </a>
                            <b class="arrow"></b>
                        </li>
                        <li class="{{ request()->is('ptags') ? 'active' : '' }}">
                            <a href="{{ url('ptags') }}">
                                <i class="menu-icon fa fa-list-alt"></i>
                                <span class="menu-text"> List </span>
                            </a>
                            <b class="arrow"></b>
                        </li>
                    </ul>
                </li>

                <li class="{{ request()->is('size')||request()->is('size/create') ? 'active' : '' }}">

                    <a href="#" class="dropdown-toggle">
                        </i>
                        <span class="menu-text">
                            Sizes
                        </span>
                        <b class="arrow fa fa-angle-down"></b>
                    </a><b class="arrow"></b>

                    <ul class="submenu">
                        <li class="{{ request()->is('size/create') ? 'active' : '' }}">
                            <a href="{{ url('size/create') }}">
                                <i class="menu-icon fa fa-list-alt"></i>
                                <span class="menu-text"> Add Size </span>
                            </a>
                            <b class="arrow"></b>
                        </li>
                        <li class="{{ request()->is('size/chart') ? 'active' : '' }}">
                            <a href="{{ url('size/chart') }}">
                                <i class="menu-icon fa fa-list-alt"></i>
                                <span class="menu-text"> Chart</span>
                            </a>
                            <b class="arrow"></b>
                        </li>
                        <li class="{{ request()->is('size') ? 'active' : '' }}">
                            <a href="{{ url('size') }}">
                                <i class="menu-icon fa fa-list-alt"></i>
                                <span class="menu-text"> Size List </span>
                            </a>
                            <b class="arrow"></b>
                        </li>
                    </ul>
                </li>

                <li class="{{ request()->is('color')||request()->is('color/create') ? 'active' : '' }}">

                    <a href="#" class="dropdown-toggle">
                        </i>
                        <span class="menu-text">
                            Colors
                        </span>
                        <b class="arrow fa fa-angle-down"></b>
                    </a><b class="arrow"></b>

                    <ul class="submenu">
                        <li class="{{ request()->is('color/create') ? 'active' : '' }}">
                            <a href="{{ url('color/create') }}">
                                <i class="menu-icon fa fa-list-alt"></i>
                                <span class="menu-text"> Add </span>
                            </a>
                            <b class="arrow"></b>
                        </li>
                        <li class="{{ request()->is('color') ? 'active' : '' }}">
                            <a href="{{ url('color') }}">
                                <i class="menu-icon fa fa-list-alt"></i>
                                <span class="menu-text"> List </span>
                            </a>
                            <b class="arrow"></b>
                        </li>
                    </ul>
                </li>


                <li class="{{ request()->is('commoninfo')||request()->is('commoninfo') ? 'active' : '' }}">

                    <a href="{{ url('commoninfo') }}">
                        <span class="menu-text">
                            Common info
                        </span>
                    </a>

                </li>

            </ul>
        </li>

        <li class="{{ request()->segment(1) == "group" ? 'open' : '' }}">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-gear">
                </i>
                <span class="menu-text">
                    Web Management
                </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>


            <ul class="submenu">

                <!-- <li class="{{-- {{ request()->segment(1) == "group" ? 'open' : '' }} --}}">

                    <a href="{{ url('banner') }}" class="dropdown-toggle">
                        </i>
                        <span class="menu-text">
                            TopLeft Banners
                        </span>
                        <b class="arrow fa fa-angle-down"></b>
                    </a><b class="arrow"></b>

                    <ul class="submenu">
                        <li class="{{ request()->is('banner/create') ? 'active' : '' }}">
                            <a href="{{ url('banner/create') }}">
                                <i class="menu-icon fa fa-list-alt"></i>
                                <span class="menu-text"> Add </span>
                            </a>
                            <b class="arrow"></b>
                        </li>
                        <li class="{{ request()->is('banner') ? 'active' : '' }}">
                            <a href="{{ url('banner') }}">
                                <i class="menu-icon fa fa-list-alt"></i>
                                <span class="menu-text"> List </span>
                            </a>
                            <b class="arrow"></b>
                        </li>
                    </ul>
                </li> -->

                <li class="{{ request()->is('slider') ? 'active' : '' }}">

                    <a href="#" class="dropdown-toggle">
                        </i>
                        <span class="menu-text">
                            Sliders
                        </span>
                        <b class="arrow fa fa-angle-down"></b>
                    </a><b class="arrow"></b>

                    <ul class="submenu">
                        <li class="{{ request()->is('slider/create') ? 'active' : '' }}">
                            <a href="{{ url('slider/create') }}">
                                <i class="menu-icon fa fa-list-alt"></i>
                                <span class="menu-text"> Add </span>
                            </a>
                            <b class="arrow"></b>
                        </li>
                        <li class="{{ request()->is('slider') ? 'active' : '' }}">
                            <a href="{{ url('slider') }}">
                                <i class="menu-icon fa fa-list-alt"></i>
                                <span class="menu-text"> List </span>
                            </a>
                            <b class="arrow"></b>
                        </li>
                    </ul>
                </li>

                <li class="{{ request()->is('promotion')||request()->is('promotion/create') ? 'active' : '' }}">

                    <a href="#" class="dropdown-toggle">
                        </i>
                        <span class="menu-text">
                            Promotions
                        </span>
                        <b class="arrow fa fa-angle-down"></b>
                    </a><b class="arrow"></b>

                    <ul class="submenu">
                        <li class="{{ request()->is('promotion/create') ? 'active' : '' }}">
                            <a href="{{ url('promotion/create') }}">
                                <i class="menu-icon fa fa-list-alt"></i>
                                <span class="menu-text"> Add </span>
                            </a>
                            <b class="arrow"></b>
                        </li>
                        <li class="{{ request()->is('promotion') ? 'active' : '' }}">
                            <a href="{{ url('promotion') }}">
                                <i class="menu-icon fa fa-list-alt"></i>
                                <span class="menu-text"> List </span>
                            </a>
                            <b class="arrow"></b>
                        </li>
                    </ul>
                </li>

                <li class="{{ request()->is('testimonial')||request()->is('testimonial/create') ? 'active' : '' }}">

                    <a href="#" class="dropdown-toggle">
                        </i>
                        <span class="menu-text">
                            Testimonials
                        </span>
                        <b class="arrow fa fa-angle-down"></b>
                    </a><b class="arrow"></b>

                    <ul class="submenu">
                        <li class="{{ request()->is('testimonial/create') ? 'active' : '' }}">
                            <a href="{{ url('testimonial/create') }}">
                                <i class="menu-icon fa fa-list-alt"></i>
                                <span class="menu-text"> Add </span>
                            </a>
                            <b class="arrow"></b>
                        </li>
                        <li class="{{ request()->is('testimonial') ? 'active' : '' }}">
                            <a href="{{ url('testimonial') }}">
                                <i class="menu-icon fa fa-list-alt"></i>
                                <span class="menu-text"> List </span>
                            </a>
                            <b class="arrow"></b>
                        </li>
                    </ul>
                </li>

                <li class="{{ request()->is('blog')||request()->is('blog/create') ? 'active' : '' }}">

                    <a href="#" class="dropdown-toggle">
                        </i>
                        <span class="menu-text">
                            Blogs
                        </span>
                        <b class="arrow fa fa-angle-down"></b>
                    </a><b class="arrow"></b>

                    <ul class="submenu">
                        <li class="{{ request()->is('blog/create') ? 'active' : '' }}">
                            <a href="{{ url('blog/create') }}">
                                <i class="menu-icon fa fa-list-alt"></i>
                                <span class="menu-text"> Add </span>
                            </a>
                            <b class="arrow"></b>
                        </li>
                        <li class="{{ request()->is('blog') ? 'active' : '' }}">
                            <a href="{{ url('blog') }}">
                                <i class="menu-icon fa fa-list-alt"></i>
                                <span class="menu-text"> List </span>
                            </a>
                            <b class="arrow"></b>
                        </li>
                    </ul>
                </li>

                <li class="{{ request()->is('company') ? 'active' : '' }}">
                    <a href="{{ url('company') }}">
                        <i class="menu-icon fa fa-list-alt"></i>
                        <span class="menu-text"> Company Info </span>
                    </a>
                </li>



                <li class="{{ request()->is('page') ? 'active' : '' }}">

                    <a href="#" class="dropdown-toggle">
                        </i>
                        <span class="menu-text">
                            Pages
                        </span>
                        <b class="arrow fa fa-angle-down"></b>
                    </a><b class="arrow"></b>

                    <ul class="submenu">
                        <li class="{{ request()->is('page/create') ? 'active' : '' }}">
                            <a href="{{ url('page/create') }}">
                                <i class="menu-icon fa fa-list-alt"></i>
                                <span class="menu-text"> Add </span>
                            </a>
                            <b class="arrow"></b>
                        </li>
                        <li class="{{ request()->is('page') ? 'active' : '' }}">
                            <a href="{{ url('page') }}">
                                <i class="menu-icon fa fa-list-alt"></i>
                                <span class="menu-text"> List </span>
                            </a>
                            <b class="arrow"></b>
                        </li>
                    </ul>
                </li>

            </ul>
        </li>

        <li class="{{ request()->segment(1) == "group" ? 'open' : '' }}">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-gear">
                </i>
                <span class="menu-text">
                    Orders
                </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>


            <ul class="submenu">


                <li class="{{ request()->is('order/new/list') ? 'active' : '' }}">
                    <a href="{{ url('order/new/list') }}">
                        <i class="menu-icon fa fa-list-alt"></i>
                        <span class="menu-text"> New Orders </span>
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="{{ request()->is('accepted-order') ? 'active' : '' }}">
                    <a href="{{ url('accepted-order') }}">
                        <i class="menu-icon fa fa-list-alt"></i>
                        <span class="menu-text"> Accepted Orders </span>
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="{{ request()->is('delivered-order') ? 'active' : '' }}">
                    <a href="{{ url('delivered-order') }}">
                        <i class="menu-icon fa fa-list-alt"></i>
                        <span class="menu-text"> Delivered Orders </span>
                    </a>
                    <b class="arrow"></b>
                </li>

                <li class="{{ request()->is('cancelled-order') ? 'active' : '' }}">
                    <a href="{{ url('cancelled-order') }}">
                        <i class="menu-icon fa fa-list-alt"></i>
                        <span class="menu-text"> Cancelled Orders </span>
                    </a>
                    <b class="arrow"></b>
                </li>


            </ul>
        </li>

        <li class="{{ request()->segment(1) == "inventory" ? 'open' : '' }}">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-gear">
                </i>
                <span class="menu-text">
                    Inventory
                </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                <li class="{{-- {{ request()->segment(1) == 'inventory' ? 'open' : '' }} --}}">
                <li class="{{ request()->is('inventory/purchase') ? 'active' : '' }}">
                    <a href="{{ url('inventory/purchase') }}">
                        <i class="menu-icon fa fa-list-alt"></i>
                        <span class="menu-text"> Purchase </span>
                    </a>
                </li>

                <li class="{{ request()->is('inventory/stock') ? 'active' : '' }}">
                    <a href="{{ url('inventory/stock') }}">
                        <i class="menu-icon fa fa-list-alt"></i>
                        <span class="menu-text"> Products In Hand </span>
                    </a>
                </li>

                <li class="{{ request()->is('inventory/sold') ? 'active' : '' }}">
                    <a href="{{ url('inventory/sold') }}">
                        <i class="menu-icon fa fa-list-alt"></i>
                        <span class="menu-text"> Product Sold Out </span>
                    </a>
                </li>

        </li>
    </ul>
    </li>



    <li class="{{ request()->segment(1) == "report" ? 'open' : '' }}">
        <a href="#" class="dropdown-toggle">
            <i class="menu-icon fa fa-gear">
            </i>
            <span class="menu-text">
                Reports
            </span>
            <b class="arrow fa fa-angle-down"></b>
        </a>
        <b class="arrow"></b>
        <ul class="submenu">
            <li class="{{-- {{ request()->segment(1) == "report" ? 'open' : '' }} --}}">
            <li class="{{ request()->is('report/sale-single') ? 'active' : '' }}">
                <a href="{{ url('report/sale-single') }}">
                    <i class="menu-icon fa fa-list-alt"></i>
                    <span class="menu-text"> Single Sale Report </span>
                </a>
            </li>

            <li class="{{ request()->is('report/sale-daily') ? 'active' : '' }}">
                <a href="{{ url('report/sale-daily') }}">
                    <i class="menu-icon fa fa-list-alt"></i>
                    <span class="menu-text"> Daily Sales </span>
                </a>
            </li>

            <li class="{{ request()->is('report/sale-monthly') ? 'active' : '' }}">
                <a href="{{ url('report/sale-monthly') }}">
                    <i class="menu-icon fa fa-list-alt"></i>
                    <span class="menu-text"> Monthly Sale </span>
                </a>
            </li>

            <li class="{{ request()->is('report/sale-yearly') ? 'active' : '' }}">
                <a href="{{ url('report/sale-yearly') }}">
                    <i class="menu-icon fa fa-list-alt"></i>
                    <span class="menu-text"> Yearly Sale </span>
                </a>
            </li>

    </li>
    </ul>
    </li>




    <li class="{{ request()->segment(1) == "settings" ? 'open' : '' }}">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-gear">
                </i>
                <span class="menu-text">
                    Technical Settings
                </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                <li class="{{-- {{ request()->segment(1) == 'settings' ? 'open' : '' }} --}}">
                <li class="{{ request()->is('settings/payment') ? 'active' : '' }}">
                    <a href="{{ url('settings/payment') }}">
                        <i class="menu-icon fa fa-list-alt"></i>
                        <span class="menu-text"> Payment setting </span>
                    </a>
                </li>

                <!-- <li class="{{ request()->is('settings/mail') ? 'active' : '' }}">
                    <a href="{{ url('settings/mail') }}">
                        <i class="menu-icon fa fa-list-alt"></i>
                        <span class="menu-text"> Mail Setting </span>
                    </a>
                </li> -->
        </li>
    </ul>
    </li>

    <li class="{{ request()->segment(1) == "group" ? 'open' : '' }}">
        <a href="#" class="dropdown-toggle">
            <i class="menu-icon fa fa-gear">
            </i>
            <span class="menu-text">
                User Management
            </span>
            <b class="arrow fa fa-angle-down"></b>
        </a>

        <b class="arrow"></b>



        <ul class="submenu">

            <li class="{{ request()->is('admin-user/create') ? 'active' : '' }}">
                <a href="{{ url('admin-user/create') }}">
                    <i class="menu-icon fa fa-list-alt"></i>
                    <span class="menu-text"> Add User or Admin </span>
                </a>
                <b class="arrow"></b>
            </li>

            <li class="{{ request()->is('admin-user/all') ? 'active' : '' }}">
                <a href="{{ url('admin-user/all') }}">
                    <i class="menu-icon fa fa-list-alt"></i>
                    <span class="menu-text"> All User/Admin List </span>
                </a>
                <b class="arrow"></b>
            </li>

            <li class="{{-- {{ request()->segment(1) == "group" ? 'open' : '' }} --}}">

                <a href="{{ url('dmin-user') }}" class="dropdown-toggle">
                    </i>
                    <span class="menu-text">
                        Admin
                    </span>
                    <b class="arrow fa fa-angle-down"></b>
                </a><b class="arrow"></b>

                <ul class="submenu">
                    <li class="{{ request()->is('admin-user') ? 'active' : '' }}">
                        <a href="{{ url('admin-user') }}">
                            <i class="menu-icon fa fa-list-alt"></i>
                            <span class="menu-text"> Active list </span>
                        </a>
                        <b class="arrow"></b>
                    </li>
                    <li class="{{ request()->is('admin-user/blocked') ? 'active' : '' }}">
                        <a href="{{ url('admin-user/blocked') }}">
                            <i class="menu-icon fa fa-list-alt"></i>
                            <span class="menu-text"> Blocked list </span>
                        </a>
                        <b class="arrow"></b>
                    </li>
                </ul>
            </li>

            <li class="{{ request()->is('category') ? 'active' : '' }}">

                <a href="#" class="dropdown-toggle">
                    </i>
                    <span class="menu-text">
                        User
                    </span>
                    <b class="arrow fa fa-angle-down"></b>
                </a><b class="arrow"></b>

                <ul class="submenu">
                    <li class="{{ request()->is('user') ? 'active' : '' }}">
                        <a href="{{ url('user') }}">
                            <i class="menu-icon fa fa-list-alt"></i>
                            <span class="menu-text"> Active list</span>
                        </a>
                        <b class="arrow"></b>
                    </li>
                    <li class="{{ request()->is('user/blocked') ? 'active' : '' }}">
                        <a href="{{ url('user/blocked') }}">
                            <i class="menu-icon fa fa-list-alt"></i>
                            <span class="menu-text"> Blocked list </span>
                        </a>
                        <b class="arrow"></b>
                    </li>
                </ul>
            </li>

        </ul>
    </li>





    </ul><!-- /.nav-list -->

    <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
        <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
    </div>
</div>