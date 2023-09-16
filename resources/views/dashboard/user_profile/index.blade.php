@extends('dashboard.index')

@section('title', 'Profile - ')

@section('dashboard_content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<div class="wraper container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="bg-picture text-center" style="background-image:url('{{asset('dashboard/images/big/bg.jpg')}}')">
                <div class="bg-picture-overlay"></div>
                <div class="profile-info-name">
                    <img src="{{asset('dashboard/images/avatar-1.jpg')}}" class="thumb-lg img-circle img-thumbnail" alt="profile-image">
                    <h3 class="text-white">John Deon</h3>
                </div>
            </div>
            <!--/ meta -->
        </div>
    </div>
    <div class="row user-tabs">
        <div class="col-lg-6 col-md-9 col-sm-9">
            <ul class="nav nav-tabs tabs" style="width: 100%;">
            <li class="tab" style="width: 25%;">
                <a href="#home-2" data-toggle="tab" aria-expanded="false" class="">
                    <span class="visible-xs"><i class="fa fa-home"></i></span>
                    <span class="hidden-xs">About Me</span>
                </a>
            </li>
            <li class="tab" style="width: 25%;">
                <a href="#profile-2" data-toggle="tab" aria-expanded="false" class="">
                    <span class="visible-xs"><i class="fa fa-user"></i></span>
                    <span class="hidden-xs">Activities</span>
                </a>
            </li>
            <li class="tab" style="width: 25%;">
                <a href="#messages-2" data-toggle="tab" aria-expanded="false" class="">
                    <span class="visible-xs"><i class="fa fa-envelope-o"></i></span>
                    <span class="hidden-xs">Change Password</span>
                </a>
            </li>
            <li class="tab active" style="width: 25%;">
                <a href="#settings-2" data-toggle="tab" aria-expanded="true" class="active">
                    <span class="visible-xs"><i class="fa fa-cog"></i></span>
                    <span class="hidden-xs">Settings</span>
                </a>
            </li>
        <div class="indicator" style="right: 1px; left: 393px;"></div><div class="indicator" style="right: 1px; left: 393px;"></div></ul>
        </div>
        <div class="col-lg-6 col-md-3 col-sm-3 hidden-xs">
            <div class="pull-right">
                <div class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle btn-rounded btn btn-primary waves-effect waves-light" href="#"> Following <span class="caret"></span></a>
                    <ul class="dropdown-menu dropdown-menu-right" role="menu">
                        <li><a href="#">Poke</a></li>
                        <li><a href="#">Private message</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Unfollow</a></li>
                    </ul>
                </div>
                </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">

        <div class="tab-content profile-tab-content">
            <div class="tab-pane" id="home-2" style="display: none;">
                <div class="row">
                    <div class="col-md-4">
                        <!-- Personal-Information -->
                        <div class="panel panel-default panel-fill">
                            <div class="panel-heading">
                                <h3 class="panel-title">Personal Information</h3>
                            </div>
                            <div class="panel-body">
                                <div class="about-info-p">
                                    <strong>Full Name</strong>
                                    <br>
                                    <p class="text-muted">Johnathan Deo</p>
                                </div>
                                <div class="about-info-p">
                                    <strong>Mobile</strong>
                                    <br>
                                    <p class="text-muted">(123) 123 1234</p>
                                </div>
                                <div class="about-info-p">
                                    <strong>Email</strong>
                                    <br>
                                    <p class="text-muted">johnathandeon @moltran.com</p>
                                </div>
                                <div class="about-info-p m-b-0">
                                    <strong>Location</strong>
                                    <br>
                                    <p class="text-muted">USA</p>
                                </div>
                            </div>
                        </div>
                        <!-- Personal-Information -->

                        <!-- Languages -->
                        <div class="panel panel-default panel-fill">
                            <div class="panel-heading">
                                <h3 class="panel-title">Languages</h3>
                            </div>
                            <div class="panel-body">
                                <ul>
                                    <li>English</li>
                                    <li>Franch</li>
                                    <li>Greek</li>
                                </ul>
                            </div>
                        </div>
                        <!-- Languages -->

                    </div>


                    <div class="col-md-8">
                        <!-- Personal-Information -->
                        <div class="panel panel-default panel-fill">
                            <div class="panel-heading">
                                <h3 class="panel-title">Biography</h3>
                            </div>
                            <div class="panel-body">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>

                                <p><strong>But also the leap into electronic typesetting, remaining essentially unchanged.</strong></p>

                                <p>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                            </div>
                        </div>
                        <!-- Personal-Information -->

                        <div class="panel panel-default panel-fill">
                            <div class="panel-heading">
                                <h3 class="panel-title">Skills</h3>
                            </div>
                            <div class="panel-body">
                                <div class="m-b-15">
                                    <h5>Angular Js <span class="pull-right">60%</span></h5>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-primary wow animated progress-animated animated" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%; visibility: visible; animation-name: animationProgress;">
                                            <span class="sr-only">60% Complete</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="m-b-15">
                                    <h5>Javascript <span class="pull-right">90%</span></h5>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-pink wow animated progress-animated animated" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%; visibility: visible; animation-name: animationProgress;">
                                            <span class="sr-only">90% Complete</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="m-b-15">
                                    <h5>Wordpress <span class="pull-right">80%</span></h5>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-purple wow animated progress-animated animated" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%; visibility: visible; animation-name: animationProgress;">
                                            <span class="sr-only">80% Complete</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="m-b-0">
                                    <h5>HTML5 &amp; CSS3 <span class="pull-right">95%</span></h5>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-info wow animated progress-animated animated" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100" style="width: 95%; visibility: visible; animation-name: animationProgress;">
                                            <span class="sr-only">95% Complete</span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>

                </div>
            </div>
            <div class="tab-pane" id="profile-2" style="display: none;">
                <!-- Personal-Information -->
                <div class="panel panel-default panel-fill">

                    <div class="panel-body">
                        <div class="timeline-2">
                        <div class="time-item">
                            <div class="item-info">
                                <div class="text-muted">5 minutes ago</div>
                                <p><strong><a href="#" class="text-info">John Doe</a></strong> Uploaded a photo <strong>"DSC000586.jpg"</strong></p>
                            </div>
                        </div>

                        <div class="time-item">
                            <div class="item-info">
                                <div class="text-muted">30 minutes ago</div>
                                <p><a href="" class="text-info">Lorem</a> commented your post.</p>
                                <p><em>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam laoreet tellus ut tincidunt euismod. "</em></p>
                            </div>
                        </div>

                        <div class="time-item">
                            <div class="item-info">
                                <div class="text-muted">59 minutes ago</div>
                                <p><a href="" class="text-info">Jessi</a> attended a meeting with<a href="#" class="text-success">John Doe</a>.</p>
                                <p><em>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam laoreet tellus ut tincidunt euismod. "</em></p>
                            </div>
                        </div>

                        <div class="time-item">
                            <div class="item-info">
                                <div class="text-muted">5 minutes ago</div>
                                <p><strong><a href="#" class="text-info">John Doe</a></strong>Uploaded 2 new photos</p>
                            </div>
                        </div>

                        <div class="time-item">
                            <div class="item-info">
                                <div class="text-muted">30 minutes ago</div>
                                <p><a href="" class="text-info">Lorem</a> commented your post.</p>
                                <p><em>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam laoreet tellus ut tincidunt euismod. "</em></p>
                            </div>
                        </div>

                        <div class="time-item">
                            <div class="item-info">
                                <div class="text-muted">59 minutes ago</div>
                                <p><a href="" class="text-info">Jessi</a> attended a meeting with<a href="#" class="text-success">John Doe</a>.</p>
                                <p><em>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam laoreet tellus ut tincidunt euismod. "</em></p>
                            </div>
                        </div>
                    </div>

                    </div>
                </div>
                <!-- Personal-Information -->
            </div>



            <div class="tab-pane" id="messages-2" style="display: none;">
                <!-- Personal-Information -->
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading"><h3 class="panel-title">Change Password</h3></div>
                        <div class="panel-body">
                            <form action="{{route('update.password')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Old Password</label>
                                    <div class="col-sm-9">
                                        <input type="password" id="current_password" name="oldpassword" class="form-control" id="inputEmail3" placeholder="Email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-3 control-label">New Password</label>
                                    <div class="col-sm-9">
                                        <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword4" class="col-sm-3 control-label">Confirm Password</label>
                                    <div class="col-sm-9">
                                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Retype Password">
                                    </div>
                                </div>
                                <div class="form-group m-b-0">
                                    <div class="col-sm-offset-3 col-sm-9">
                                        <button type="submit" class="btn btn-info waves-effect waves-light">Save Change</button>
                                    </div>
                                </div>
                            </form>
                        </div> <!-- panel-body -->
                    </div> <!-- panel -->
                            </div>
                <!-- Personal-Information -->
            </div>


            <div class="tab-pane active" id="settings-2" style="display: block;">
                <!-- Personal-Information -->
                <div class="panel panel-default panel-fill">
                    <div class="panel-heading">
                        <h3 class="panel-title">Edit Profile</h3>
                    </div>
                    <div class="panel-body">
                        <form action="{{route('user.update')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="FullName">First Name</label>
                                <input type="text" name="fname" value="{{$user? $user->first_name: ''}}" id="FullName" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="FullName">Last Name</label>
                                <input type="text" name="lname" value="{{$user? $user->last_name: ''}}" id="FullName" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="Email">Email</label>
                                <input type="email" name="email" value="{{$user? $user->email: ''}}" id="Email" class="form-control">
                            </div>
                            {{-- <div class="form-group">
                                <label for="Username">Username</label>
                                <input type="text" value="john" id="Username" class="form-control">
                            </div> --}}
                            <div class="form-group">
                                <label for="Password">Phone</label>
                                <input type="number" name="phone" value="{{$user? $user->phone: ''}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Address</label>
                                <textarea name="address" class="form-control">{{$user? $user->address: ''}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="Password">Phone</label>
                                <input type="file" name="image" id="image" class="form-control">
                            </div>
                            <div class="form-group">
                                 <div class="controls">
                                    <img id="showImage" src="{{ (!empty($user->image))? url('upload/user_images/'.$user->image): url('upload/no_image.jpg') }}" alt="" style="height: 100px; width:100px; border: 1px solid #000000;">
                                </div>
                            </div>
                            {{-- <div class="form-group">
                                <label for="AboutMe">About Me</label>
                                <textarea style="height: 125px;" id="AboutMe" class="form-control">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</textarea>
                            </div> --}}
                            <button class="btn btn-primary waves-effect waves-light w-md" type="submit">Update</button>
                        </form>

                    </div>
                </div>
                <!-- Personal-Information -->
            </div>
        </div>
    </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
@endsection
