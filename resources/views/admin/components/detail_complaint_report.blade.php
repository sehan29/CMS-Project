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
                                <h6 class="card-title mb-0">Tourist Police</h6>
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
                                <h6 class="card-title mb-0">Tourist Police</h6>
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
                                <h6 class="card-title mb-0">Tourist Police</h6>
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
        <div class="card-header pt-4 d-flex justify-content-between align-items-center">
            <h5 class="m-0 font-weight-bold text-dark">Overall Complaints Summary</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Month Name</th>
                            <th>Total Complaint</th>
                            <th>Closed Complaint</th>
                            <th>Not Assign Complaint</th>
                            <th>In Prograss Complaint</th>
                            <th>Average Rating</th>
                            <th>New Users</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>April</td>
                            <td>120</td>
                            <td>20</td>
                            <td>30</td>
                            <td>3.5/5</td>
                            <td>5/5</td>
                            <td>10</td>

                        </tr>                        
                     </tbody>
                </table>
            </div>
        </div>

        <div class="card-header pt-4 d-flex justify-content-between align-items-center">
            <h5 class="m-0 font-weight-bold text-dark">Complaints Summary</h5>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="fw-bold">Ref No</th>
                            <th class="fw-bold">Date</th>
                            <th class="fw-bold">Customer Name</th>
                            <th class="fw-bold">Passport No/NIC</th>
                            <th class="fw-bold">Contact No</th>
                            <th class="fw-bold">Status</th>
                            <th class="fw-bold">Assigned Division</th>
                            <th class="fw-bold">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>CUS 123455</td>
                            <td>12-April-2025
                            <td>Jhon Jhon</td>
                            <td>2009999291292</td>
                            <td>1234567890</td>
                            <td><span class="badge bg-warning text-white">In Progress</span></td>
                            <td>Tourist Police</td>
                            <td><button type="button" class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;View</button></td>
                        </tr>  
                        <tr>
                            <td>CUS 123455</td>
                            <td>12-April-2025
                            <td>Jhon Jhon</td>
                            <td>2009999291292</td>
                            <td>1234567890</td>
                            <td><span class="badge bg-warning text-white">In Progress</span></td>
                            <td>Tourist Police</td>
                            <td><button type="button" class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;View</button></td>
                        </tr> 
                        <tr>
                            <td>CUS 123455</td>
                            <td>12-April-2025
                            <td>Jhon Jhon</td>
                            <td>2009999291292</td>
                            <td>1234567890</td>
                            <td><span class="badge bg-warning text-white">In Progress</span></td>
                            <td>Tourist Police</td>
                            <td><button type="button" class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;View</button></td>
                        </tr> 
                        <tr>
                            <td>CUS 123455</td>
                            <td>12-April-2025
                            <td>Jhon Jhon</td>
                            <td>2009999291292</td>
                            <td>1234567890</td>
                            <td><span class="badge bg-warning text-white">In Progress</span></td>
                            <td>Tourist Police</td>
                            <td><button type="button" class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;View</button></td>
                        </tr> 
                        <tr>
                            <td>CUS 123455</td>
                            <td>12-April-2025
                            <td>Jhon Jhon</td>
                            <td>2009999291292</td>
                            <td>1234567890</td>
                            <td><span class="badge bg-warning text-white">In Progress</span></td>
                            <td>Tourist Police</td>
                            <td><button type="button" class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;View</button></td>
                        </tr> 
                        <tr>
                            <td>CUS 123455</td>
                            <td>12-April-2025
                            <td>Jhon Jhon</td>
                            <td>2009999291292</td>
                            <td>1234567890</td>
                            <td><span class="badge bg-warning text-white">In Progress</span></td>
                            <td>Tourist Police</td>
                            <td><button type="button" class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;View</button></td>
                        </tr> 
                        <tr>
                            <td>CUS 123455</td>
                            <td>12-April-2025
                            <td>Jhon Jhon</td>
                            <td>2009999291292</td>
                            <td>1234567890</td>
                            <td><span class="badge bg-warning text-white">In Progress</span></td>
                            <td>Tourist Police</td>
                            <td><button type="button" class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;View</button></td>
                        </tr> 
                        <tr>
                            <td>CUS 123455</td>
                            <td>12-April-2025
                            <td>Jhon Jhon</td>
                            <td>2009999291292</td>
                            <td>1234567890</td>
                            <td><span class="badge bg-warning text-white">In Progress</span></td>
                            <td>Tourist Police</td>
                            <td><button type="button" class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;View</button></td>
                        </tr> 
                        <tr>
                            <td>CUS 123455</td>
                            <td>12-April-2025
                            <td>Jhon Jhon</td>
                            <td>2009999291292</td>
                            <td>1234567890</td>
                            <td><span class="badge bg-warning text-white">In Progress</span></td>
                            <td>Tourist Police</td>
                            <td><button type="button" class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;View</button></td>
                        </tr>                       
                     </tbody>
                </table>
            </div>
        </div>

        <div class="row mx-1">
            <!-- First Column: Grouped Bar Chart -->
            <div class="col-xl-6 grid-margin grid-margin-xl-0 stretch-card">
                <div class="">
                    <div class="card-body">
                        <h6 class="card-title">Month Prograss Summary</h6>
                        <canvas id="chartjsGroupedBar" style="height: 400px; width: 100%;"></canvas>
                    </div>
                </div>
            </div>
        
            <!-- Second Column: Mixed Bar Chart -->
            <div class="col-xl-6 stretch-card">
                <div class="">
                    <div class="card-body">
                        <h6 class="card-title">Month Division Summary</h6>
                        <canvas id="chartjsDoughnut" style="height: 400px; width: 100%;"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-5 ml-4 mb-4">

            <p class="mb-3">"This report is related to the current month, providing an overview of all the relevant activities, statistics, and data gathered during this period."</p>
            <button type="button" class="btn btn-primary"><i class="fa fa-download" aria-hidden="true"></i>&nbsp;Generate Report</button>

        </div>
        
    </div>

 
 
@endsection

 