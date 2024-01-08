@extends('layouts.app')

@section('content')

<main class="app-main"><!--begin::App Content Header-->
            <div class="app-content-header"><!--begin::Container-->
                <div class="container-fluid"><!--begin::Row-->
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="mb-0">Edit Club</h3>
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
                                            <input type="text" class="form-control" name="name" value="{{ $getRecord->name }}" required placeholder="Club Name">
                                        </div>
                                        <div class="mb-3">
                                            <label>Club Type</label>
                                            <select class="form-select" name="type" required>
                                                <option value="">Select Type</option>
                                                <option {{ ($getRecord->type == 'Sport') ? 'selected' : '' }} value="Sport">Sport</option>
                                                <option {{ ($getRecord->type == 'Leadership') ? 'selected' : '' }} value="Leadership">Leadership</option>
                                                <option {{ ($getRecord->type == 'Entrepreneur') ? 'selected' : '' }} value="Entrepreneur">Entrepreneur</option>
                                                <option {{ ($getRecord->type == 'Culture') ? 'selected' : '' }} value="Culture">Culture</option>
                                                <option {{ ($getRecord->type == 'Award') ? 'selected' : '' }} value="Award">Award</option>
                                                <option {{ ($getRecord->type == 'Career') ? 'selected' : '' }} value="Career">Career</option>
                                                <option {{ ($getRecord->type == 'Innovation') ? 'selected' : '' }} value="Innovation">Innovation</option>
                                                <option {{ ($getRecord->type == 'Academic') ? 'selected' : '' }} value="Academic">Academic</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label>Status</label>
                                            <select class="form-select" name="status">
                                                <option {{ ($getRecord->status == 0) ? 'selected' : '' }} value="0">Active</option>
                                                <option {{ ($getRecord->status == 1) ? 'selected' : '' }} value="1">Inactive</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label>Email</label>
                                            <input type="email" class="form-control" name="email" value="{{ old('email',$getRecord->email) }}" required placeholder="Email">
                                            <div style="color:red">{{ $errors->first('email') }}</div>
                                        </div>
                                        <div class="mb-3">
                                            <label >Password</label>
                                            <input type="text" class="form-control" name="password" placeholder="Password">
                                            <p>Do you want to change password so please add new password</p>
                                        </div>
                                    </div><!--end::Body--><!--begin::Footer-->
                                    <div class="card-footer"><button type="submit" class="btn btn-primary">Update</button></div><!--end::Footer-->
                                </form><!--end::Form-->
                            </div><!--end::Quick Example--><!--begin::Input Group-->
                            
                    </div><!--end::Row-->
                </div><!--end::Container-->
            </div><!--end::App Content-->
        </main><!--end::App Main-->

@endsection