@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><b>User</b> Dashboard <i class="fa fa-angle-right" aria-hidden="true"></i> Profile </div>

                        <div class="panel-body">
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('/user/profile') }}" runat="server">

                            <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-3 control-label">Name</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" autofocus>
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-3 control-label">Email</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" autofocus>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group {{ $errors->has('job_title') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-3 control-label">Job Title</label>
                                <div class="col-md-6">
                                    <input id="job_title" type="text" class="form-control" name="job_title" value="{{ $user->job_title }}" autofocus>
                                    @if ($errors->has('job_title'))
                                        <span class="help-block">
                                    <strong>{{ $errors->first('job_title') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group {{ $errors->has('home_phone') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-3 control-label">Home Phone</label>
                                <div class="col-md-6">
                                    <input id="home_phone" type="tel" class="form-control" name="home_phone" value="{{ $user->home_phone }}" autofocus>
                                    @if ($errors->has('home_phone'))
                                        <span class="help-block">
                                    <strong>{{ $errors->first('home_phone') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group {{ $errors->has('mobile_phone') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-3 control-label">Mobile Phone</label>
                                <div class="col-md-6">
                                    <input id="mobile_phone" type="tel" class="form-control" name="mobile_phone" value="{{ $user->mobile_phone }}" autofocus>
                                    @if ($errors->has('mobile_phone'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('mobile_phone') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-4 col-md-offset-4">
                                    <img id="preview" class="thumbnail" style="width: 200px; height: 150px;">
                                    <div>
                                        <label class="btn btn-file">
                                            <span class="fileupload-new"><strong>Select Image</strong></span>
                                            <input type="file" id="imgUpload"/>
                                        </label>
                                        <a style="width:220px;" href="#" class="btn" id="imgRemove">Remove</a>
                                    </div>
                                </div>
                            </div>
                                <button class="btn btn-block" type="submit">Save</button>
                                <button class="btn btn-block" type="button" id="back">Back</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                 console.log(input.files[0]);
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#preview').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imgUpload").change(function(){
            readURL(this);
        });

        $("#imgRemove").click(function() {
            $("#imgUpload").val("");
            $("#preview").attr("src","");
        });

        $("#back").click(function() {
            window.history.back();
        });
    </script>
@endsection