@extends('layouts.app')

@section('content')

<main class="app-main"><!--begin::App Content Header-->
            <div class="app-content-header"><!--begin::Container-->
                <div class="container-fluid"><!--begin::Row-->
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="mb-0">Admin List (Total : {{ $getRecord->total() }})</h3>
                        </div>
                        <div class="col-sm-6" style="text-align: right;">
                            <a href="{{ asset('admin/admin/add') }}" class="btn btn-primary">Add New Admin</a>
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
                                    <h3 class="card-title">Search Admin</h3>
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
                                            <label>Email</label>
                                            <input type="text" class="form-control" name="email" value="{{ Request::get('email') }}" placeholder="Email">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Date</label>
                                            <input type="date" class="form-control" name="date" value="{{ Request::get('date') }}" placeholder="Date">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <button class="btn btn-primary" type="submit" style="margin-top: 23px;">Search</button>
                                            <a href="{{ asset('admin/admin/list') }}" class="btn btn-success" style="margin-top: 23px;">Reset</a>
                                        </div>
                                      </div>                                          
                                    </div><!--end::Body-->
                                </form><!--end::Form-->
                            </div><!--end::Quick Example--><!--begin::Input Group-->
                            
                        @include('_message')
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h3 class="card-title">Admin List</h3>
                                </div><!-- /.card-header -->
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th style="width: 10px">#</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Created date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($getRecord as $value)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $value->name }}</td>
                                                <td>{{ $value->email }}</td>
                                                <td>{{ date('d-m-Y H:i A', strtotime($value->created_at)) }}</td>
                                                <td>
                                                    <a href="{{ asset('admin/admin/edit/'.$value->id) }}" class="btn btn-primary">Edit</a>
                                                    <a href="{{ asset('admin/admin/delete/'.$value->id) }}" class="btn btn-danger">Delete</a>
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