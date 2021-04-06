@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
User Profile
@parent
@stop

{{-- page level styles --}}
@section('header_styles')

    <link href="{{ asset('vendors/iCheck/css/all.css') }}"  rel="stylesheet" type="text/css" />
    <link href="{{ asset('vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet" type="text/css" />
    {{--<link href="{{ asset('vendors/x-editable/css/bootstrap-editable.css') }}" rel="stylesheet" type="text/css" />--}}
    <link href="{{ asset('vendors/bootstrap-magnify/bootstrap-magnify.css') }}" rel="stylesheet" />
    <link href="{{ asset('vendors/iCheck/css/all.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/pages/user_profile.css') }}" rel="stylesheet" type="text/css"/>
    <style>
        .fileinput .thumbnail > img{
            width:100%;
        }
    </style>
    
@stop

{{-- Page content --}}
@section('content')

<section class="content-header">
                <h1>
                    User Profile
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="livicon" data-name="home" data-size="14" data-color="#000"></i>
                            Dashboard
                        </a>
                    </li>
                    <li>Users</li>
                    <li class="active">View Profile</li>
                </ol>
            </section>
            <section class="content user_profile pl-3 pr-3">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="text-center">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail ">
                                                {{--<img src="{{ asset('img/authors/avatar3.jpg') }}" data-src="holder.js/366x218/#fff:#000" class="img-fluid" width="366px" height="218px" />--}}
                                                @if(Sentinel::getUser()->pic)
                                                    <img src="{!! url('/').'/uploads/users/'.Sentinel::getUser()->pic !!}" alt="img"
                                                         class="img-fluid " width="366px" height="218px"/>

                                                @elseif(Sentinel::getUser()->gender === "male")
                                                    <img src="{{ asset('images/authors/avatar3.png') }}" alt="img"
                                                         class="img-fluid " width="366px" height="218px"/>

                                                @elseif(Sentinel::getUser()->gender === "female")
                                                    <img src="{{ asset('images/authors/avatar5.png') }}" alt="img"
                                                         class="img-fluid " width="366px" height="218px"/>
                                                @else
                                                    <img src="{{ asset('images/authors/no_avatar.jpg') }}" alt="img"
                                                         class="img-fluid" width="366px" height="218px"/>
                                                @endif
                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail" ></div>
                                            <div>
                                                <span class="btn btn-secondary btn-file">
                                                    <span class="fileinput-new">
                                                        Select image
                                                    </span>
                                                    <span class="fileinput-exists">Change</span>
                                                    <input type="file" name="..."></span>
                                                <a href="#" class="btn btn-secondary fileinput-exists" data-dismiss="fileinput">Remove</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive-lg table-responsive-md table-responsive-sm">
                                    <table class="table  table-striped" id="users">

                                        <tr>
                                            <td>User Name</td>
                                            <td>
                                                <a href="#" data-pk="1" class="editable" data-title="Edit User Name">Bella</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td>
                                                <a href="#" data-pk="1" class="editable" data-title="Edit E-mail">
                                                    gankunding@hotmail.com
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Phone Number
                                            </td>
                                            <td>
                                                <a href="#" data-pk="1" class="editable" data-title="Edit Phone Number">
                                                    (999) 999-9999
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Address</td>
                                            <td>
                                                <a href="#" data-pk="1" class="editable" data-title="Edit Address">
                                                    Sydney, Australia
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Status</td>
                                            <td>
                                                <a href="#" id="status" data-type="select" data-pk="1" data-value="1" data-title="Status"></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Created At</td>
                                            <td>
                                                1 month ago
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>City</td>
                                            <td>
                                                <a href="#" data-pk="1"  class="editable" data-title="Edit City">Nakia</a>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                    <div class="card colr-hed">
                                        <div class="card-header">
                                            <span>Friends</span>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                            <div class="col-md-3 col-6">
                                                <div class="mag img-fluid">
                                                    <br />
                                                    <img data-toggle="magnify" class="thumbnail img-fluid" src="{{ asset('img/authors/avatar.jpg') }}" alt=""></div>
                                            </div>
                                            <div class="col-md-3 col-6">
                                                <div class="mag img-fluid">
                                                    <br />
                                                    <img data-toggle="magnify" src="{{ asset('img/authors/avatar3.jpg') }}" alt="" class="thumbnail img-fluid"></div>
                                            </div>
                                            <div class="col-md-3 col-6">
                                                <div class="mag img-fluid">
                                                    <br />
                                                    <img data-toggle="magnify" src="{{ asset('img/authors/avatar7.jpg') }}" alt="" class="thumbnail img-fluid"></div>
                                            </div>
                                            <div class="col-md-3 col-6">
                                                <div class="mag img-fluid">
                                                    <br />
                                                    <img data-toggle="magnify" src="{{ asset('img/authors/avatar5.jpg') }}" alt="" class="thumbnail img-fluid"></div>
                                            </div>

                                            <!--/span-->
                                            <div class="col-md-3 col-6">
                                                <div class="mag img-fluid">
                                                    <br />
                                                    <img data-toggle="magnify" src="{{ asset('img/authors/avatar4.jpg') }}" alt="" class="thumbnail img-fluid"></div>
                                            </div>
                                            <div class="col-md-3 col-6">
                                                <div class="mag img-fluid">
                                                    <br />
                                                    <img data-toggle="magnify" src="{{ asset('img/authors/avatar3.jpg') }}" alt="" class="thumbnail img-fluid"></div>
                                            </div>
                                            <div class="col-md-3 col-6">
                                                <div class="mag img-fluid">
                                                    <br />
                                                    <img data-toggle="magnify" src="{{ asset('img/authors/avatar2.jpg') }}" alt="" class="thumbnail img-fluid"></div>
                                            </div>
                                            <div class="col-md-3 col-6">
                                                <div class="mag img-fluid">
                                                    <br />
                                                    <img data-toggle="magnify" src="{{ asset('img/authors/avatar.jpg') }}" alt="" class="thumbnail img-fluid"></div>
                                            </div>

                                            <div class="col-md-3 col-6">
                                                <div class="mag img-fluid">
                                                    <br />
                                                    <img data-toggle="magnify" src="{{ asset('img/authors/avatar3.jpg') }}" alt="" class="thumbnail img-fluid"></div>
                                            </div>
                                            <div class="col-md-3 col-6">
                                                <div class="mag img-fluid">
                                                    <br />
                                                    <img data-toggle="magnify" src="{{ asset('img/authors/avatar4.jpg') }}" alt="" class="thumbnail img-fluid"></div>
                                            </div>
                                            <div class="col-md-3 col-6">
                                                <div class="mag img-fluid">
                                                    <br />
                                                    <img data-toggle="magnify" src="{{ asset('img/authors/avatar7.jpg') }}" alt="" class="thumbnail img-fluid"></div>
                                            </div>
                                            <div class="col-md-3 col-6">
                                                <div class="mag img-fluid">
                                                    <br />
                                                    <img data-toggle="magnify" src="{{ asset('img/authors/avatar.jpg') }}" alt="" class="thumbnail img-fluid"></div>
                                            </div>

                                            <div class="col-md-3 col-6">
                                                <div class="mag img-fluid">
                                                    <br />
                                                    <img data-toggle="magnify" class="thumbnail img-fluid" src="{{ asset('img/authors/avatar1.jpg') }}" alt=""></div>
                                            </div>
                                            <div class="col-md-3 col-6">
                                                <div class="mag img-fluid">
                                                    <br />
                                                    <img data-toggle="magnify" src="{{ asset('img/authors/avatar2.jpg') }}" alt="" class="thumbnail img-fluid"></div>
                                            </div>
                                            <div class="col-md-3 col-6">
                                                <div class="mag img-fluid">
                                                    <br />
                                                    <img data-toggle="magnify" src="{{ asset('img/authors/avatar3.jpg') }}" alt="" class="thumbnail img-fluid"></div>
                                            </div>
                                            <div class="col-md-3 col-6">
                                                <div class="mag img-fluid">
                                                    <br />
                                                    <img data-toggle="magnify" src="{{ asset('img/authors/avatar4.jpg') }}" alt="" class="thumbnail img-fluid"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-md-8">
                                <ul class="nav nav-tabs ul-edit">
                                    <li class="nav-item">
                                        <a href="#tab-change-pwd" data-toggle="tab" class="nav-link">
                                            <i class="livicon" data-name="key" data-size="16" data-c="#01BC8C" data-hc="#01BC8C" data-loop="true"></i> Change Password
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="clothing-nav-content">
                                    <div id="tab-change-pwd" class="tab-pane fade">
                                        <div class="row">
                                            <div class="col-md-12 pd-top">
                                                <form  class="form-horizontal">
                                                    <div class="form-body">
                                                        <div class="form-group">
                                                            <div class="row">

                                                            <label  class="col-md-3 control-label">
                                                                Password

                                                            </label>
                                                            <div class="col-md-9">

                                                                <div class="input-group">
                                                                    <span class="input-group-append">
                                                                        <span class="input-group-text"><i class="livicon" data-name="key" data-size="16" data-loop="true" data-c="#000" data-hc="#000"></i>
                                                                    </span>
                                                                        </span>
                                                                    <input type="password" id="password" placeholder="Password" name="password" class="form-control"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row">
                                                            <label class="col-md-3 control-label">
                                                                Confirm Password

                                                            </label>
                                                            <div class="col-md-9">
                                                                <div class="input-group">
                                                                    <span class="input-group-append">
                                                                        <span class="input-group-text"><i class="livicon" data-name="key" data-size="16" data-loop="true" data-c="#000" data-hc="#000"></i>
                                                                    </span>
                                                                        </span>
                                                                    <input type="password" id="password-confirm" placeholder="Confirm Password" name="confirm_password" class="form-control"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        </div>

                                                    </div>
                                                    <div class="form-actions">
                                                        <div class="col-md-offset-3 col-md-9 ml-auto">
                                                            <button type="submit" class="btn btn-primary" id="change-password">Submit</button>
                                                            &nbsp;
                                                            {{--<button type="reset" class="btn btn-danger">Cancel</button>--}}
                                                            &nbsp;
                                                            <input type="reset" class="btn btn-secondary hidden-xs" value="Reset"></div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

            </section>

        
    @stop

{{-- page level scripts --}}
@section('footer_scripts')

    <script src="{{ asset('vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}"  type="text/javascript"></script>
    <script src="{{ asset('vendors/jquery-mockjax/js/jquery.mockjax.js') }}"  type="text/javascript"></script>
    {{--<script src="{{ asset('vendors/x-editable/js/bootstrap-editable.js') }}"  type="text/javascript"></script>--}}
    <script src="{{ asset('vendors/bootstrap-magnify/bootstrap-magnify.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendors/iCheck/js/icheck.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/holder.js') }}"  type="text/javascript"></script>
    <script src="{{ asset('js/pages/user_profile.js') }}"  type="text/javascript"></script>

<script>
    $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {
        e.target // newly activated tab
        e.relatedTarget // previous active tab
        $("#clothing-nav-content .tab-pane").removeClass("show active");
    });
</script>

@stop
