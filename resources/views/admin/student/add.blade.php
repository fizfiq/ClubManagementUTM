@extends('layouts.app')

@section('content')

<main class="app-main"><!--begin::App Content Header-->
            <div class="app-content-header"><!--begin::Container-->
                <div class="container-fluid"><!--begin::Row-->
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="mb-0">Add New Student</h3>
                        </div>
                        
                    </div><!--end::Row-->
                </div><!--end::Container-->
            </div><!--end::App Content Header--><!--begin::App Content-->
            <div class="app-content"><!--begin::Container-->
                <div class="container-fluid"><!--begin::Row-->
                    <div class="row g-4"><!--begin::Col-->
                        <!--begin::Col-->
                        <div class="col-md-12"><!--begin::Quick Example-->
                            <div class="card card-primary card-outline mb-4"><!--begin::Header-->
                                <!--begin::Form-->
                                <form method="post" action="" enctype="multipart/form-data"><!--begin::Body-->
                                {{ csrf_field() }}
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label>First Name <span style="color: red;">*</span></label>
                                                <input type="text" class="form-control" name="name" value="{{ old('name') }}" required placeholder="First Name">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Last Name <span style="color: red;">*</span></label>
                                                <input type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" required placeholder="Last Name">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Gender<span style="color: red;">*</span></label>
                                                <select class="form-select" required name="gender">
                                                    <option value="">Select gender</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Date Of Birth <span style="color: red;">*</span></label>
                                                <input type="date" class="form-control" name="date_of_birth" value="{{ old('date_of_birth') }}">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Student ID<span style="color: red;">*</span></label>
                                                <input type="text" class="form-control" name="student_id" value="{{ old('student_id') }}" required placeholder="Student ID">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Address <span style="color: red;">*</span></label>
                                                <input type="text" class="form-control" name="address" value="{{ old('address') }}" required placeholder="Address">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Phone Number <span style="color: red;">*</span></label>
                                                <input type="text" class="form-control" name="phone_num" value="{{ old('phone_num') }}" required placeholder="Phone Number">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Course Code <span style="color: red;">*</span></label>
                                                <input type="text" class="form-control" name="course" value="{{ old('course') }}" required placeholder="Course">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Faculty <span style="color: red;">*</span></label>
                                                <select class="form-select" required name="faculty">
                                                    <option value="">Select Faculty</option>
                                                    @foreach($getFaculty as $value)
                                                    <option value="{{$value->id}}">{{ $value->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Profile Picture </label>
                                                <input type="file" class="form-control" name="profile_pic" value="{{ old('profile_pic') }}" placeholder="Profile Picture">
                                            </div>
                                            
                                        </div>
                                        <div class="mb-3">
                                            <label>Status <span style="color: red;">*</span></label>
                                            <select class="form-select" required name="status">
                                                <option value="">Select Status</option>
                                                <option value="0">Active</option>
                                                <option value="1">Inactive</option>
                                            </select>
                                        </div>
                                        <hr/>
                                        <div class="mb-3">
                                            <label>Email<span style="color: red;">*</span></label>
                                            <input type="email" class="form-control" name="email" value="{{ old('email') }}" required placeholder="Email">
                                            <div style="color:red">{{ $errors->first('email') }}</div>
                                        </div>
                                        <div class="mb-3">
                                            <label >Password<span style="color: red;">*</span></label>
                                            <input type="password" class="form-control" name="password" required placeholder="Password">
                                        </div>
                                        
                                    </div><!--end::Body--><!--begin::Footer-->
                                    <div class="card-footer"><button type="submit" class="btn btn-primary">Submit</button></div><!--end::Footer-->
                                </form><!--end::Form-->
                            </div><!--end::Quick Example--><!--begin::Input Group-->
                            
                    </div><!--end::Row-->
                </div><!--end::Container-->
            </div><!--end::App Content-->
        </main><!--end::App Main-->

@endsection