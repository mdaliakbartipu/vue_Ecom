<div id="sidebar" class="sidebar responsive  ace-save-state">
    <script type="text/javascript">
        try {
            ace.settings.loadState('sidebar')
        } catch (e) {}
    </script>

    <div class="sidebar-shortcuts" id="sidebar-shortcuts">
        <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
            <button class="btn btn-success">
                <i class="ace-icon fa fa-signal"></i>
            </button>

            <button class="btn btn-info">
                <i class="ace-icon fa fa-pencil"></i>
            </button>

            <button class="btn btn-warning">
                <i class="ace-icon fa fa-users"></i>
            </button>

            <button class="btn btn-danger">
                <i class="ace-icon fa fa-cogs"></i>
            </button>
        </div>

        <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
            <span class="btn btn-success"></span>

            <span class="btn btn-info"></span>

            <span class="btn btn-warning"></span>

            <span class="btn btn-danger"></span>
        </div>
    </div><!-- /.sidebar-shortcuts -->

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
                                <span class="menu-text"> Add </span>
                            </a>
                            <b class="arrow"></b>
                        </li>
                        <li class="{{ request()->is('size') ? 'active' : '' }}">
                            <a href="{{ url('size') }}">
                                <i class="menu-icon fa fa-list-alt"></i>
                                <span class="menu-text"> List </span>
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

                <li class="{{ request()->is('sleeve')||request()->is('sleeve/create') ? 'active' : '' }}">

                    <a href="#" class="dropdown-toggle">
                        </i>
                        <span class="menu-text">
                            Sleeves
                        </span>
                        <b class="arrow fa fa-angle-down"></b>
                    </a><b class="arrow"></b>

                    <ul class="submenu">
                        <li class="{{ request()->is('sleeve/create') ? 'active' : '' }}">
                            <a href="{{ url('sleeve/create') }}">
                                <i class="menu-icon fa fa-list-alt"></i>
                                <span class="menu-text"> Add </span>
                            </a>
                            <b class="arrow"></b>
                        </li>
                        <li class="{{ request()->is('sleeve') ? 'active' : '' }}">
                            <a href="{{ url('sleeve') }}">
                                <i class="menu-icon fa fa-list-alt"></i>
                                <span class="menu-text"> List </span>
                            </a>
                            <b class="arrow"></b>
                        </li>
                    </ul>
                </li>

                <li class="{{ request()->is('leglength')||request()->is('leglength/create') ? 'active' : '' }}">

                    <a href="#" class="dropdown-toggle">
                        </i>
                        <span class="menu-text">
                            Leglengths
                        </span>
                        <b class="arrow fa fa-angle-down"></b>
                    </a><b class="arrow"></b>

                    <ul class="submenu">
                        <li class="{{ request()->is('leglength/create') ? 'active' : '' }}">
                            <a href="{{ url('leglength/create') }}">
                                <i class="menu-icon fa fa-list-alt"></i>
                                <span class="menu-text"> Add </span>
                            </a>
                            <b class="arrow"></b>
                        </li>
                        <li class="{{ request()->is('leglength') ? 'active' : '' }}">
                            <a href="{{ url('leglength') }}">
                                <i class="menu-icon fa fa-list-alt"></i>
                                <span class="menu-text"> List </span>
                            </a>
                            <b class="arrow"></b>
                        </li>
                    </ul>
                </li>

                <li class="{{ request()->is('fit')||request()->is('fit/create') ? 'active' : '' }}">

                    <a href="#" class="dropdown-toggle">
                        </i>
                        <span class="menu-text">
                            Fits
                        </span>
                        <b class="arrow fa fa-angle-down"></b>
                    </a><b class="arrow"></b>

                    <ul class="submenu">
                        <li class="{{ request()->is('fit/create') ? 'active' : '' }}">
                            <a href="{{ url('fit/create') }}">
                                <i class="menu-icon fa fa-list-alt"></i>
                                <span class="menu-text"> Add </span>
                            </a>
                            <b class="arrow"></b>
                        </li>
                        <li class="{{ request()->is('fit') ? 'active' : '' }}">
                            <a href="{{ url('fit') }}">
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
                <li class="{{ request()->is('order/accepted/list') ? 'active' : '' }}">
                            <a href="{{ url('order/accepted/list') }}">
                                <i class="menu-icon fa fa-list-alt"></i>
                                <span class="menu-text"> Accepted Orders </span>
                            </a>
                            <b class="arrow"></b>
                </li>
                <li class="{{ request()->is('order/delivered/list') ? 'active' : '' }}">
                            <a href="{{ url('order/delivered/list') }}">
                                <i class="menu-icon fa fa-list-alt"></i>
                                <span class="menu-text"> Delivered Orders </span>
                            </a>
                            <b class="arrow"></b>
                </li>
               

            </ul>
        </li>

        <li class="{{ request()->segment(1) == "group" ? 'open' : '' }}">
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

                <li class="{{-- {{ request()->segment(1) == "group" ? 'open' : '' }} --}}">

                        <li class="{{ request()->is('product/create') ? 'active' : '' }}">
                            <a href="{{ url('product/create') }}">
                                <i class="menu-icon fa fa-list-alt"></i>
                                <span class="menu-text"> Add Quantity </span>
                            </a>
                        </li>

                        <li class="{{ request()->is('product/create') ? 'active' : '' }}">
                            <a href="{{ url('product/create') }}">
                                <i class="menu-icon fa fa-list-alt"></i>
                                <span class="menu-text"> Products In Hand </span>
                            </a>
                        </li>

                        <li class="{{ request()->is('product/create') ? 'active' : '' }}">
                            <a href="{{ url('product/create') }}">
                                <i class="menu-icon fa fa-list-alt"></i>
                                <span class="menu-text"> Product Sold Out </span>
                            </a>
                        </li>

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

                <li class="{{-- {{ request()->segment(1) == "group" ? 'open' : '' }} --}}">

                    <a href="{{ url('product') }}" class="dropdown-toggle">
                        </i>
                        <span class="menu-text">
                            Admin
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
                            User
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

            </ul>
        </li>





    </ul><!-- /.nav-list -->

    <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
        <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
    </div>
</div>