


<div class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
    <!--left-fixed -navigation-->
    <aside class="sidebar-left">
      <nav class="navbar navbar-inverse">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".collapse" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <h1><a class="navbar-brand" href="index.html"><span class="fa fa-area-chart"></span> Glance<span class="dashboard_text">Design dashboard</span></a></h1>
          </div>
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="sidebar-menu">
              <li class="header">MAIN NAVIGATION</li>
              <li class="treeview">
                <a href="index.html">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
              </li>

               <li class="treeview">
                <a href="{{url("/view")}}">
                <i class="fa fa-pie-chart"></i>
                <span>New Arrivel</span>
                <span class="label label-primary pull-right">new</span>
                </a>
              </li>

              
        <li class="treeview">
                <a href="#">
                <i class="fa fa-product-hunt"></i>
                <span>catagory</span>
                <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li><a href="{{url("/add_catagory")}}"><i class="fa fa-plus"></i>Add new catagory</a></li>
                  <li><a href="{{url("/managecatagory")}}"><i class="fa fa-cog"></i>Manage</a></li>
                </ul>
              </li>
                 <li class="treeview">
                <a href="#">
                <i class="fa fa-product-hunt"></i>
                <span>Sub catagory</span>
                <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li><a href="{{url("/add_sub")}}"><i class="fa fa-plus"></i>Add subcatagory</a></li>
                  <li><a href="{{url("/managesubcatagory")}}"><i class="fa fa-cog"></i>Manage</a></li>
                </ul>
              </li>

               <li class="treeview">
                <a href="#">
                <i class="fa fa-product-hunt"></i>
                <span>Product</span>
                <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li><a href="{{url("/add_product")}}"><i class="fa fa-plus"></i>Add Product</a></li>
                  <li><a href="{{url("/manageproduct")}}"><i class="fa fa-cog"></i>Manage</a></li>
                </ul>
              </li>


<li class="treeview">
                <a href="{{url("/viewcart")}}">
                <i class="fa fa-shopping-cart"></i>
                <span>Cart</span>
                
</a>
</li>

 <li class="treeview">
                <a href="#">
                <i class="fa fa-product-hunt"></i>
                <span>chart</span>
                <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li><a href="{{url("/productanalysis")}}"><i class="fa fa-bar-chart"></i>Selling information</a></li>
                  <li><a href="{{url("/useranalysis")}}"><i class="fa fa-line-chart"></i>User information</a></li>
                </ul>
              </li>
    



                  <li class="treeview">
               
                <li> <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                           Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form></li>

              </li>






























              <li class="treeview">
                <a href="charts.html">
                <i class="fa fa-pie-chart"></i>
                <span>Charts</span>
                <span class="label label-primary pull-right">new</span>
                </a>
              </li>
              <li class="treeview">
              <li class="treeview">
                <a href="#">
                <i class="fa fa-laptop"></i>
                <span>UI Elements</span>
                <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li><a href="general.html"><i class="fa fa-angle-right"></i> General</a></li>
                  <li><a href="icons.html"><i class="fa fa-angle-right"></i> Icons</a></li>
                  <li><a href="buttons.html"><i class="fa fa-angle-right"></i> Buttons</a></li>
                  <li><a href="typography.html"><i class="fa fa-angle-right"></i> Typography</a></li>
                </ul>
              </li>
        <li>
                <a href="widgets.html">
                <i class="fa fa-th"></i> <span>Widgets</span>
                <small class="label pull-right label-info">08</small>
                </a>
              </li>
              <li class="treeview">
                <a href="#">
                <i class="fa fa-edit"></i> <span>Forms</span>
                <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li><a href="forms.html"><i class="fa fa-angle-right"></i> General Forms</a></li>
                  <li><a href="validation.html"><i class="fa fa-angle-right"></i> Form Validations</a></li>
                </ul>
              </li>
              <li class="treeview">
                <a href="#">
                <i class="fa fa-table"></i> <span>Tables</span>
                <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li><a href="tables.html"><i class="fa fa-angle-right"></i> Simple tables</a></li>
                </ul>
              </li>
              <li class="treeview">
                <a href="#">
                <i class="fa fa-envelope"></i> <span>Mailbox </span>
                <i class="fa fa-angle-left pull-right"></i><small class="label pull-right label-info1">08</small><span class="label label-primary1 pull-right">02</span></a>
                <ul class="treeview-menu">
                  <li><a href="inbox.html"><i class="fa fa-angle-right"></i> Mail Inbox </a></li>
                  <li><a href="compose.html"><i class="fa fa-angle-right"></i> Compose Mail </a></li>
                </ul>
              </li>
              <li class="treeview">
                <a href="#">
                <i class="fa fa-folder"></i> <span>Examples</span>
                <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li><a href="login.html"><i class="fa fa-angle-right"></i> Login</a></li>
                  <li><a href="signup.html"><i class="fa fa-angle-right"></i> Register</a></li>
                  <li><a href="404.html"><i class="fa fa-angle-right"></i> 404 Error</a></li>
                  <li><a href="500.html"><i class="fa fa-angle-right"></i> 500 Error</a></li>
                  <li><a href="blank-page.html"><i class="fa fa-angle-right"></i> Blank Page</a></li>
                </ul>
              </li>
              <li class="header">LABELS</li>
              <li><a href="#"><i class="fa fa-angle-right text-red"></i> <span>Important</span></a></li>
              <li><a href="#"><i class="fa fa-angle-right text-yellow"></i> <span>Warning</span></a></li>
              <li><a href="#"><i class="fa fa-angle-right text-aqua"></i> <span>Information</span></a></li>
            </ul>
          </div>
          <!-- /.navbar-collapse -->
      </nav>
    </aside>
  </div>