@extends('backend.layouts.app')

@section('content')
    <!-- START BREADCRUMB -->
    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Teacher</li>
    </ul>
    <!-- END BREADCRUMB -->

    <!-- PAGE TITLE -->
    <div class="page-title">
        <h2><span class="fa fa-arrow-circle-o-left"></span> Teacher</h2>
    </div>
    <!-- END PAGE TITLE -->

    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">
        <!-- START RESPONSIVE TABLES -->
        <div class="row">
            <div class="col-md-12">
                @include('_message')

                <div class="panel panel-default">

                    <div class="panel-heading">
                        <h3 class="panel-title">Teacher Search</h3>
                    </div>

                    <div class="panel-body">
                        <form action="" method="GET">
                            <div class="col-md-2">
                                <label>ID</label>
                                <input type="text" name="id" class="form-control" placeholder="ID"
                                    value="{{ Request::get('id') }}">
                            </div>
                            <div class="col-md-2">
                                <label>Email</label>
                                <input type="text" name="email" class="form-control" placeholder="Email"
                                    value="{{ Request::get('email') }}">
                            </div>
                            <div class="col-md-2">
                                <label>Status</label>
                                <select class="form-control" name="status">
                                    <option value="">Select</option>
                                    <option {{ (Request::get('status') == '1' ? 'selected' : '') }} value="1">Active</option>
                                    <option {{ (Request::get('status') == '100' ? 'selected' : '') }} value="100">Inactive</option>
                                </select>
                            </div>

                            <div style="clear: both;"></div>
                            <br>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">Search</button>
                                <a href="{{ url('panel/teacher') }}" class="btn btn-success">Reset</a>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="panel panel-default">

                    <div class="panel-heading">
                        <h3 class="panel-title">Teacher List</h3>
                        <a class="btn btn-primary pull-right" href="{{ url('panel/teacher/create') }}">Create Teacher</a>
                    </div>

                    <div class="panel-body panel-body-table">

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-actions">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Profile</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Address</th>
                                        <th>Status</th>
                                        <th>Created Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td colspan="100%">Record not found.</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

                <div class="pull-right">

                </div>

            </div>
        </div>
        <!-- END RESPONSIVE TABLES -->

        <!-- END PAGE CONTENT WRAPPER -->
    </div>
    <!-- END PAGE CONTENT WRAPPER -->
@endsection

@section('script')
@endsection
