@extends('layouts.app')

@section('content')

<main class="app-main"><!--begin::App Content Header-->
            <div class="app-content-header"><!--begin::Container-->
                <div class="container-fluid"><!--begin::Row-->
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="mb-0">Department List </h3>
                        </div>
                        <div class="col-sm-6" style="text-align: right;">
                            <a href="{{ asset('admin/dept/add') }}" class="btn btn-primary">Add New Department</a>
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
                                    <h3 class="card-title">Search Department</h3>
                                </div>
                                <!--begin::Form-->
                                <form method="get" action=""><!--begin::Body-->
                                    <div class="card-body">
                                      <div class="row">
                                        <div class="form-group col-md-3">
                                            <label >Name</label>
                                            <input type="text" class="form-control" name="username" value="{{ Request::get('username') }}" placeholder="Name">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label >Department Name</label>
                                            <input type="text" class="form-control" name="dept_name" value="{{ Request::get('dept_name') }}" placeholder="Department Name">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Date</label>
                                            <input type="date" class="form-control" name="date" value="{{ Request::get('date') }}" placeholder="Date">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <button class="btn btn-primary" type="submit" style="margin-top: 23px;">Search</button>
                                            <a href="{{ asset('admin/dept/list') }}" class="btn btn-success" style="margin-top: 23px;">Reset</a>
                                        </div>
                                      </div>                                          
                                    </div><!--end::Body-->
                                </form><!--end::Form-->
                            </div><!--end::Quick Example--><!--begin::Input Group-->
                            
                        @include('_message')
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h3 class="card-title">Department List</h3>
                                </div><!-- /.card-header -->
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th style="width: 10px">#</th>
                                                <th>Name</th>
                                                <th>Department Name</th>
                                                <th>Status</th>
                                                <th>Created By</th>
                                                <th>Created date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($getRecord as $value)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $value->username }}</td>
                                                    <td>{{ $value->dept_name }}</td>
                                                    <td>
                                                        @if($value->status == 0)
                                                            Active
                                                        @else
                                                            Inactive
                                                        @endif
                                                    </td>
                                                    <td>{{ $value->created_by_name }}</td>
                                                    <td>{{ date('d-m-Y H:i A', strtotime($value->created_at)) }}</td>
                                                    <td>
                                                    <a href="{{ asset('admin/dept/edit/'.$value->id) }}" class="btn btn-primary">Edit</a>
                                                    <a href="{{ asset('admin/dept/delete/'.$value->id) }}" class="btn btn-danger">Delete</a>
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