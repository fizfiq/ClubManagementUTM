@extends('layouts.app')

@section('content')

<main class="app-main"><!--begin::App Content Header-->
            <div class="app-content-header"><!--begin::Container-->
                <div class="container-fluid"><!--begin::Row-->
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="mb-0">Application Details</h3>
                        </div>
                        
                    </div><!--end::Row-->
 
                </div><!--end::Container-->
                
            </div><!--end::App Content Header--><!--begin::App Content-->
            
            <div class="app-content"><!--begin::Container-->
            
                <div class="container-fluid"><!--begin::Row-->
                    <div class="row">
                        <div class="col-md-12">
                        
                        @include('_message')
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h3 class="card-title">Application Details</h3>
                                </div><!-- /.card-header -->
                                <div class="card-body">
                                    <form method="post" action="">
                                    {{ csrf_field() }}
                                        <div class="card-body">
                                        <div class="mb-3">
                                            <label>Name</label>
                                            <div class="form-control" readonly>{{ $getApply->name }}</div>
                                        </div>
                                        <div class="mb-3">
                                            <label>Club Type</label>
                                            <div class="form-control" readonly>{{ $getApply->type }}</div>
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label>Status</label>
                                            <select class="form-select" name="status">
                                                <option value="">Select Status</option>
                                                <option {{ ($getApply->status == '0') ? 'selected' : '' }} value="Pending">Pending</option>
                                                <option {{ ($getApply->status == '1') ? 'selected' : '' }} value="Approved">Approved</option>
                                                <option {{ ($getApply->status == '2') ? 'selected' : '' }} value="Rejected">Rejected</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label>Description</label>
                                            <div class="form-control" readonly >{{ $getApply->description }}</div>
                                        </div>
                                        <div class="mb-3">
                                            <label>Comments</label>
                                            <textarea class="form-control" name="comment" rows="3" >{{ old('comment') }}</textarea>
                                        </div>
                                        </div>
                                        <div class="card-footer"><button type="submit" class="btn btn-primary">Update</button></div><!--end::Footer-->
                                    </form>
                                </div><!-- /.card-body -->
                                
                            </div><!-- /.card -->
                           
                        </div><!-- /.col -->
                      
                    </div><!--end::Row-->
                </div><!--end::Container-->
            </div><!--end::App Content-->
        </main><!--end::App Main-->
@endsection