@extends('backend.layouts.app')

@section('content')
    <!-- START BREADCRUMB -->
    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Parent</li>
    </ul>
    <!-- END BREADCRUMB -->

    <!-- PAGE TITLE -->
    <div class="page-title">
        <h2><span class="fa fa-arrow-circle-o-left"></span> Edit Parent</h2>
    </div>
    <!-- END PAGE TITLE -->

    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">

        <div class="row">
            <div class="col-md-12">

                <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Edit Parent</h3>
                        </div>
                        <div class="panel-body">

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">First Name <span
                                        class="required">*</span></label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <input type="text" name="name" class="form-control"
                                            value="{{ old('name', $getRecord->name) }}" required />
                                    </div>
                                    <div class="required">{{ $errors->first('name') }}</div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Last Name <span
                                        class="required">*</span></label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <input type="text" name="last_name" class="form-control"
                                            value="{{ old('last_name', $getRecord->last_name) }}" required />
                                    </div>
                                    <div class="required">{{ $errors->first('last_name') }}</div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Occupation <span
                                        class="required"></span></label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <input type="text" name="occupation" class="form-control"
                                            value="{{ old('occupation', $getRecord->occupation) }}" />
                                    </div>
                                    <div class="required">{{ $errors->first('occupation') }}</div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Gender <span
                                        class="required">*</span></label>
                                <div class="col-md-6 col-xs-12">
                                    <select class="form-control" name="gender" required>
                                        <option value="">Select</option>
                                        <option {{ ($getRecord->gender == 'Male') ? 'selected' : '' }} value="Male">Male</option>
                                        <option {{ ($getRecord->gender == 'Female') ? 'selected' : '' }} value="Female">Female</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Mobile Number <span
                                        class="required"></span></label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <input type="text" name="mobile_number" class="form-control"
                                            value="{{ old('mobile_number', $getRecord->mobile_number) }}" />
                                    </div>
                                    <div class="required">{{ $errors->first('mobile_number') }}</div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Profile Pic</label>
                                <div class="col-md-6 col-xs-12">
                                    <input type="file" name="profile_pic" style="padding: 5px;"
                                        class="form-control" />
                                    @if (!empty($getRecord->getProfile()))
                                        <img style="border: 0; margin-top: 4px; width: 50px; border-radius: 50%;"
                                            src="{{ $getRecord->getProfile() }}" alt="">
                                    @endif
                                </div>
                            </div>

                            <hr>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Current Address <span
                                        class="required">*</span></label>
                                <div class="col-md-6 col-xs-12">
                                    <textarea name="address" class="form-control" required>{{ old('address', $getRecord->address) }}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Permanent Address <span
                                        class="required">*</span></label>
                                <div class="col-md-6 col-xs-12">
                                    <textarea name="permanent_address" class="form-control" required>{{ old('permanent_address', $getRecord->permanent_address) }}</textarea>
                                </div>
                            </div>

                            <hr>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Email <span
                                        class="required">*</span></label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <input type="text" name="email" class="form-control"
                                            value="{{ old('email', $getRecord->email) }}" required />
                                    </div>
                                    <div class="required">{{ $errors->first('email') }}</div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Password <span
                                        class="required"></span></label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-unlock-alt"></span></span>
                                        <input type="text" name="password" class="form-control" />
                                        (Do you want to change password so please enter otherwise leave it blank)
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Status <span
                                        class="required">*</span></label>
                                <div class="col-md-6 col-xs-12">
                                    <select class="form-control" name="status" required>
                                        <option {{ ($getRecord->gender == 1) ? 'selected' : '' }} value="1">Active</option>
                                        <option {{ ($getRecord->gender == 0) ? 'selected' : '' }} value="0">Inactive</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="panel-footer">
                            <button class="btn btn-primary pull-right">Submit</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>

    </div>
    <!-- END PAGE CONTENT WRAPPER -->
@endsection

@section('script')
@endsection
