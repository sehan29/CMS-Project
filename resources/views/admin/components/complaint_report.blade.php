@extends('layouts.admin')

@section('content')

@section('content')
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Complaint Reports</h4>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-xl-12 stretch-card">
            <div class="row flex-grow">
                
                <div class="col-md-3 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-baseline">
                                <h6 class="card-title mb-0">April Total Complaint</h6>
                            </div>
                            <div class="row">
                                <div class="col-6 col-md-12 col-xl-5 mt-4">
                                    <h3 class="mb-2">397</h3>
                                </div>
                                <div class="col-6 col-md-12 col-xl-7 d-flex justify-content-center align-items-center mt-4">
                                    <i class="fas fa-users fa-3x text-primary"></i> 
                 
                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-3 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-baseline">
                                <h6 class="card-title mb-0">April Not Assign Complaint</h6>
                            </div>
                            <div class="row">
                                <div class="col-6 col-md-12 col-xl-5 mt-4">
                                    <h3 class="mb-2">35</h3>
                                     
                                </div>
                                <div class="col-6 col-md-12 col-xl-7 d-flex justify-content-center align-items-center mt-4">
                                    <i class="fas fa-user-tie fa-3x text-primary"></i> 
                 
                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-baseline">
                                <h6 class="card-title mb-0">April Inprograss Complaint</h6>
                            </div>
                            <div class="row">
                                <div class="col-6 col-md-12 col-xl-5 mt-4">
                                    <h3 class="mb-2">89</h3>
                                     
                                </div>
                                <div class="col-6 col-md-12 col-xl-7 d-flex justify-content-center align-items-center mt-4">
                                    <i class="fas fa-exclamation-circle fa-3x text-primary"></i> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-baseline">
                                <h6 class="card-title mb-0">April Closed Complaint</h6>
                            </div>
                            <div class="row">
                                <div class="col-6 col-md-12 col-xl-5 mt-3">
                                    <h3 class="mb-2">7</h3>
                                    <div class="d-flex align-items-baseline">
                                    </div>
                                </div>
                                <div class="col-6 col-md-12 col-xl-7 d-flex justify-content-center align-items-center mt-4">
                                    <i class="fas fa-clock fa-3x text-primary"></i> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h5 class="m-0 font-weight-bold text-dark">Complaints Reports</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Month</th>
                            <th>Total Complaint</th>
                            <th>Closed Complaint</th>
                            <th>Quiet Division</th>
                            <th>Major Division</th>
                            <th>Average Rating</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>April</td>
                            <td>120</td>
                            <td>20</td>
                            <td>Quiet Division</td>
                            <td>Tourist Police</td>

                            <td>3.5/5</td>
                            <td><button type="button" class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i>
                                View</button>
                                <button type="button" class="btn btn-success"><i class="fa fa-print" aria-hidden="true"></i>
                                    Print</button>
                            </td>
                        </tr>

                        <tr>
                            <td>1</td>
                            <td>April</td>
                            <td>120</td>
                            <td>20</td>
                            <td>Quiet Division</td>
                            <td>Tourist Police</td>

                            <td>3.5/5</td>
                            <td><a href="{{ route('details_complaint_report.report') }}" class="btn btn-primary">
                                <i class="fa fa-eye" aria-hidden="true"></i> View
                            </a>
                            <a href="{{ url('/print-pdf') }}">
                                <button type="button" class="btn btn-success">
                                    <i class="fa fa-print" aria-hidden="true"></i> Print
                                </button>
                            </a>
                            </td>
                        </tr>

                        <tr>
                            <td>1</td>
                            <td>April</td>
                            <td>120</td>
                            <td>20</td>
                            <td>Quiet Division</td>
                            <td>Tourist Police</td>

                            <td>3.5/5</td>
                            <td><button type="button" class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i>
                                View</button>
                                <button type="button" class="btn btn-success"><i class="fa fa-print" aria-hidden="true"></i>
                                    Print</button>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>April</td>
                            <td>120</td>
                            <td>20</td>
                            <td>Quiet Division</td>
                            <td>Tourist Police</td>

                            <td>3.5/5</td>
                            <td><button type="button" class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i>
                                View</button>
                                <button type="button" class="btn btn-success"><i class="fa fa-print" aria-hidden="true"></i>
                                    Print</button>
                            </td>
                        </tr>
                     </tbody>
                </table>
            </div>
        </div>
    </div>

 
@endsection

 