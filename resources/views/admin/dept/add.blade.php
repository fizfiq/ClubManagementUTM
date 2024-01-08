@extends('layouts.app')

@section('content')

<main class="app-main"><!--begin::App Content Header-->
            <div class="app-content-header"><!--begin::Container-->
                <div class="container-fluid"><!--begin::Row-->
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="mb-0">Add New Department</h3>
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
                                            <label>Name</label>
                                            <input type="text" class="form-control" name="username" value="{{ old('username') }}" required placeholder="Name">
                                        </div>
                                        <div class="mb-3">
                                            <label>Department</label>
                                            <select class="form-select" name="dept_name" required>
                                                <option value="">Select Type</option>
                                                <option value="Jab. TNC Pembangunan">Jab. TNC Pembangunan</option>
                                                <option value="Jab. TNC HEPA">Jab. TNC HEPA</option>
                                                <option value="Jab. TNC Penyelidikan dan Inovasi">Jab. TNC Penyelidikan dan Inovasi</option>
                                                <option value="Jab. TNC Akademik dan Antarabangsa">Jab. TNC Akademik dan Antarabangsa</option>
                                                <option value="Jab. Pendaftar">Jab. Pendaftar</option>
                                                <option value="Jab. Perpustakaan">Jab. Perpustakaan</option>
                                                <option value="Jab. Bendahari">Jab. Bendahari</option>
                                                <option value="Jab. Perkhidmatan Digital">Jab. Perkhidmatan Digital</option>
                                                <option value="Jab. Canselari">Jab. Canselari</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label>Status</label>
                                            <select class="form-select" name="status" for="dropdown">
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