@extends('layouts.app')

@section('content')

<main class="app-main"><!--begin::App Content Header-->
            <div class="app-content-header"><!--begin::Container-->
                <div class="container-fluid"><!--begin::Row-->
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="mb-0">Edit Assign Club</h3>
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
                                            <label>Department Name</label>
                                            <select class="form-select" name="dept_id" required>
                                                <option value="">Select Department</option>
                                                @foreach($getDept as $dept)
                                                <option {{ ($getRecord->dept_id == $dept->id) ? 'selected' : '' }} value="{{ $dept->id }}">{{ $dept->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label>Club Name</label>
                                            <select class="form-select" name="club_id" required>
                                                <option value="">Select Department</option>
                                                @foreach($getClub as $club)
                                                <option {{ ($getRecord->club_id == $club->id) ? 'selected' : '' }} value="{{ $club->id }}">{{ $club->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label>Status</label>
                                            <select class="form-select" name="status">
                                                <option {{ ($getRecord->dept_id == 0) ? 'selected' : '' }} value="0">Active</option>
                                                <option {{ ($getRecord->dept_id == 1) ? 'selected' : '' }} value="1">Inactive</option>
                                            </select>
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