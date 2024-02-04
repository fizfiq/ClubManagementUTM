@extends('layouts.app')

@section('content')
<?php $rejectedStudents = []; ?>

<main class="app-main"><!--begin::App Content Header-->
            <div class="app-content-header"><!--begin::Container-->
                <div class="container-fluid"><!--begin::Row-->
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="mb-0">Club </h3>
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
                                            <label >Club Name</label>
                                            <input type="text" class="form-control" name="name" value="{{ Request::get('name') }}" placeholder="Club Name">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Date</label>
                                            <input type="date" class="form-control" name="date" value="{{ Request::get('date') }}" placeholder="Date">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <button class="btn btn-primary" type="submit" style="margin-top: 23px;">Search</button>
                                            <a href="{{ asset('student/club/list') }}" class="btn btn-success" style="margin-top: 23px;">Reset</a>
                                        </div>
                                      </div>                                          
                                    </div><!--end::Body-->
                                </form><!--end::Form-->
                            </div><!--end::Quick Example--><!--begin::Input Group-->
                            <div class="card card-outline mb-4">
                                <div class="card-header">
                                    <h3 class="card-title">Join List</h3>
                                    
                                </div><!-- /.card-header -->
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th style="width: 10px">#</th>
                                                <th>Club Name</th>
                                                <th>Position</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                             @foreach($getRecord as $value)
                                                
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                @foreach($getClub as $club)
                                                    @if($club->id == $value->club_id)
                                                    <td>{{ $club->name }}</td>
                                                   @endif
                                                @endforeach
                                                    <td>
                                                        @if($value->position == 0)
                                                            Pending
                                                        @elseif($value->position == 1)
                                                            Club Members
                                                        @elseif($value->position == 2)
                                                            Commitee Members
                                                        @elseif($value->position == 3)
                                                            High Commitee Members
                                                        @elseif($value->position == 4)
                                                            <?php $rejectedStudents[] = $value->club_id; ?>
                                                            Rejected
                                                        @endif
                                                    </td>
                                                    <td>
                                                    
                                                    </td>
                                                </tr>
                                                
                                            @endforeach
                                        </tbody>
                                    </table>
                                   
                                </div><!-- /.card-body -->
                            </div>
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
                                                <th>Status</th>
                                                <th>Participant</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($getClub as $value)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $value->name }}</td>
                                                    <td>
                                                        @if($value->status == 0)
                                                            Active
                                                        @else
                                                            Inactive
                                                        @endif
                                                    </td>
                                                    <td> 
                                                    @if(in_array($value->id, $rejectedStudents))
                                                        0
                                                    @else
                                                        {{ isset($clubParticipants[$value->id]) ? $clubParticipants[$value->id] : 0 }}
                                                    @endif
                                                    </td>
                                                    <td>
                                                    <form method="POST" action="{{ url('student/club/join/' . $value->id) }}">
                                                    {{ csrf_field() }}
                                                        <button type="submit" class="btn btn-primary">Join</button>
                                                    </form>
                                                    <!-- <a href="{{ asset('student/club/detail/'.$value->id) }}" class="btn btn-success">Details</a> -->
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