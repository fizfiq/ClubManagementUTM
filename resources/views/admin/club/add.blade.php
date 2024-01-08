@extends('layouts.app')

@section('content')

<main class="app-main"><!--begin::App Content Header-->
            <div class="app-content-header"><!--begin::Container-->
                <div class="container-fluid"><!--begin::Row-->
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="mb-0">Add New Club</h3>
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
                                <form method="post" action=""><!--begin::Body-->
                                {{ csrf_field() }}
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label>Club Name</label>
                                            <input type="text" class="form-control" name="name" value="{{ old('name') }}" required placeholder="Club Name">
                                        </div>
                                        <div class="mb-3">
                                            <label>Club Type</label>
                                            <select class="form-select" name="type" required>
                                                <option value="">Select Type</option>
                                                <option value="Sport">Sport</option>
                                                <option value="Leadership">Leadership</option>
                                                <option value="Entrepreneur">Entrepreneur</option>
                                                <option value="Culture">Culture</option>
                                                <option value="Award">Award</option>
                                                <option value="Career">Career</option>
                                                <option value="Innovation">Innovation</option>
                                                <option value="Academic">Academic</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label>Status</label>
                                            <select class="form-select" name="status">
                                                <option value="0">Active</option>
                                                <option value="1">Inactive</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label>Email</label>
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