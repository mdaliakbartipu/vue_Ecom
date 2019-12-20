<div id="sidebar" class="sidebar                  responsive                    ace-save-state">
    <script type="text/javascript">
        try{ace.settings.loadState('sidebar')}catch(e){}
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

    
             

         <li class="{{ request()->is('slider') ? 'active' : '' }}">
            <a href="{{ url('slider') }}">
                <i class="menu-icon fa fa-sliders" ></i>
                <span class="menu-text"> Slider </span>
            </a>
            <b class="arrow"></b>

       



{{-- Product Section --}}

        <li class="{{ request()->segment(1) == "group" ? 'open' : '' }}">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-gear"></i>
                <span class="menu-text">
                                Product Management
                            </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>

        <b class="arrow"></b>

        
         <ul class="submenu">
                
                <li class="{{-- {{ request()->segment(1) == "group" ? 'open' : '' }} --}}">
                    <a href="{{ url('product') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Products
                    </a>
                </li>
                
                <li class="{{-- {{ request()->segment(1) == "group" ? 'open' : '' }} --}}">
                    <a href="{{ url('size') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Sizes
                    </a>
                </li>
                <li class="">
                    <a href="{{ url('color') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Colors
                    </a>
                </li><li class="">
                    <a href="{{ url('sleeve') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Sleeves
                    </a>
                </li><li class="">
                    <a href="{{ url('leglength') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Leg lengths
                    </a>
                </li><li class="">
                    <a href="{{ url('fit') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Fits
                    </a>
                </li><li class="">
                    <a href="{{ url('brand') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Brands
                    </a>
                </li>

            </ul>
        </li>
     </li>

         <li class="{{ request()->is('page') ? 'active' : '' }}">
             <a href="{{ url('page') }}">
                 <i class="menu-icon fa fa-file"></i>
                <span class="menu-text"> Pages </span>
            </a>

            <b class="arrow"></b>
        </li>


         <li class="{{ request()->is('user') ? 'active' : '' }}">
             <a href="{{ url('user') }}">
                <i class="menu-icon fa fa-user" ></i>
                <span class="menu-text"> Users </span>
            </a>
            <b class="arrow"></b>
        </li>

         <li class="{{ request()->is('company') ? 'active' : '' }}">
             <a href="{{ url('company') }}">
               <i class="menu-icon fa fa-building-o" ></i>
                <span class="menu-text"> Company </span>
            </a>
            <b class="arrow"></b>
        </li>

         <li class="{{ request()->is('category') ? 'active' : '' }}">
             <a href="{{ url('category') }}">
               <i class="menu-icon fa fa-list-alt" ></i>
                <span class="menu-text"> Category </span>
            </a>
            <b class="arrow"></b>
        </li>

         <li class="{{ request()->is('testimonial') ? 'active' : '' }}">
             <a href="{{ url('testimonial') }}">
               <i class="menu-icon fa fa-quote-left"></i>
                <span class="menu-text"> Testimonial </span>
            </a>
            <b class="arrow"></b>
        </li>
        <li class="{{ request()->is('blog') ? 'active' : '' }}">
             <a href="{{ url('blog') }}">
             <i class="menu-icon fa fa-sliders" ></i>
                <span class="menu-text"> Blog </span>
            </a>
            <b class="arrow"></b>
        </li>
         <li class="{{ request()->is('promotion') ? 'active' : '' }}">
             <a href="{{ url('promotion') }}">
               <i class="menu-icon fa fa-list-alt" ></i>
              {{--  <i class="menu-icon fa fa-accessible-icon"></i> --}}
                <span class="menu-text"> Promotion </span>
            </a>
            <b class="arrow"></b>
        </li>
{{--         
        <li class="{{ request()->is('product') ? 'active' : '' }}">
             <a href="{{ url('product') }}">
               <i class="menu-icon fa fa-list-alt" ></i>
                <span class="menu-text"> Product </span>
            </a>
            <b class="arrow"></b>
        </li>
           --}}






    </ul><!-- /.nav-list -->

    <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
        <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
    </div>
</div>
