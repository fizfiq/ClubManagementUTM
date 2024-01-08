@extends('layouts.app')

@section('content')

<main class="app-main"><!--begin::App Content Header-->
            <div class="app-content-header"><!--begin::Container-->
                <div class="container-fluid"><!--begin::Row-->
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="mb-0">Apply New Club</h3>
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
                            <form method="POST" action="" enctype="multipart/form-data">
                                {{ csrf_field() }}
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="club_name">Club Name:</label>
                                    <input type="text" class="form-control" id="" name="name" required placeholder="Name">
                                </div>
                                <div class="mb-3">
                                    <label>Club Type</label>
                                    <select class="form-select" name="type" required>
                                        <option value="">Select Type</option>
                                        <option value="Sport">Sport</option>
                                        <option value="Leadership">Leadership</option>
                                        <option value="Entrepreneur">Entrepreneur</option>
                                        <option value="Culture">Culture</option>
                                        <option value="Award">Award</option>
                                        <option value="Career">Career</option>
                                        <option value="Innovation">Innovation</option>
                                        <option value="Academic">Academic</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="description">Description:</label>
                                    <textarea class="form-control" id="" name="description" rows="5" required></textarea>
                                </div>

                                <div class="mb-3">
                                    <label>Proposal</label>
                                    <input type="file" class="form-control" name="proposal" value="{{ old('proposal') }}" required placeholder="proposal">
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary">Submit Application</button>    
                                </div>
                                
                            </div>
                            </form>
                            <!--end::Form-->
                            </div><!--end::Quick Example--><!--begin::Input Group-->
                            
                    </div><!--end::Row-->
                </div><!--end::Container-->
            </div><!--end::App Content-->
        </main><!--end::App Main-->

@endsection