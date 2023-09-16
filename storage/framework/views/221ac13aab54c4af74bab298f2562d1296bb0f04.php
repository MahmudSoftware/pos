


<?php $__env->startPush('style'); ?>
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<?php $__env->stopPush(); ?>


<?php $__env->startSection('dashboard_content'); ?>
<style>
/* Style for mill information card */
/* Style for mill information card */
.mill-card {
    border: 3px solid oldlace;
    margin-bottom: 20px;
    transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
}

.mill-card:hover {
    transform: translateY(-5px);
    box-shadow: 0px 6px 20px rgba(0, 0, 0, 0.1);
}

/* Style for mill information card header */
.mill-card-header {
    background-color: #2c3e50; /* A fitting color for the header */
    color: white;
    padding: 10px;
    font-weight: bold;
    border-bottom: none; /* Remove default border */
    border-radius: 5px 5px 0 0;
    text-align: center;
}

/* Style for mill information card body */
.mill-card-body {
    padding: 15px;
    border-top: 1px solid #e5e5e5;
    text-align: justify;
   // background-color: #29b6f6;/* Add a border at the top of the card body */
}

/* Style for rows of mill information cards */
.row {
    margin-left: -15px;
    margin-right: -15px;
}

/* Style for mill information card header */


</style>

<?php if(Auth::user()->user_type != 1): ?>
<div class="container">
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <h3 class="text-center text-info"><?php echo e($millName->mill_name_bn); ?></h3>
            <p class="text-center text-dark"><?php echo e($millName->address_bn); ?></p>
            <h4 class="pull-left page-title">Mill Dashboard</h4>
            <ol class="breadcrumb pull-right">
                <li><a href="#">Moltran</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </div>
    </div>

    <!-- Start Widget -->
    <div class="row">

        <div class="col-md-6 col-sm-6 col-lg-3">
            <div class="mini-stat clearfix bx-shadow">
                <span class="mini-stat-icon bg-primary"><i class="ion-android-contacts"></i></span>
                <div class="mini-stat-info text-right text-muted">
                    <span class="counter"><?php echo e($farmers); ?></span>
                    Total Grower
                </div>
                <div class="tiles-progress">
                    <div class="m-t-20">
                        <h5 class="text-uppercase">Total Grower % <span class="pull-right">100</span></h5>
                        <div class="progress progress-sm m-0">
                            <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="<?php echo e($farmers); ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo e($farmers); ?>%;">
                                <span class="sr-only"><?php echo e($farmers); ?>% Complete</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-sm-6 col-lg-3">
            <div class="mini-stat clearfix bx-shadow">
                <span class="mini-stat-icon bg-info"><i class="ion-android-contact"></i></span>
                <div class="mini-stat-info text-right text-muted">
                    <span class="counter"><?php echo e($farmerLoan->count()); ?></span>
                   Loan Grower
                </div>
                <div class="tiles-progress">
                    <div class="m-t-20">
                        <p style="display: none"> <?php echo e($percentageOfLoanRound =  round($percentageOfLoan,2)); ?> </p>
                        <h5 class="text-uppercase">Loan Grower % <span class="pull-right"><?php echo $percentageOfLoanRound; ?>%</span></h5>
                        <div class="progress progress-sm m-0">
                            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                                <span class="sr-only">60% Complete</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-6 col-sm-6 col-lg-3">
            <div class="mini-stat clearfix bx-shadow">
                <span class="mini-stat-icon bg-info"><i class="ion-android-contact"></i></span>
                <div class="mini-stat-info text-right text-muted">
                    <span class="counter">0</span>
                    Merging  Grower
                </div>
                <div class="tiles-progress">
                    <div class="m-t-20">
                        <h5 class="text-uppercase">Margin Grower % <span class="pull-right">0%</span></h5>
                        <div class="progress progress-sm m-0">
                            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                                <span class="sr-only">60% Complete</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="col-md-6 col-sm-6 col-lg-3">
            <div class="mini-stat clearfix bx-shadow">
                <span class="mini-stat-icon bg-purple"><i class="ion-android-contact"></i></span>
                <div class="mini-stat-info text-right text-muted">
                    <span class="counter"><?php echo e($farmerNonLoan->count()); ?></span>
                  Non  Loan Grower
                </div>
                <div class="tiles-progress">
                    <div class="m-t-20">
                        <h5 class="text-uppercase">Non  Loan Grower %<span class="pull-right"><?php echo e(round($percentageOfNonLoan,2)); ?>%</span></h5>
                        <div class="progress progress-sm m-0">
                            <div class="progress-bar progress-bar-purple" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%;">
                                <span class="sr-only">90% Complete</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-sm-6 col-lg-3">
            <div class="mini-stat clearfix bx-shadow">
                <span class="mini-stat-icon bg-success"><i class="ion-flask"></i></span>
                <div class="mini-stat-info text-right text-muted">
                    <span class="counter"><?php echo e($totalUnit->count()); ?></span>
                    Total Unit
                </div>
                <div class="tiles-progress">
                    <div class="m-t-20">
                        <h5 class="text-uppercase">Total Unit<span class="pull-right"><?php echo e($totalUnit->count()); ?></span></h5>
                        <div class="progress progress-sm m-0">
                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                                <span class="sr-only">60% Complete</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-sm-6 col-lg-3">
            <div class="mini-stat clearfix bx-shadow">
                <span class="mini-stat-icon bg-primary"><i class="ion-android-contacts"></i></span>
                <div class="mini-stat-info text-right text-muted">
                    <span class="counter"><?php echo e($totalCenter->count()); ?></span>
                    Total Center
                </div>
                <div class="tiles-progress">
                    <div class="m-t-20">
                        <h5 class="text-uppercase">Total Center <span class="pull-right"><?php echo e($totalCenter->count()); ?></span></h5>
                        <div class="progress progress-sm m-0">
                            <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="<?php echo e($farmers); ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo e($farmers); ?>%;">
                                <span class="sr-only"><?php echo e($farmers); ?>% Complete</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-sm-6 col-lg-3">
            <div class="mini-stat clearfix bx-shadow">
                <span class="mini-stat-icon bg-primary"><i class="ion-android-contacts"></i></span>
                <div class="mini-stat-info text-right text-muted">
                    <span class="counter"><?php echo e($totalCart); ?></span>
                    Total Cart
                </div>
                <div class="tiles-progress">
                    <div class="m-t-20">
                        <h5 class="text-uppercase">Total Cart <span class="pull-right"><?php echo e($totalCart); ?></span></h5>
                        <div class="progress progress-sm m-0">
                            <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="<?php echo e($farmers); ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo e($farmers); ?>%;">
                                <span class="sr-only"><?php echo e($farmers); ?>% Complete</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-sm-6 col-lg-3">
            <div class="mini-stat clearfix bx-shadow">
                <span class="mini-stat-icon bg-primary"><i class="ion-android-contacts"></i></span>
                <div class="mini-stat-info text-right text-muted">
                    <span class="counter"><?php echo e($totalCart - $remailCart); ?></span>
                    Assign Cart
                </div>
                <div class="tiles-progress">
                    <div class="m-t-20">
                        <h5 class="text-uppercase">Assign Cart <span class="pull-right"><?php echo e($totalCart - $remailCart); ?></span></h5>
                        <div class="progress progress-sm m-0">
                            <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="<?php echo e($farmers); ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo e($farmers); ?>%;">
                                <span class="sr-only"><?php echo e($farmers); ?>% Complete</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-sm-6 col-lg-3">
            <div class="mini-stat clearfix bx-shadow">
                <span class="mini-stat-icon bg-primary"><i class="ion-android-contacts"></i></span>
                <div class="mini-stat-info text-right text-muted">
                    <span class="counter"><?php echo e($remailCart); ?></span>
                   Remain Cart
                </div>
                <div class="tiles-progress">
                    <div class="m-t-20">
                        <h5 class="text-uppercase">Total Cart <span class="pull-right"><?php echo e($remailCart); ?></span></h5>
                        <div class="progress progress-sm m-0">
                            <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="<?php echo e($farmers); ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo e($farmers); ?>%;">
                                <span class="sr-only"><?php echo e($farmers); ?>% Complete</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>





    </div>

    <?php else: ?>

    <div class="row">
        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-4">
                <div class="card mill-card">
                    <div class="card-header mill-card-header">
                        <?php echo e($item->mill_name_bn); ?>

                    </div>
                    <div class="card-body mill-card-body">

                        <p><strong>Total Growers:</strong>
                            <?php if(!empty($item->total_grower)): ?>
                                <?php echo e($item->total_grower); ?>

                            <?php endif; ?>
                            </p>

                        <p><strong>Total Carts:</strong>
                            <?php if(!empty($item->total_cart)): ?>
                            <?php echo e($item->total_cart); ?>

                        <?php endif; ?>
                        </p>
                        <p><strong>Total Remaining Carts:</strong>
                            <?php if(!empty($item->total_remain_cart)): ?>
                            <?php echo e($item->total_remain_cart); ?>

                        <?php endif; ?>
                        </p>
                        <p><strong>Total Loan Growers:</strong>
                            <?php if(!empty($item->total_loan_grower)): ?>
                            <?php echo e($item->total_loan_grower); ?>

                        <?php endif; ?>
                        </p>
                        <p><strong>Total Loan Amount:</strong>
                            <?php if(!empty($item->total_loan_amount)): ?>
                            <?php echo e($item->total_loan_amount); ?>

                        <?php endif; ?>
                        </p>
                        <p><strong>Crop Day:</strong>
                            <?php if(!empty($item->crop_day)): ?>
                            <?php echo e($item->crop_day); ?>

                        <?php endif; ?>
                        </p>
                        <p><strong>Crop Start Day:</strong>
                            <?php if(!empty($item->date_of_start_mill)): ?>
                                <?php echo e(date('d-m-Y', strtotime($item->date_of_start_mill))); ?>

                            <?php endif; ?>
                        </p>
                        <p><strong>Crop End Day:</strong>
                            <?php if(!empty($item->date_of_start_mill)): ?>
                                <?php echo e(date('d-m-Y', strtotime($item->date_of_start_mill . ' + ' . $item->crop_day . ' days'))); ?>

                            <?php endif; ?>
                        </p>
                        <p><strong>Daily Purjee Quta:</strong>
                            <?php if($item->crop_day > 0): ?>
                                <?php echo e(number_format($item->total_remain_cart / $item->crop_day, 2)); ?>

                            <?php endif; ?>
                        </p>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div> --}}
  <?php endif; ?>
    <div class="row">
        <!-- INBOX -->
        <div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">Inbox</h4>
                </div>
                <div class="panel-body">
                    <div class="inbox-widget nicescroll mx-box" tabindex="5000" style="overflow: hidden; outline: none;">
                        <a href="#">
                            <div class="inbox-item">
                                <div class="inbox-item-img"><img src="images/users/avatar-1.jpg" class="img-circle" alt=""></div>
                                <p class="inbox-item-author">Chadengle</p>
                                <p class="inbox-item-text">Hey! there I'm available...</p>
                                <p class="inbox-item-date">13:40 PM</p>
                            </div>
                        </a>
                        <a href="#">
                            <div class="inbox-item">
                                <div class="inbox-item-img"><img src="images/users/avatar-1.jpg" class="img-circle" alt=""></div>
                                <p class="inbox-item-author">Tomaslau</p>
                                <p class="inbox-item-text">I've finished it! See you so...</p>
                                <p class="inbox-item-date">13:34 PM</p>
                            </div>
                        </a>
                        <a href="#">
                            <div class="inbox-item">
                                <div class="inbox-item-img"><img src="images/users/avatar-1.jpg" class="img-circle" alt=""></div>
                                <p class="inbox-item-author">Stillnotdavid</p>
                                <p class="inbox-item-text">This theme is awesome!</p>
                                <p class="inbox-item-date">13:17 PM</p>
                            </div>
                        </a>
                        <a href="#">
                            <div class="inbox-item">
                                <div class="inbox-item-img"><img src="images/users/avatar-1.jpg" class="img-circle" alt=""></div>
                                <p class="inbox-item-author">Kurafire</p>
                                <p class="inbox-item-text">Nice to meet you</p>
                                <p class="inbox-item-date">12:20 PM</p>
                            </div>
                        </a>
                        <a href="#">
                            <div class="inbox-item">
                                <div class="inbox-item-img"><img src="images/users/avatar-1.jpg" class="img-circle" alt=""></div>
                                <p class="inbox-item-author">Shahedk</p>
                                <p class="inbox-item-text">Hey! there I'm available...</p>
                                <p class="inbox-item-date">10:15 AM</p>
                            </div>
                        </a>
                        <a href="#">
                            <div class="inbox-item">
                                <div class="inbox-item-img"><img src="images/users/avatar-6.jpg" class="img-circle" alt=""></div>
                                <p class="inbox-item-author">Adhamdannaway</p>
                                <p class="inbox-item-text">This theme is awesome!</p>
                                <p class="inbox-item-date">9:56 AM</p>
                            </div>
                        </a>
                        <a href="#">
                            <div class="inbox-item">
                                <div class="inbox-item-img"><img src="images/users/avatar-8.jpg" class="img-circle" alt=""></div>
                                <p class="inbox-item-author">Arashasghari</p>
                                <p class="inbox-item-text">Hey! there I'm available...</p>
                                <p class="inbox-item-date">10:15 AM</p>
                            </div>
                        </a>
                        <a href="#">
                            <div class="inbox-item">
                                <div class="inbox-item-img"><img src="images/users/avatar-9.jpg" class="img-circle" alt=""></div>
                                <p class="inbox-item-author">Joshaustin</p>
                                <p class="inbox-item-text">I've finished it! See you so...</p>
                                <p class="inbox-item-date">9:56 AM</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Chat</h3>
                </div>
                <div class="panel-body">
                    <div class="chat-conversation">
                        <ul class="conversation-list nicescroll" tabindex="5001" style="overflow: hidden; outline: none;">
                            <li class="clearfix">
                                <div class="chat-avatar">
                                    <img src="images/avatar-1.jpg" alt="male">
                                    <i>10:00</i>
                                </div>
                                <div class="conversation-text">
                                    <div class="ctext-wrap">
                                        <i>John Deo</i>
                                        <p>
                                            Hello!
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li class="clearfix odd">
                                <div class="chat-avatar">
                                    <img src="images/users/avatar-5.jpg" alt="Female">
                                    <i>10:01</i>
                                </div>
                                <div class="conversation-text">
                                    <div class="ctext-wrap">
                                        <i>Smith</i>
                                        <p>
                                            Hi, How are you? What about our next meeting?
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li class="clearfix">
                                <div class="chat-avatar">
                                    <img src="images/avatar-1.jpg" alt="male">
                                    <i>10:01</i>
                                </div>
                                <div class="conversation-text">
                                    <div class="ctext-wrap">
                                        <i>John Deo</i>
                                        <p>
                                            Yeah everything is fine
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li class="clearfix odd">
                                <div class="chat-avatar">
                                    <img src="images/users/avatar-5.jpg" alt="male">
                                    <i>10:02</i>
                                </div>
                                <div class="conversation-text">
                                    <div class="ctext-wrap">
                                        <i>Smith</i>
                                        <p>
                                            Wow that's great
                                        </p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <div class="row">
                            <div class="col-sm-9 chat-inputbar">
                                <input type="text" class="form-control chat-input" placeholder="Enter your text">
                            </div>
                            <div class="col-sm-3 chat-send">
                                <button type="submit" class="btn btn-info btn-block waves-effect waves-light">Send</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end col-->


        <!-- TODO -->
        <div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Todo</h3>
                </div>
                <div class="panel-body todoapp">
                    <div class="row">
                        <div class="col-sm-6">
                            <h4 id="todo-message"><span id="todo-remaining">2</span> of <span id="todo-total">6</span> remaining</h4>
                        </div>
                        <div class="col-sm-6">
                            <a href="" class="pull-right btn btn-primary btn-sm waves-effect waves-light" id="btn-archive">Archive</a>
                        </div>
                    </div>

                    <ul class="list-group no-margn nicescroll todo-list" style="max-height: 288px; overflow: hidden; outline: none;" id="todo-list" tabindex="5002"><li class="list-group-item"><div class="checkbox checkbox-primary"><input class="todo-done" id="6" type="checkbox" checked=""><label for="6">Build an angular app</label></div></li><li class="list-group-item"><div class="checkbox checkbox-primary"><input class="todo-done" id="5" type="checkbox"><label for="5">Hehe!! This is looks cool!</label></div></li><li class="list-group-item"><div class="checkbox checkbox-primary"><input class="todo-done" id="4" type="checkbox" checked=""><label for="4">Testing??</label></div></li><li class="list-group-item"><div class="checkbox checkbox-primary"><input class="todo-done" id="3" type="checkbox" checked=""><label for="3">Creating component page</label></div></li><li class="list-group-item"><div class="checkbox checkbox-primary"><input class="todo-done" id="2" type="checkbox" checked=""><label for="2">Build a js based app</label></div></li><li class="list-group-item"><div class="checkbox checkbox-primary"><input class="todo-done" id="1" type="checkbox"><label for="1">Design One page theme</label></div></li></ul>

                        <form name="todo-form" id="todo-form" role="form" class="m-t-20">
                        <div class="row">
                            <div class="col-sm-9 todo-inputbar">
                                <input type="text" id="todo-input-text" name="todo-input-text" class="form-control" placeholder="Add new todo">
                            </div>
                            <div class="col-sm-3 todo-send">
                                <button class="btn-primary btn-block btn waves-effect waves-light" type="button" id="todo-btn-submit">Add</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->



</div>




<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
    
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    
    <script>
        $(document).ready( function() {


        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('dashboard.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\sugar_mill_project\resources\views/dashboard/home/index.blade.php ENDPATH**/ ?>