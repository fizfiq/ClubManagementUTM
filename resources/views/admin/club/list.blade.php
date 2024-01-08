@extends('layouts.app')

@section('content')

<main class="app-main"><!--begin::App Content Header-->
            <div class="app-content-header"><!--begin::Container-->
                <div class="container-fluid"><!--begin::Row-->
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="mb-0">Club List </h3>
                        </div>
                        <div class="col-sm-6" style="text-align: right;">
                            <a href="{{ asset('admin/club/add') }}" class="btn btn-primary">Add New Club</a>
                        </div>
                        
                    </div><!--end::Row-->
 
                </div><!--end::Container-->
                
            </div><!--end::App Content Header--><!--begin::App Content-->
            
            <div class="app-content"><!--begin::Container-->
            
                <div class="container-fluid"><!--begin::Row-->
                    <div class="row">
                        <div class="col-md-12">
                        
                        
                            <div class="card card-outline mb-4"><!--begin::Header-->
                            <div class="card-header">
                                    <h3 class="card-title">Search Club</h3>
                                </div>
                                <!--begin::Form-->
                                <form method="get" action=""><!--begin::Body-->
                                    <div class="card-body">
                                      <div class="row">
                                        <div class="form-group col-md-3">
                                            <label >Name</label>
                                            <input type="text" class="form-control" name="name" value="{{ Request::get('name') }}" placeholder="Name">
                                        </div>
                                        <div class="form-group col-md-3">
                                        <label>Club Type</label>
                                            <select class="form-select" name="type">
                                                <option value="">Select Type</option>
                                                <option {{ Request::get('type') == 'Sport' ? 'selected' : '' }} value="Sport">Sport</option>
                                                <option {{ Request::get('type') == 'Leadership' ? 'selected' : '' }} value="Leadership">Leadership</option>
                                                <option {{ Request::get('type') == 'Entrepreneur' ? 'selected' : '' }} value="Entrepreneur">Entrepreneur</option>
                                                <option {{ Request::get('type') == 'Culture' ? 'selected' : '' }} value="Culture">Culture</option>
                                                <option {{ Request::get('type') == 'Award' ? 'selected' : '' }} value="Award">Award</option>
                                                <option {{ Request::get('type') == 'Career' ? 'selected' : '' }} value="Career">Career</option>
                                                <option {{ Request::get('type') == 'Innovation' ? 'selected' : '' }} value="Innovation">Innovation</option>
                                                <option {{ Request::get('type') == 'Academic' ? 'selected' : '' }} value="Academic">Academic</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Date</label>
                                            <input type="date" class="form-control" name="date" value="{{ Request::get('date') }}" placeholder="Date">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <button class="btn btn-primary" type="submit" style="margin-top: 23px;">Search</button>
                                            <a href="{{ asset('admin/club/list') }}" class="btn btn-success" style="margin-top: 23px;">Reset</a>
                                        </div>
                                      </div>                                          
                                    </div><!--end::Body-->
                                </form><!--end::Form-->
                            </div><!--end::Quick Example--><!--begin::Input Group-->
                            
                        @include('_message')
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h3 class="card-title">Club List</h3>
                                </div><!-- /.card-header -->
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th style="width: 10px">#</th>
                                                <th>Club Name</th>
                                                <th>Club Type</th>
                                                <th>Status</th>
                                                <th>Created By</th>
                                                <th>Created date</th>
                                                <th>Updated Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($getRecord as $value)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $value->name }}</td>
                                                    <td>{{ $value->type }}</td>
                                                    <td>
                                                        @if($value->status == 0)
                                                            Active
                                                        @else
                                                            Inactive
                                                        @endif
                                                    </td>
                                                    <td>{{ $value->created_by_name }}</td>
                                                    <td>{{ date('d-m-Y H:i A', strtotime($value->created_at)) }}</td>
                                                    <td>{{ date('d-m-Y H:i A', strtotime($value->updated_at)) }}</td>
                                                    <td>
                                                    <a href="{{ asset('admin/club/edit/'.$value->id) }}" class="btn btn-primary">Edit</a>
                                                    <a href="{{ asset('admin/club/delete/'.$value->id) }}" class="btn btn-danger">Delete</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    
                                    <div style="padding: 10px; float: right">
                                    {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
                                    </div>
                                </div><!-- /.card-body -->
                                
                            </div><!-- /.card -->
                           
                        </div><!-- /.col -->
                      
                    </div><!--end::Row-->
                </div><!--end::Container-->
            </div><!--end::App Content-->
        </main><!--end::App Main-->
@endsection