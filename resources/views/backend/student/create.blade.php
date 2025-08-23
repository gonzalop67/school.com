@extends('backend.layouts.app')

@section('content')
    <!-- START BREADCRUMB -->
    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Student</li>
    </ul>
    <!-- END BREADCRUMB -->

    <!-- PAGE TITLE -->
    <div class="page-title">
        <h2><span class="fa fa-arrow-circle-o-left"></span> Create Student</h2>
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
                            <h3 class="panel-title">Create Student</h3>
                        </div>
                        <div class="panel-body">

                            @if (Auth::user()->is_admin == 1 || Auth::user()->is_admin == 2)
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">School Name <span
                                            class="required">*</span></label>
                                    <div class="col-md-6 col-xs-12">
                                        <select class="form-control" name="school_id" required>
                                            <option value="">Select</option>
                                            @foreach ($getSchool as $school)
                                                <option value="{{ $school->id }}">{{ $school->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            @endif

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">First Name <span
                                        class="required">*</span></label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <input type="text" name="name" class="form-control"
                                            value="{{ old('name') }}" required />
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
                                            value="{{ old('last_name') }}" required />
                                    </div>
                                    <div class="required">{{ $errors->first('last_name') }}</div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Admission Number <span
                                        class="required">*</span></label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <input type="text" name="admission_number" class="form-control"
                                            value="{{ old('admission_number') }}" required />
                                    </div>
                                    <div class="required">{{ $errors->first('admission_number') }}</div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Roll Number <span
                                        class="required">*</span></label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <input type="text" name="roll_number" class="form-control"
                                            value="{{ old('roll_number') }}" required />
                                    </div>
                                    <div class="required">{{ $errors->first('roll_number') }}</div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Class <span
                                        class="required">*</span></label>
                                <div class="col-md-6 col-xs-12">
                                    <select class="form-control" name="class_id" required>
                                        <option value="">Select</option>
                                        @foreach ($getClass as $class)
                                            <option value="{{ $class->id }}">{{ $class->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Gender <span
                                        class="required">*</span></label>
                                <div class="col-md-6 col-xs-12">
                                    <select class="form-control" name="gender" required>
                                        <option value="">Select</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Date of Birth <span
                                        class="required">*</span></label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <input type="date" name="date_of_birth" class="form-control"
                                            value="{{ old('date_of_birth') }}" required />
                                    </div>
                                    <div class="required">{{ $errors->first('date_of_birth') }}</div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Caste <span
                                        class="required"></span></label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <input type="text" name="caste" class="form-control"
                                            value="{{ old('caste') }}" />
                                    </div>
                                    <div class="required">{{ $errors->first('caste') }}</div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Religion <span
                                        class="required"></span></label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <input type="text" name="religion" class="form-control"
                                            value="{{ old('religion') }}" />
                                    </div>
                                    <div class="required">{{ $errors->first('religion') }}</div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Mobile Number <span
                                        class="required"></span></label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <input type="text" name="mobile_number" class="form-control"
                                            value="{{ old('mobile_number') }}" />
                                    </div>
                                    <div class="required">{{ $errors->first('mobile_number') }}</div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Admission Date <span
                                        class="required">*</span></label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <input type="date" name="admission_date" class="form-control"
                                            value="{{ old('admission_date') }}" required />
                                    </div>
                                    <div class="required">{{ $errors->first('admission_date') }}</div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Profile Pic</label>
                                <div class="col-md-6 col-xs-12">
                                    <input type="file" name="profile_pic" style="padding: 5px;"
                                        class="form-control" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Blood Group <span
                                        class="required"></span></label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <input type="text" name="blood_group" class="form-control"
                                            value="{{ old('blood_group') }}" />
                                    </div>
                                    <div class="required">{{ $errors->first('blood_group') }}</div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Height <span
                                        class="required"></span></label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <input type="text" name="height" class="form-control"
                                            value="{{ old('height') }}" />
                                    </div>
                                    <div class="required">{{ $errors->first('height') }}</div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Weight <span
                                        class="required"></span></label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <input type="text" name="weight" class="form-control"
                                            value="{{ old('weight') }}" />
                                    </div>
                                    <div class="required">{{ $errors->first('weight') }}</div>
                                </div>
                            </div>

                            <hr>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Current Address <span
                                        class="required">*</span></label>
                                <div class="col-md-6 col-xs-12">
                                    <textarea name="address" class="form-control" required>{{ old('address') }}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Permanent Address <span
                                        class="required">*</span></label>
                                <div class="col-md-6 col-xs-12">
                                    <textarea name="permanent_address" class="form-control" required>{{ old('permanent_address') }}</textarea>
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
                                            value="{{ old('email') }}" required />
                                    </div>
                                    <div class="required">{{ $errors->first('email') }}</div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Password <span
                                        class="required">*</span></label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-unlock-alt"></span></span>
                                        <input type="password" name="password" class="form-control" required />
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Status <span
                                        class="required">*</span></label>
                                <div class="col-md-6 col-xs-12">
                                    <select class="form-control" name="status" required>
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
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
