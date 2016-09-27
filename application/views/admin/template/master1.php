<!DOCTYPE html>
<html lang="en">
  <head>
  <title><?php echo $title ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="admin-themes-lab">
    <meta name="author" content="themes-lab">
    <link rel="shortcut icon" href="/assets/global/images/favicon.png" type="image/png">
   

    <link href="/assets/global/css/style.css" rel="stylesheet">
    <link href="/assets/global/css/theme.css" rel="stylesheet">
    <link href="/assets/global/css/ui.css" rel="stylesheet">    
    <script src="/assets/global/plugins/modernizr/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!-- BEGIN PAGE STYLE -->
    <link href="/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet">
    <link href="/assets/global/plugins/datatables/dataTables.min.css" rel="stylesheet">
    <link href="/assets/global/plugins/metrojs/metrojs.min.css" rel="stylesheet">
    <link href="/assets/global/plugins/maps-amcharts/ammap/ammap.min.css" rel="stylesheet">
    <link href="/assets/global/plugins/rateit/rateit.css" rel="stylesheet">
    <!-- <link href="/assets/global/plugins/select2/select2-bootstrap.css" rel="stylesheet"> -->
    <link href="/assets/admin/layout3/css/layout.css" rel="stylesheet">
<!--     <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
     -->    <!-- END PAGE STYLE -->
  </head>
  <!-- LAYOUT: Apply "submenu-hover" class to body element to have sidebar submenu show on mouse hover -->
  <!-- LAYOUT: Apply "sidebar-collapsed" class to body element to have collapsed sidebar -->
  <!-- LAYOUT: Apply "sidebar-top" class to body element to have sidebar on top of the page -->
  <!-- LAYOUT: Apply "sidebar-hover" class to body element to show sidebar only when your mouse is on left / right corner -->
  <!-- LAYOUT: Apply "submenu-hover" class to body element to show sidebar submenu on mouse hover -->
  <!-- LAYOUT: Apply "fixed-sidebar" class to body to have fixed sidebar -->
  <!-- LAYOUT: Apply "fixed-topbar" class to body to have fixed topbar -->
  <!-- LAYOUT: Apply "rtl" class to body to put the sidebar on the right side -->
  <!-- LAYOUT: Apply "boxed" class to body to have your page with 1200px max width -->

  <!-- THEME STYLE: Apply "theme-sdtl" for Sidebar Dark / Topbar Light -->
  <!-- THEME STYLE: Apply  "theme sdtd" for Sidebar Dark / Topbar Dark -->
  <!-- THEME STYLE: Apply "theme sltd" for Sidebar Light / Topbar Dark -->
  <!-- THEME STYLE: Apply "theme sltl" for Sidebar Light / Topbar Light -->
  
  <!-- THEME COLOR: Apply "color-default" for dark color: #2B2E33 -->
  <!-- THEME COLOR: Apply "color-primary" for primary color: #319DB5 -->
  <!-- THEME COLOR: Apply "color-red" for red color: #C9625F -->
  <!-- THEME COLOR: Apply "color-green" for green color: #18A689 -->
  <!-- THEME COLOR: Apply "color-orange" for orange color: #B66D39 -->
  <!-- THEME COLOR: Apply "color-purple" for purple color: #6E62B5 -->
  <!-- THEME COLOR: Apply "color-blue" for blue color: #4A89DC -->
  <!-- BEGIN BODY -->
  <body class="sidebar-light fixed-topbar theme-sltl bg-light-dark color-default dashboard">
    <!--[if lt IE 7]>
    <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    <section>
      <!-- BEGIN SIDEBAR -->
      <div class="sidebar">
        <div class="logopanel">
          <h1>
            <a href="dashboard.html"></a>
          </h1>
        </div>
        <div class="sidebar-inner">
          <ul class="nav nav-sidebar">
            <li class=" nav-active <?php if (($this->uri->segment(1)=="admin")&&($this->uri->segment(2)==null)): ?>
              <?php echo 'active'; ?>
              <?php endif ?>"><a href="/admin"><i class="icon-home"></i><span>Dashboard</span></a></li>
            <li class="nav-parent <?php if (($this->uri->segment(2)=="customer")||($this->uri->segment(2)=="item")||($this->uri->segment(2)=="productlist")||($this->uri->segment(2)=="supplier")||($this->uri->segment(2)=="bank")||($this->uri->segment(2)=="branch")): ?>
              <?php echo 'active'; ?>
              <?php endif ?>>">
              <a href="#"><i class="icon-puzzle"></i><span>Forms and Setup</span> <span class="fa arrow"></span></a>
              <ul class="children collapse">
                <li <?php echo ($this->uri->segment(2)=="customer")? "class='active'":null; ?>><a href="/admin/customer"> Customer</a></li>
                <li <?php echo ($this->uri->segment(2)=="supplier")? "class='active'":null; ?>><a href="/admin/supplier"> Supplier</a></li>
                <li <?php echo ($this->uri->segment(2)=="item")? "class='active'":null; ?>><a href="/admin/item"> Category</a></li>
                <li <?php echo ($this->uri->segment(2)=="productlist")? "class='active'":null; ?>><a href="/admin/productlist"> Products</a></li>
                <li <?php echo ($this->uri->segment(2)=="bank")? "class='active'":null; ?>><a href="/admin/bank"> Bank</a></li>
                <li <?php echo ($this->uri->segment(2)=="branch")? "class='active'":null; ?>><a href="/admin/branch"> Branch</a></li>
              </ul>
            </li>
            <li class="nav-parent <?php if (($this->uri->segment(2)=="purchase")||($this->uri->segment(2)=="sale")||($this->uri->segment(2)=="payment")||($this->uri->segment(2)=="receipt")||($this->uri->segment(2)=="quotation")): ?>
              <?php echo 'active'; ?>
              <?php endif; ?>">
              <a href="#"><i class="icon-bulb"></i><span>Transactions</span> <span class="fa arrow"></span></a>
              <ul class="children collapse">
                <li <?php echo ($this->uri->segment(2)=="purchase")? "class='active'":null; ?>><a href="/admin/purchase"> Purchase</a></li>
                <li <?php echo ($this->uri->segment(2)=="sale")? "class='active'":null; ?>><a href="/admin/sale"> Sale</a></li>
                <li <?php echo ($this->uri->segment(2)=="payment")? "class='active'":null; ?>><a href="/admin/payment"> Payment</a></li>
                <li <?php echo ($this->uri->segment(2)=="receipt")? "class='active'":null; ?>><a href="/admin/receipt"> Receipt</a></li>
                <li <?php echo ($this->uri->segment(2)=="quotation")? "class='active'":null; ?>><a href="/admin/quotation"> Quotation</a></li>
              </ul>
            </li>
            <li class="nav-parent <?php if (($this->uri->segment(2)=="reports")||($this->uri->segment(2)=="")||($this->uri->segment(2)=="")||($this->uri->segment(2)=="")||($this->uri->segment(2)=="")): ?>
              <?php echo 'active'; ?>
              <?php endif; ?>">
              <a href="#"><i class="icon-doc"></i><span>Reports</span> <span class="fa arrow"></span></a>
              <ul class="children collapse">
                <li <?php echo ($this->uri->segment(3)=="activity_reports"||(($this->uri->segment(2)=="reports")&&($this->uri->segment(3)==null)))? "class='active'":null; ?>><a href="/admin/reports/activity_reports"> Activit/Reports</a></li>
                <li <?php echo ($this->uri->segment(3)=="sale_purchase")? "class='active'":null; ?>><a href="/admin/reports/sale_purchase"> Sale/Purchase</a></li>
                <li <?php echo ($this->uri->segment(3)=="payment_receipt")? "class='active'":null; ?>><a href="/admin/reports/payment_receipt"> Payment/Receipt</a></li>
                <li <?php echo ($this->uri->segment(3)=="cash_book")? "class='active'":null; ?>><a href="/admin/reports/cash_book"> Cash Book</a></li>
                <li <?php echo ($this->uri->segment(3)=="bank_book")? "class='active'":null; ?>><a href="/admin/reports/bank_book"> Bank Book</a></li>
                <li <?php echo ($this->uri->segment(3)=="customer_ledger")? "class='active'":null; ?>><a href="/admin/reports/customer_ledger"> Customer Ledger</a></li>
                <li <?php echo ($this->uri->segment(3)=="supplier_ledger")? "class='active'":null; ?>><a href="/admin/reports/supplier_ledger"> Supplier Ledger</a></li>
                <li <?php echo ($this->uri->segment(3)=="item_ledger")? "class='active'":null; ?>><a href="/admin/reports/item_ledger"> Item Ledger</a></li>
                <li <?php echo ($this->uri->segment(3)=="stock_hand")? "class='active'":null; ?>><a href="/admin/reports/stock_hand"> Stock in Hand</a></li>
                <li <?php echo ($this->uri->segment(3)=="account_receivable")? "class='active'":null; ?>><a href="/admin/reports/account_receivable"> Accounts Receivable</a></li>
                <li <?php echo ($this->uri->segment(3)=="account_payable")? "class='active'":null; ?>><a href="/admin/reports/account_payable"> Accounts Payable</a></li>
              </ul>
            </li>
             <li class="nav-parent <?php if (($this->uri->segment(2)=="reports")||($this->uri->segment(2)=="")||($this->uri->segment(2)=="")||($this->uri->segment(2)=="")||($this->uri->segment(2)=="")): ?>
              <?php echo 'active'; ?>
              <?php endif; ?>">
              <a href="#"><i class="icon-user"></i><span>User Management</span> <span class="fa arrow"></span></a>
              <ul class="children collapse">
                <li <?php echo ($this->uri->segment(3)=="activity_reports"||(($this->uri->segment(2)=="reports")&&($this->uri->segment(3)==null)))? "class='active'":null; ?>><a href="/admin/reports/activity_reports"> Activit/Reports</a></li>
                <li <?php echo ($this->uri->segment(3)=="sale_purchase")? "class='active'":null; ?>><a href="/admin/reports/sale_purchase"> Sale/Purchase</a></li>
                <li <?php echo ($this->uri->segment(3)=="payment_receipt")? "class='active'":null; ?>><a href="/admin/reports/payment_receipt"> Payment/Receipt</a></li>
                <li <?php echo ($this->uri->segment(3)=="cash_book")? "class='active'":null; ?>><a href="/admin/reports/cash_book"> Cash Book</a></li>
                <li <?php echo ($this->uri->segment(3)=="bank_book")? "class='active'":null; ?>><a href="/admin/reports/bank_book"> Bank Book</a></li>
                <li <?php echo ($this->uri->segment(3)=="customer_ledger")? "class='active'":null; ?>><a href="/admin/reports/customer_ledger"> Customer Ledger</a></li>
                <li <?php echo ($this->uri->segment(3)=="supplier_ledger")? "class='active'":null; ?>><a href="/admin/reports/supplier_ledger"> Supplier Ledger</a></li>
                <li <?php echo ($this->uri->segment(3)=="item_ledger")? "class='active'":null; ?>><a href="/admin/reports/item_ledger"> Item Ledger</a></li>
                <li <?php echo ($this->uri->segment(3)=="stock_hand")? "class='active'":null; ?>><a href="/admin/reports/stock_hand"> Stock in Hand</a></li>
                <li <?php echo ($this->uri->segment(3)=="account_receivable")? "class='active'":null; ?>><a href="/admin/reports/account_receivable"> Accounts Receivable</a></li>
                <li <?php echo ($this->uri->segment(3)=="account_payable")? "class='active'":null; ?>><a href="/admin/reports/account_payable"> Accounts Payable</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
      <!-- END SIDEBAR -->
      <div class="main-content">
        <!-- BEGIN TOPBAR -->
        <div class="topbar">
          <div class="header-left">
            <div class="topnav">
              <a class="menutoggle" href="#" data-toggle="sidebar-collapsed"><span class="menu__handle"><span>Menu</span></span></a>
              <ul class="nav nav-icons">
                <li><a href="#" class="toggle-sidebar-top"><span class="icon-user-following"></span></a></li>
                <li><a href="mailbox.html"><span class="octicon octicon-mail-read"></span></a></li>
                <li><a href="#"><span class="octicon octicon-flame"></span></a></li>
                <li><a href="builder-page.html"><span class="octicon octicon-rocket"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="header-right">
            <ul class="header-menu nav navbar-nav">
              <!-- BEGIN USER DROPDOWN -->
              <li class="dropdown" id="language-header">
                <a href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                <i class="icon-globe"></i>
                <span>Language</span>
                </a>
                <ul class="dropdown-menu">
                  <li>
                    <a href="#" data-lang="en"><img src="/assets/global/images/flags/usa.png" alt="flag-english"> <span>English</span></a>
                  </li>
                  <li>
                    <a href="#" data-lang="es"><img src="/assets/global/images/flags/spanish.png" alt="flag-english"> <span>Español</span></a>
                  </li>
                  <li>
                    <a href="#" data-lang="fr"><img src="/assets/global/images/flags/french.png" alt="flag-english"> <span>Français</span></a>
                  </li>
                </ul>
              </li>
              <!-- END USER DROPDOWN -->
              <!-- BEGIN NOTIFICATION DROPDOWN -->
              <li class="dropdown" id="notifications-header">
                <a href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                <i class="icon-bell"></i>
                <span class="badge badge-danger badge-header">6</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="dropdown-header clearfix">
                    <p class="pull-left">12 Pending Notifications</p>
                  </li>
                  <li>
                    <ul class="dropdown-menu-list withScroll" data-height="220">
                      <li>
                        <a href="#">
                        <i class="fa fa-star p-r-10 f-18 c-orange"></i>
                        Steve have rated your photo
                        <span class="dropdown-time">Just now</span>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                        <i class="fa fa-heart p-r-10 f-18 c-red"></i>
                        John added you to his favs
                        <span class="dropdown-time">15 mins</span>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                        <i class="fa fa-file-text p-r-10 f-18"></i>
                        New document available
                        <span class="dropdown-time">22 mins</span>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                        <i class="fa fa-picture-o p-r-10 f-18 c-blue"></i>
                        New picture added
                        <span class="dropdown-time">40 mins</span>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                        <i class="fa fa-bell p-r-10 f-18 c-orange"></i>
                        Meeting in 1 hour
                        <span class="dropdown-time">1 hour</span>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                        <i class="fa fa-bell p-r-10 f-18"></i>
                        Server 5 overloaded
                        <span class="dropdown-time">2 hours</span>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                        <i class="fa fa-comment p-r-10 f-18 c-gray"></i>
                        Bill comment your post
                        <span class="dropdown-time">3 hours</span>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                        <i class="fa fa-picture-o p-r-10 f-18 c-blue"></i>
                        New picture added
                        <span class="dropdown-time">2 days</span>
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li class="dropdown-footer clearfix">
                    <a href="#" class="pull-left">See all notifications</a>
                    <a href="#" class="pull-right">
                    <i class="icon-settings"></i>
                    </a>
                  </li>
                </ul>
              </li>
              <!-- END NOTIFICATION DROPDOWN -->
              <!-- BEGIN MESSAGES DROPDOWN -->
              <li class="dropdown" id="messages-header">
                <a href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                <i class="icon-paper-plane"></i>
                <span class="badge badge-primary badge-header">
                8
                </span>
                </a>
                <ul class="dropdown-menu">
                  <li class="dropdown-header clearfix">
                    <p class="pull-left">
                      You have 8 Messages
                    </p>
                  </li>
                  <li class="dropdown-body">
                    <ul class="dropdown-menu-list withScroll" data-height="220">
                      <li class="clearfix">
                        <span class="pull-left p-r-5">
                        <img src="/assets/global/images/avatars/avatar3.png" alt="avatar 3">
                        </span>
                        <div class="clearfix">
                          <div>
                            <strong>Alexa Johnson</strong> 
                            <small class="pull-right text-muted">
                            <span class="glyphicon glyphicon-time p-r-5"></span>12 mins ago
                            </small>
                          </div>
                          <p>Lorem ipsum dolor sit amet, consectetur...</p>
                        </div>
                      </li>
                      <li class="clearfix">
                        <span class="pull-left p-r-5">
                        <img src="/assets/global/images/avatars/avatar4.png" alt="avatar 4">
                        </span>
                        <div class="clearfix">
                          <div>
                            <strong>John Smith</strong> 
                            <small class="pull-right text-muted">
                            <span class="glyphicon glyphicon-time p-r-5"></span>47 mins ago
                            </small>
                          </div>
                          <p>Lorem ipsum dolor sit amet, consectetur...</p>
                        </div>
                      </li>
                      <li class="clearfix">
                        <span class="pull-left p-r-5">
                        <img src="/assets/global/images/avatars/avatar5.png" alt="avatar 5">
                        </span>
                        <div class="clearfix">
                          <div>
                            <strong>Bobby Brown</strong>  
                            <small class="pull-right text-muted">
                            <span class="glyphicon glyphicon-time p-r-5"></span>1 hour ago
                            </small>
                          </div>
                          <p>Lorem ipsum dolor sit amet, consectetur...</p>
                        </div>
                      </li>
                      <li class="clearfix">
                        <span class="pull-left p-r-5">
                        <img src="/assets/global/images/avatars/avatar6.png" alt="avatar 6">
                        </span>
                        <div class="clearfix">
                          <div>
                            <strong>James Miller</strong> 
                            <small class="pull-right text-muted">
                            <span class="glyphicon glyphicon-time p-r-5"></span>2 days ago
                            </small>
                          </div>
                          <p>Lorem ipsum dolor sit amet, consectetur...</p>
                        </div>
                      </li>
                    </ul>
                  </li>
                  <li class="dropdown-footer clearfix">
                    <a href="mailbox.html" class="pull-left">See all messages</a>
                    <a href="#" class="pull-right">
                    <i class="icon-settings"></i>
                    </a>
                  </li>
                </ul>
              </li>
              <!-- END MESSAGES DROPDOWN -->
              <!-- BEGIN USER DROPDOWN -->
              <li class="dropdown" id="user-header">
                <a href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                <img src="/assets/global/images/avatars/user1.png" alt="user image">
                <span class="username">Hi, John Doe</span>
                </a>
                <ul class="dropdown-menu">
                  <li>
                    <a href="#"><i class="icon-user"></i><span>My Profile</span></a>
                  </li>
                  <li>
                    <a href="#"><i class="icon-calendar"></i><span>My Calendar</span></a>
                  </li>
                  <li>
                    <a href="#"><i class="icon-settings"></i><span>Account Settings</span></a>
                  </li>
                  <li>
                    <a href="#"><i class="icon-logout"></i><span>Logout</span></a>
                  </li>
                </ul>
              </li>
              <!-- END USER DROPDOWN -->
              <!-- CHAT BAR ICON -->
              <li id="quickview-toggle"><a href="#"><i class="icon-bubbles"></i></a></li>
            </ul>
          </div>
          <!-- header-right -->
        </div>
        <!-- END TOPBAR -->
        <!-- BEGIN PAGE CONTENT -->
        <?php $this->load->view($mainContent); ?>
          
          <div class="footer">
            <div class="copyright">
              <p class="pull-left sm-pull-reset">
                <span>Copyright <span class="copyright">©</span> 2016 </span>
                <span>Intely Sol</span>.
                <span>All rights reserved. </span>
              </p>
              <p class="pull-right sm-pull-reset">
                <span><a href="#" class="m-r-10">Support</a> | <a href="#" class="m-l-10 m-r-10">Terms of use</a> | <a href="#" class="m-l-10">Privacy Policy</a></span>
              </p>
            </div>
          </div>
        </div>
        <!-- END PAGE CONTENT -->
      </div>
      <!-- END MAIN CONTENT -->
      <!-- BEGIN BUILDER -->
      
      <!-- END BUILDER -->
    </section>
    <!-- BEGIN QUICKVIEW SIDEBAR -->
    
    <!-- END QUICKVIEW SIDEBAR -->
    <!-- BEGIN SEARCH -->
    <div id="morphsearch" class="morphsearch">
      <form class="morphsearch-form">
        <input class="morphsearch-input" type="search" placeholder="Search..."/>
        <button class="morphsearch-submit" type="submit">Search</button>
      </form>
      <div class="morphsearch-content withScroll">
        <div class="dummy-column user-column">
          <h2>Users</h2>
          <a class="dummy-media-object" href="#">
            <img src="/assets/global/images/avatars/avatar1_big.png" alt="Avatar 1"/>
            <h3>John Smith</h3>
          </a>
          <a class="dummy-media-object" href="#">
            <img src="/assets/global/images/avatars/avatar2_big.png" alt="Avatar 2"/>
            <h3>Bod Dylan</h3>
          </a>
          <a class="dummy-media-object" href="#">
            <img src="/assets/global/images/avatars/avatar3_big.png" alt="Avatar 3"/>
            <h3>Jenny Finlan</h3>
          </a>
          <a class="dummy-media-object" href="#">
            <img src="/assets/global/images/avatars/avatar4_big.png" alt="Avatar 4"/>
            <h3>Harold Fox</h3>
          </a>
          <a class="dummy-media-object" href="#">
            <img src="/assets/global/images/avatars/avatar5_big.png" alt="Avatar 5"/>
            <h3>Martin Hendrix</h3>
          </a>
          <a class="dummy-media-object" href="#">
            <img src="/assets/global/images/avatars/avatar6_big.png" alt="Avatar 6"/>
            <h3>Paul Ferguson</h3>
          </a>
        </div>
        <div class="dummy-column">
          <h2>Articles</h2>
          <a class="dummy-media-object" href="#">
            <img src="/assets/global/images/gallery/1.jpg" alt="1"/>
            <h3>How to change webdesign?</h3>
          </a>
          <a class="dummy-media-object" href="#">
            <img src="/assets/global/images/gallery/2.jpg" alt="2"/>
            <h3>News From the sky</h3>
          </a>
          <a class="dummy-media-object" href="#">
            <img src="/assets/global/images/gallery/3.jpg" alt="3"/>
            <h3>Where is the cat?</h3>
          </a>
          <a class="dummy-media-object" href="#">
            <img src="/assets/global/images/gallery/4.jpg" alt="4"/>
            <h3>Just another funny story</h3>
          </a>
          <a class="dummy-media-object" href="#">
            <img src="/assets/global/images/gallery/5.jpg" alt="5"/>
            <h3>How many water we drink every day?</h3>
          </a>
          <a class="dummy-media-object" href="#">
            <img src="/assets/global/images/gallery/6.jpg" alt="6"/>
            <h3>Drag and drop tutorials</h3>
          </a>
        </div>
        <div class="dummy-column">
          <h2>Recent</h2>
          <a class="dummy-media-object" href="#">
            <img src="/assets/global/images/gallery/7.jpg" alt="7"/>
            <h3>Design Inspiration</h3>
          </a>
          <a class="dummy-media-object" href="#">
            <img src="/assets/global/images/gallery/8.jpg" alt="8"/>
            <h3>Animals drawing</h3>
          </a>
          <a class="dummy-media-object" href="#">
            <img src="/assets/global/images/gallery/9.jpg" alt="9"/>
            <h3>Cup of tea please</h3>
          </a>
          <a class="dummy-media-object" href="#">
            <img src="/assets/global/images/gallery/10.jpg" alt="10"/>
            <h3>New application arrive</h3>
          </a>
          <a class="dummy-media-object" href="#">
            <img src="/assets/global/images/gallery/11.jpg" alt="11"/>
            <h3>Notification prettify</h3>
          </a>
          <a class="dummy-media-object" href="#">
            <img src="/assets/global/images/gallery/12.jpg" alt="12"/>
            <h3>My article is the last recent</h3>
          </a>
        </div>
      </div>
      <!-- /morphsearch-content -->
      <span class="morphsearch-close"></span>
    </div>
    <!-- END SEARCH -->
    <!-- BEGIN PRELOADER -->
   <!--  <div class="loader-overlay">
      <div class="spinner">
        <div class="bounce1"></div>
        <div class="bounce2"></div>
        <div class="bounce3"></div>
      </div>
    </div> -->
    <!-- END PRELOADER -->
    <a href="#" class="scrollup"><i class="fa fa-angle-up"></i></a> 
    <script src="/assets/global/plugins/jquery/jquery-1.11.1.min.js"></script>
    <script src="/assets/global/plugins/jquery/jquery-migrate-1.2.1.min.js"></script>
    <script src="/assets/global/plugins/jquery-ui/jquery-ui-1.11.2.min.js"></script>
    <script src="/assets/global/plugins/jquery-validation/jquery.validate.js"></script> <!-- Form Validation -->
    <script src="/assets/global/plugins/jquery-validation/additional-methods.min.js"></script> <!-- Form Validation Additional Methods - OPTIONAL -->
    <script src="/assets/global/plugins/gsap/main-gsap.min.js"></script>
    <script src="/assets/global/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="/assets/global/plugins/jquery-cookies/jquery.cookies.min.js"></script> <!-- Jquery Cookies, for theme -->
    <script src="/assets/global/plugins/jquery-block-ui/jquery.blockUI.min.js"></script> <!-- simulate synchronous behavior when using AJAX -->
    <script src="/assets/global/plugins/bootbox/bootbox.min.js"></script> <!-- Modal with Validation -->
    <script src="/assets/global/plugins/mcustom-scrollbar/jquery.mCustomScrollbar.concat.min.js"></script> <!-- Custom Scrollbar sidebar -->
    <script src="/assets/global/plugins/bootstrap-dropdown/bootstrap-hover-dropdown.min.js"></script> <!-- Show Dropdown on Mouseover -->
    <script src="/assets/global/plugins/charts-sparkline/sparkline.min.js"></script> <!-- Charts Sparkline -->
    <script src="/assets/global/plugins/retina/retina.min.js"></script> <!-- Retina Display -->
    <script src="/assets/global/plugins/select2/select2.min.js"></script> <!-- Select Inputs -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script> -->
    <script src="/assets/global/plugins/icheck/icheck.min.js"></script> <!-- Checkbox & Radio Inputs -->
    <script src="/assets/global/plugins/backstretch/backstretch.min.js"></script> <!-- Background Image -->
    <script src="/assets/global/plugins/bootstrap-progressbar/bootstrap-progressbar.min.js"></script> <!-- Animated Progress Bar -->
    <script src="/assets/global/js/builder.js"></script> <!-- Theme Builder -->
    
    <!-- BEGIN PAGE SCRIPT -->
    <script src="/assets/global/plugins/noty/jquery.noty.packaged.min.js"></script>  <!-- Notifications -->
    <script src="/assets/global/plugins/bootstrap-editable/js/bootstrap-editable.min.js"></script> <!-- Inline Edition X-editable -->
    <script src="/assets/global/plugins/bootstrap-context-menu/bootstrap-contextmenu.min.js"></script> <!-- Context Menu -->
    <script src="/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script> <!-- >Bootstrap Date Picker -->
    <script src="/assets/global/plugins/multidatepicker/multidatespicker.min.js"></script> <!-- Multi dates Picker -->
    <script src="/assets/global/js/widgets/todo_list.js"></script>
    <script src="/assets/global/plugins/metrojs/metrojs.min.js"></script> <!-- Flipping Panel -->
    <script src="/assets/global/plugins/charts-chartjs/Chart.min.js"></script>  <!-- ChartJS Chart -->
    <script src="/assets/global/plugins/charts-highstock/js/highstock.min.js"></script> <!-- financial Charts -->
    <script src="/assets/global/plugins/charts-highstock/js/modules/exporting.min.js"></script> <!-- Financial Charts Export Tool -->
    <script src="/assets/global/plugins/maps-amcharts/ammap/ammap.min.js"></script> <!-- Vector Map -->
    <script src="/assets/global/plugins/maps-amcharts/ammap/maps/js/worldLow.min.js"></script> <!-- Vector World Map  -->
    <script src="/assets/global/plugins/maps-amcharts/ammap/themes/black.min.js"></script> <!-- Vector Map Black Theme -->
    <script src="/assets/global/plugins/skycons/skycons.min.js"></script> <!-- Animated Weather Icons -->
    <script src="/assets/global/plugins/simple-weather/jquery.simpleWeather.js"></script> <!-- Weather Plugin -->
    <script src="/assets/global/js/widgets/widget_weather.js"></script>
    <script src="/assets/global/js/pages/dashboard.js"></script>
    <script src="/assets/global/plugins/datatables/jquery.dataTables.min.js"></script> <!-- Tables Filtering, Sorting & Editing -->
    <script src="/assets/global/js/pages/table_dynamic.js"></script>
    <script src="/assets/global/js/pages/icons.js"></script>
    
    <script src="/assets/global/js/sidebar_hover.js"></script> <!-- Sidebar on Hover -->
    <script src="/assets/global/js/application.js"></script> <!-- Main Application Script -->
    <script src="/assets/global/js/plugins.js"></script> <!-- Main Plugin Initialization Script -->
    <script src="/assets/global/js/moment.js"></script> <!-- Main Plugin Initialization Script -->
    
    <script src="/assets/global/js/widgets/notes.js"></script> <!-- Notes Widget -->
    <!-- // <script src="/assets/global/js/quickview.js"></script> -->
    <script src="/assets/global/js/pages/search.js"></script> <!-- Search Script -->

    <script src="/assets/admin/layout3/js/layout.js"></script>
    <script src="/assets/admin/layout3/js/my_script.js"></script>
  </body>
</html>