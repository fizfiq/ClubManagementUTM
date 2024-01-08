@extends('layouts.app')

@section('content')

<main class="app-main"><!--begin::App Content Header-->
            <div class="app-content-header"><!--begin::Container-->
                <div class="container-fluid"><!--begin::Row-->
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="mb-0">Edit Department</h3>
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
                                            <label >Name</label>
                                            <input type="text" class="form-control" name="username" value="{{ old('username',$getRecord->username) }}" required placeholder="Name">
                                        </div>
                                        <div class="mb-3">
                                            <label>Department</label>
                                            <select class="form-select" name="dept_name" required>
                                                <option value="">Select Type</option>
                                                <option {{ ($getRecord->dept_name == 'Jab. TNC Pembangunan') ? 'selected' : '' }} value="Jab. TNC Pembangunan">Jab. TNC Pembangunan</option>
                                                <option {{ ($getRecord->dept_name == 'Jab. TNC HEPA') ? 'selected' : '' }} value="Jab. TNC HEPA">Jab. TNC HEPA</option>
                                                <option {{ ($getRecord->dept_name == 'Jab. TNC Penyelidikan dan Inovasi') ? 'selected' : '' }} value="Jab. TNC Penyelidikan dan Inovasi">Jab. TNC Penyelidikan dan Inovasi</option>
                                                <option {{ ($getRecord->dept_name == 'Jab. TNC Akademik dan Antarabangsa') ? 'selected' : '' }} value="Jab. TNC Akademik dan Antarabangsa">Jab. TNC Akademik dan Antarabangsa</option>
                                                <option {{ ($getRecord->dept_name == 'Jab. Pendaftar') ? 'selected' : '' }} value="Jab. Pendaftar">Jab. Pendaftar</option>
                                                <option {{ ($getRecord->dept_name == 'Jab. Perpustakaan') ? 'selected' : '' }} value="Jab. Perpustakaan">Jab. Perpustakaan</option>
                                                <option {{ ($getRecord->dept_name == 'Jab. Bendahari') ? 'selected' : '' }} value="Jab. Bendahari">Jab. Bendahari</option>
                                                <option {{ ($getRecord->dept_name == 'Jab. Perkhidmatan Digital') ? 'selected' : '' }} value="Jab. Perkhidmatan Digital">Jab. Perkhidmatan Digital</option>
                                                <option {{ ($getRecord->dept_name == 'Jab. Canselari') ? 'selected' : '' }} value="Jab. Canselari">Jab. Canselari</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label>Status</label>
                                            <select class="form-select" name="status" for="dropdown">
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