
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">
        <link rel="shortcut icon" href="images/favicon_1.ico">
        <title><?php echo $__env->yieldContent('title'); ?> <?php echo e(config('app.name')); ?></title>

        <!-- Base Css Files -->
        <link href="<?php echo e(asset('dashboard/css/bootstrap.min.css')); ?>" rel="stylesheet" />

        <!-- Font Icons -->
        <link href="<?php echo e(asset('dashboard/assets/font-awesome/css/font-awesome.min.css')); ?>" rel="stylesheet" />
        <link href="<?php echo e(asset('dashboard/assets/ionicon/css/ionicons.min.css')); ?>" rel="stylesheet" />
        <link href="<?php echo e(asset('dashboard/css/material-design-iconic-font.min.css')); ?>" rel="stylesheet">

        <!-- animate css -->
        <link href="<?php echo e(asset('dashboard/css/animate.css')); ?>" rel="stylesheet" />

        <!-- Waves-effect -->
        <link href="<?php echo e(asset('dashboard/css/waves-effect.css')); ?>" rel="stylesheet">

        <!-- sweet alerts -->
        <link href="<?php echo e(asset('dashboard/assets/sweet-alert/sweet-alert.min.css')); ?>" rel="stylesheet">

        <!-- Custom Files -->
        <link href="<?php echo e(asset('dashboard/css/helper.css')); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(asset('dashboard/css/style.css')); ?>" rel="stylesheet" type="text/css" />


        <!-- Plugins css-->
        <link href="<?php echo e(asset('dashboard/assets/tagsinput/jquery.tagsinput.css')); ?>" rel="stylesheet" />
        <link href="<?php echo e(asset('dashboard/assets/toggles/toggles.css')); ?>" rel="stylesheet" />
        <link href="<?php echo e(asset('dashboard/assets/timepicker/bootstrap-timepicker.min.css')); ?>" rel="stylesheet" />
        <link href="<?php echo e(asset('dashboard/assets/timepicker/bootstrap-datepicker.min.css')); ?>" rel="stylesheet" />
        <link href="<?php echo e(asset('dashboard/assets/colorpicker/colorpicker.css')); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(asset('dashboard/assets/jquery-multi-select/multi-select.css')); ?>"  rel="stylesheet" type="text/css" />
        <link href="<?php echo e(asset('dashboard/assets/select2/select2.css')); ?>" rel="stylesheet" type="text/css" />

        <!-- DataTables -->
        <link href="<?php echo e(asset('dashboard/assets/datatables/jquery.dataTables.min.css')); ?>" rel="stylesheet" type="text/css" />

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>
        <link rel="stylesheet" href="http://demo.itsolutionstuff.com/plugin/bootstrap-3.min.css">

        <?php echo $__env->yieldPushContent('style'); ?>
    </head>
    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <div class="topbar">
                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="text-center">
                        <a href="index.html" class="logo"> <span>Digital Cane Procurement System
                        </span></a>
                    </div>
                </div>
                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">
                        <div class="">
                            <div class="pull-left">
                                <button class="button-menu-mobile open-left">
                                    <i class="fa fa-bars"></i>
                                </button>
                                <span class="clearfix"></span>
                            </div>
                            <form class="navbar-form pull-left" role="search">
                                <div class="form-group">
                                    <input type="text" class="form-control search-bar" placeholder="Type here for search...">
                                </div>
                                <button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
                            </form>

                            <ul class="nav navbar-nav navbar-right pull-right">
                                <li class="dropdown hidden-xs">
                                    <a href="#" data-target="#" class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="true">
                                        <i class="md md-notifications"></i> <span class="badge badge-xs badge-danger">3</span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-lg">
                                        <li class="text-center notifi-title">Notification</li>
                                        <li class="list-group">
                                            <!-- list item-->
                                            <a href="javascript:void(0);" class="list-group-item">
                                                <div class="media">
                                                    <div class="pull-left">
                                                    <em class="fa fa-user-plus fa-2x text-info"></em>
                                                    </div>
                                                    <div class="media-body clearfix">
                                                    <div class="media-heading">New user registered</div>
                                                    <p class="m-0">
                                                        <small>You have 10 unread messages</small>
                                                    </p>
                                                    </div>
                                                </div>
                                            </a>
                                            <!-- list item-->
                                            <a href="javascript:void(0);" class="list-group-item">
                                                <div class="media">
                                                    <div class="pull-left">
                                                    <em class="fa fa-diamond fa-2x text-primary"></em>
                                                    </div>
                                                    <div class="media-body clearfix">
                                                    <div class="media-heading">New settings</div>
                                                    <p class="m-0">
                                                        <small>There are new settings available</small>
                                                    </p>
                                                    </div>
                                                </div>
                                            </a>
                                            <!-- list item-->
                                            <a href="javascript:void(0);" class="list-group-item">
                                                <div class="media">
                                                    <div class="pull-left">
                                                    <em class="fa fa-bell-o fa-2x text-danger"></em>
                                                    </div>
                                                    <div class="media-body clearfix">
                                                    <div class="media-heading">Updates</div>
                                                    <p class="m-0">
                                                        <small>There are
                                                            <span class="text-primary">2</span> new updates available</small>
                                                    </p>
                                                    </div>
                                                </div>
                                            </a>
                                            <!-- last list item -->
                                            <a href="javascript:void(0);" class="list-group-item">
                                                <small>See all notifications</small>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="hidden-xs">
                                    <a href="#" id="btn-fullscreen" class="waves-effect waves-light"><i class="md md-crop-free"></i></a>
                                </li>
                                <li class="hidden-xs">
                                    <a href="#" class="right-bar-toggle waves-effect waves-light"><i class="md md-chat"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true"><img src="<?php echo e(asset('dashboard/images/avatar-1.jpg')); ?>" alt="user-img" class="img-circle"> </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?php echo e(route('user.profile')); ?>"><i class="md md-face-unlock"></i> Profile</a></li>
                                        <li><a href="<?php echo e(route('user.profile')); ?>"><i class="md md-settings"></i> Settings</a></li>
                                        <li><a href="javascript:void(0)"><i class="md md-lock"></i> Lock screen</a></li>
                                        <li>
                                            <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="md md-settings-power"></i> <?php echo e(__('Logout')); ?></a>
                                            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                                <?php echo csrf_field(); ?>
                                            </form>
                                        </li>
                                        
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!--/.nav-collapse -->
                    </div>
                </div>
            </div>
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->

            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">
                    <div class="user-details">
                        <div class="pull-left">
                            <img src="<?php echo e(asset('dashboard/images/users/avatar-1.jpg')); ?>" alt="" class="thumb-md img-circle">
                        </div>
                        <div class="user-info">
                            <h5><?php echo e(auth()->user()->first_name); ?> <?php echo e(auth()->user()->last_name); ?></h5>

                            
                        </div>
                    </div>
                    <!--- Divider -->
                    <div id="sidebar-menu">
                        <ul>
                            <li>
                                <a href="<?php echo e(route('dashboard.home.index')); ?>" class="waves-effect"><i class="md md-home"></i><span> Dashboard </span></a>
                            </li>

                            <?php
                              $permission_groups = App\Models\User::getPermissionGroup();
                            ?>
                            <?php $__currentLoopData = $permission_groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="has_sub">

                                <?php
                                $permissions = App\Models\user::getPermissionByGroupName($group->group_name);
                                  ?>
                                  <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permissionData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                  <?php if(Auth::guard('web')->user()->can($permissionData->name)): ?>
                                <a href="#" class="waves-effect"><i class="md md-palette"></i> <span> <?php echo e($group->group_name); ?> </span> <span class="pull-right"><i class="md md-add"></i></span></a>
                                  <?php endif; ?>
                                <ul class="list-unstyled">
                                    <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permissionData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(Auth::guard('web')->user()->can($permissionData->name)): ?>
                                    <li class="<?php echo e(request()->routeIs($permissionData->name) ? 'active' : ''); ?>"><a href="<?php echo e(route($permissionData->name)); ?>" class="<?php echo e(request()->routeIs($permissionData->name) ? 'active' : ''); ?>">  <?php echo e($permissionData->menu_name); ?></a></li>
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </ul>
                            </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- Left Sidebar End -->



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <?php echo $__env->yieldContent('dashboard_content'); ?>
                    <!-- container -->
                </div> <!-- content -->

                <footer class="footer text-right">
                    2015 © Moltran.
                </footer>

            </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


            <!-- Right Sidebar -->
            <div class="side-bar right-bar nicescroll">
                <h4 class="text-center">Chat</h4>
                <div class="contact-list nicescroll">
                    <ul class="list-group contacts-list">
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="<?php echo e(asset('dashboard/images/users/avatar-1.jpg')); ?>" alt="">
                                </div>
                                <span class="name">Chadengle</span>
                                <i class="fa fa-circle online"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="<?php echo e(asset('dashboard/images/users/avatar-2.jpg')); ?>" alt="">
                                </div>
                                <span class="name">Tomaslau</span>
                                <i class="fa fa-circle online"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="<?php echo e(asset('dashboard/images/users/avatar-3.jpg')); ?>" alt="">
                                </div>
                                <span class="name">Stillnotdavid</span>
                                <i class="fa fa-circle online"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="<?php echo e(asset('dashboard/images/users/avatar-4.jpg')); ?>" alt="">
                                </div>
                                <span class="name">Kurafire</span>
                                <i class="fa fa-circle online"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="<?php echo e(asset('dashboard/images/users/avatar-5.jpg')); ?>" alt="">
                                </div>
                                <span class="name">Shahedk</span>
                                <i class="fa fa-circle away"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="<?php echo e(asset('dashboard/images/users/avatar-6.jpg')); ?>" alt="">
                                </div>
                                <span class="name">Adhamdannaway</span>
                                <i class="fa fa-circle away"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="<?php echo e(asset('dashboard/images/users/avatar-7.jpg')); ?>" alt="">
                                </div>
                                <span class="name">Ok</span>
                                <i class="fa fa-circle away"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="<?php echo e(asset('dashboard/images/users/avatar-8.jpg')); ?>" alt="">
                                </div>
                                <span class="name">Arashasghari</span>
                                <i class="fa fa-circle offline"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="<?php echo e(asset('dashboard/images/users/avatar-9.jpg')); ?>" alt="">
                                </div>
                                <span class="name">Joshaustin</span>
                                <i class="fa fa-circle offline"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="<?php echo e(asset('dashboard/images/users/avatar-10.jpg')); ?>" alt="">
                                </div>
                                <span class="name">Sortino</span>
                                <i class="fa fa-circle offline"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- /Right-bar -->

        </div>
        <!-- END wrapper -->

        <!-- jQuery  -->
        <script src="<?php echo e(asset('dashboard/js/jquery.min.js')); ?>"></script>
        <script src="<?php echo e(asset('dashboard/js/bootstrap.min.js')); ?>"></script>
        <script src="<?php echo e(asset('dashboard/js/waves.js')); ?>"></script>
        <script src="<?php echo e(asset('dashboard/js/wow.min.js')); ?>"></script>
        <script src="<?php echo e(asset('dashboard/js/jquery.nicescroll.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(asset('dashboard/js/jquery.scrollTo.min.js')); ?>"></script>
        <script src="<?php echo e(asset('dashboard/assets/chat/moment-2.2.1.js')); ?>"></script>
        <script src="<?php echo e(asset('dashboard/assets/jquery-sparkline/jquery.sparkline.min.js')); ?>"></script>
        <script src="<?php echo e(asset('dashboard/assets/jquery-detectmobile/detect.js')); ?>"></script>
        <script src="<?php echo e(asset('dashboard/assets/fastclick/fastclick.js')); ?>"></script>
        <script src="<?php echo e(asset('dashboard/assets/jquery-slimscroll/jquery.slimscroll.js')); ?>"></script>
        <script src="<?php echo e(asset('dashboard/assets/jquery-blockui/jquery.blockUI.js')); ?>"></script>

        <!-- sweet alerts -->
        <script src="<?php echo e(asset('dashboard/assets/sweet-alert/sweet-alert.min.js')); ?>"></script>
        <script src="<?php echo e(asset('dashboard/assets/sweet-alert/sweet-alert.init.js')); ?>"></script>

        <!-- flot Chart -->
        <script src="<?php echo e(asset('dashboard/assets/flot-chart/jquery.flot.js')); ?>"></script>
        <script src="<?php echo e(asset('dashboard/assets/flot-chart/jquery.flot.time.js')); ?>"></script>
        <script src="<?php echo e(asset('dashboard/assets/flot-chart/jquery.flot.tooltip.min.js')); ?>"></script>
        <script src="<?php echo e(asset('dashboard/assets/flot-chart/jquery.flot.resize.js')); ?>"></script>
        <script src="<?php echo e(asset('dashboard/assets/flot-chart/jquery.flot.pie.js')); ?>"></script>
        <script src="<?php echo e(asset('dashboard/assets/flot-chart/jquery.flot.selection.js')); ?>"></script>
        <script src="<?php echo e(asset('dashboard/assets/flot-chart/jquery.flot.stack.js')); ?>"></script>
        <script src="<?php echo e(asset('dashboard/assets/flot-chart/jquery.flot.crosshair.js')); ?>"></script>

        <!-- Counter-up -->
        <script src="<?php echo e(asset('dashboard/assets/counterup/waypoints.min.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(asset('dashboard/assets/counterup/jquery.counterup.min.js')); ?>" type="text/javascript"></script>

        <!-- CUSTOM JS -->
        <script src="<?php echo e(asset('dashboard/js/jquery.app.js')); ?>"></script>

        <!-- Dashboard -->
        <script src="<?php echo e(asset('dashboard/js/jquery.dashboard.js')); ?>"></script>

        <!-- Chat -->
        <script src="<?php echo e(asset('dashboard/js/jquery.chat.js')); ?>"></script>

        <!-- Todo -->
        <script src="<?php echo e(asset('dashboard/js/jquery.todo.js')); ?>"></script>


        <script src="<?php echo e(asset('dashboard/js/modernizr.min.js')); ?>"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.js"></script>
        <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">

        <script type="text/javascript">
            /* ==============================================
            Counter Up
            =============================================== */
            jQuery(document).ready(function($) {
                $('.counter').counterUp({
                    delay: 100,
                    time: 1200
                });
            });

             $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // For Select 2
            var resizefunc = [];

        </script>

        <?php echo $__env->yieldPushContent('js'); ?>


<script>
  <?php if(Session::has('message')): ?>
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.success("<?php echo e(session('message')); ?>");
  <?php endif; ?>

  <?php if(Session::has('error')): ?>
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.error("<?php echo e(session('error')); ?>");
  <?php endif; ?>

  <?php if(Session::has('info')): ?>
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.info("<?php echo e(session('info')); ?>");
  <?php endif; ?>

  <?php if(Session::has('warning')): ?>
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.warning("<?php echo e(session('warning')); ?>");
  <?php endif; ?>
</script>





    </body>
</html>
<?php /**PATH C:\laragon\www\sugar_mill_project\resources\views/dashboard/index.blade.php ENDPATH**/ ?>