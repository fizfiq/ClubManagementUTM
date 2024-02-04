@extends('layouts.app')

@section('content')

<main class="app-main"><!--begin::App Content Header-->
            <div class="app-content-header"><!--begin::Container-->
                <div class="container-fluid"><!--begin::Row-->
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="mb-0">Edit Member</h3>
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
                                            <input type="text" class="form-control" name="name" readonly value="{{ old('memberName',$getRecord->memberName) }}" required placeholder="Name">
                                        </div>
                                        <div class="mb-3">
                                            <label>Position</label>
                                            <select class="form-select" name="position" for="dropdown">
                                                <option {{ ($getRecord->position == 0) ? 'selected' : '' }} value="0">Pending</option>
                                                <option {{ ($getRecord->position == 1) ? 'selected' : '' }} value="1">Club Member</option>
                                                <option {{ ($getRecord->position == 2) ? 'selected' : '' }} value="2">Commitee Member</option>
                                                <option {{ ($getRecord->position == 3) ? 'selected' : '' }} value="3">High Commitee Member</option>
                                                <option {{ ($getRecord->position == 4) ? 'selected' : '' }} value="4">Rejected</option>
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