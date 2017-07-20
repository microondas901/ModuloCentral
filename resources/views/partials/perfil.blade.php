<div class="row">

    <div class="col-md-4">
        <div class="portlet light profile-sidebar-portlet ">
            <!-- SIDEBAR USERPIC -->
            <div class="profile-userpic">
                <img src="../assets/pages/media/profile/profile_user.jpg" class="img-responsive" alt=""> </div>
            <!-- END SIDEBAR USERPIC -->
            <!-- SIDEBAR USER TITLE -->
            <div class="profile-usertitle">
                <div class="profile-usertitle-name"> Marcus Doe </div>
                <div class="profile-usertitle-job"> Developer </div>
            </div>
            <!-- END SIDEBAR USER TITLE -->
            <!-- SIDEBAR BUTTONS -->
            <div class="profile-userbuttons">
                <button type="button" class="btn btn-circle green btn-sm">Follow</button>
                <button type="button" class="btn btn-circle red btn-sm">Message</button>
            </div>
            <!-- END SIDEBAR BUTTONS -->
            <!-- SIDEBAR MENU -->
            <div class="profile-usermenu">
                <ul class="nav">
                    <li>
                        <a href="page_user_profile_1.html">
                            <i class="icon-home"></i> Overview </a>
                    </li>
                    <li class="active">
                        <a href="page_user_profile_1_account.html">
                            <i class="icon-settings"></i> Account Settings </a>
                    </li>
                    <li>
                        <a href="page_user_profile_1_help.html">
                            <i class="icon-info"></i> Help </a>
                    </li>
                </ul>
            </div>
            <!-- END MENU -->
        </div>
        <div class="portlet light ">
            <!-- STAT -->
            <div class="row list-separated profile-stat">
                <div class="col-md-4 col-sm-4 col-xs-6">
                    <div class="uppercase profile-stat-title"> 37 </div>
                    <div class="uppercase profile-stat-text"> Projects </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-6">
                    <div class="uppercase profile-stat-title"> 51 </div>
                    <div class="uppercase profile-stat-text"> Tasks </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-6">
                    <div class="uppercase profile-stat-title"> 61 </div>
                    <div class="uppercase profile-stat-text"> Uploads </div>
                </div>
            </div>
            <!-- END STAT -->
            <div>
                <h4 class="profile-desc-title">About Marcus Doe</h4>
                <span class="profile-desc-text"> Lorem ipsum dolor sit amet diam nonummy nibh dolore. </span>
                <div class="margin-top-20 profile-desc-link">
                    <i class="fa fa-globe"></i>
                    <a href="http://www.keenthemes.com">www.keenthemes.com</a>
                </div>
                <div class="margin-top-20 profile-desc-link">
                    <i class="fa fa-twitter"></i>
                    <a href="http://www.twitter.com/keenthemes/">@keenthemes</a>
                </div>
                <div class="margin-top-20 profile-desc-link">
                    <i class="fa fa-facebook"></i>
                    <a href="http://www.facebook.com/keenthemes/">keenthemes</a>
                </div>
            </div>
        </div>
    </div>


    <div class="col-md-8">
        <div class="profile-content">

            <div class="portlet-title tabbable-line">

                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#tab_1_1" data-toggle="tab">Personal Info</a>
                    </li>
                    <li>
                        <a href="#tab_1_2" data-toggle="tab">Change Avatar</a>
                    </li>
                    <li>
                        <a href="#tab_1_3" data-toggle="tab">Change Password</a>
                    </li>
                    <li>
                        <a href="#tab_1_4" data-toggle="tab">Privacy Settings</a>
                    </li>
                </ul>
            </div>
            <div class="portlet-body">
                <div class="tab-content">
                    <!-- PERSONAL INFO TAB -->
                    <div class="tab-pane active" id="tab_1_1">
                        <form role="form" action="#">
                            <br>
                            <div class="form-group form-md-line-input">
                                <div class="input-icon">
                                    <input class="form-control" id="name" name="name" type="text" maxlength="10" v-model="newUser.name" />
                                    <label class="control-label">Nombre</label>
                                    <span class="help-block">Digite el Nombre</span>
                                    <i class="fa fa-user"></i>
                                </div>
                            </div>

                            <div class="form-group form-md-line-input">
                                <div class="input-icon">
                                    <input class="form-control" id="name" name="name" type="text" maxlength="10" v-model="newUser.name" readonly/>
                                    <label class="control-label">Rol</label>
                                    <span class="help-block">Digite el Nombre</span>
                                    <i class="fa fa-user"></i>
                                </div>
                            </div>

                            <div class="margiv-top-10">
                                <a href="javascript:;" class="btn green"> Save Changes </a>
                                <a href="javascript:;" class="btn default"> Cancel </a>
                            </div>
                        </form>
                    </div>
                    <!-- END PERSONAL INFO TAB -->
                    <!-- CHANGE AVATAR TAB -->
                    <div class="tab-pane" id="tab_1_2">
                        <p> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. </p>
                        <form action="#" role="form">
                            <div class="form-group">
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                        <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" /> </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                    <div>
                                        <span class="btn default btn-file">
                                                                            <span class="fileinput-new"> Select image </span>
                                        <span class="fileinput-exists"> Change </span>
                                        <input type="file" name="..."> </span>
                                        <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                    </div>
                                </div>
                                <div class="clearfix margin-top-10">
                                    <span class="label label-danger">NOTE! </span>
                                    <span>Attached image thumbnail is supported in Latest Firefox, Chrome, Opera, Safari and Internet Explorer 10 only </span>
                                </div>
                            </div>
                            <div class="margin-top-10">
                                <a href="javascript:;" class="btn green"> Submit </a>
                                <a href="javascript:;" class="btn default"> Cancel </a>
                            </div>
                        </form>
                    </div>
                    <!-- END CHANGE AVATAR TAB -->
                    <!-- CHANGE PASSWORD TAB -->
                    <div class="tab-pane" id="tab_1_3">
                        <form action="#">
                            <div class="form-group">
                                <label class="control-label">Current Password</label>
                                <input type="password" class="form-control" /> </div>
                            <div class="form-group">
                                <label class="control-label">New Password</label>
                                <input type="password" class="form-control" /> </div>
                            <div class="form-group">
                                <label class="control-label">Re-type New Password</label>
                                <input type="password" class="form-control" /> </div>
                            <div class="margin-top-10">
                                <a href="javascript:;" class="btn green"> Change Password </a>
                                <a href="javascript:;" class="btn default"> Cancel </a>
                            </div>
                        </form>
                    </div>
                    <!-- END CHANGE PASSWORD TAB -->
                    <!-- PRIVACY SETTINGS TAB -->
                    <div class="tab-pane" id="tab_1_4">
                        <form action="#">
                            <table class="table table-light table-hover">
                                <tr>
                                    <td> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus.. </td>
                                    <td>
                                        <div class="mt-radio-inline">
                                            <label class="mt-radio">
                                                                                <input type="radio" name="optionsRadios1" value="option1" /> Yes
                                                                                <span></span>
                                                                            </label>
                                            <label class="mt-radio">
                                                                                <input type="radio" name="optionsRadios1" value="option2" checked/> No
                                                                                <span></span>
                                                                            </label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td> Enim eiusmod high life accusamus terry richardson ad squid wolf moon </td>
                                    <td>
                                        <div class="mt-radio-inline">
                                            <label class="mt-radio">
                                                                                <input type="radio" name="optionsRadios11" value="option1" /> Yes
                                                                                <span></span>
                                                                            </label>
                                            <label class="mt-radio">
                                                                                <input type="radio" name="optionsRadios11" value="option2" checked/> No
                                                                                <span></span>
                                                                            </label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td> Enim eiusmod high life accusamus terry richardson ad squid wolf moon </td>
                                    <td>
                                        <div class="mt-radio-inline">
                                            <label class="mt-radio">
                                                                                <input type="radio" name="optionsRadios21" value="option1" /> Yes
                                                                                <span></span>
                                                                            </label>
                                            <label class="mt-radio">
                                                                                <input type="radio" name="optionsRadios21" value="option2" checked/> No
                                                                                <span></span>
                                                                            </label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td> Enim eiusmod high life accusamus terry richardson ad squid wolf moon </td>
                                    <td>
                                        <div class="mt-radio-inline">
                                            <label class="mt-radio">
                                                                                <input type="radio" name="optionsRadios31" value="option1" /> Yes
                                                                                <span></span>
                                                                            </label>
                                            <label class="mt-radio">
                                                                                <input type="radio" name="optionsRadios31" value="option2" checked/> No
                                                                                <span></span>
                                                                            </label>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                            <!--end profile-settings-->
                            <div class="margin-top-10">
                                <a href="javascript:;" class="btn red"> Save Changes </a>
                                <a href="javascript:;" class="btn default"> Cancel </a>
                            </div>
                        </form>
                    </div>
                    <!-- END PRIVACY SETTINGS TAB -->

                </div>
            </div>

        </div>
    </div>
    @push('styles')
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
    <link href="../assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="../assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
    <link href="../assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="../assets/pages/css/profile.min.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <link href="../assets/layouts/layout2/css/layout.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/layouts/layout2/css/themes/blue.min.css" rel="stylesheet" type="text/css" id="style_color" />
    <link href="../assets/layouts/layout2/css/custom.min.css" rel="stylesheet" type="text/css" />
    <!-- END THEME LAYOUT STYLES -->
    <link rel="shortcut icon" href="favicon.ico" /> </head>
    @endpush