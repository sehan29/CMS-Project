@extends('layouts.admin')

@section('content')
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Welcome to Dashboard</h4>
        </div>
        <div class="d-flex align-items-center flex-wrap text-nowrap">
            <div class="input-group date datepicker dashboard-date mr-2 mb-2 mb-md-0 d-md-none d-xl-flex" id="dashboardDate">
                <span class="input-group-addon bg-transparent"><i data-feather="calendar" class=" text-primary"></i></span>
                <input type="text" class="form-control">
            </div>
        </div>
    </div>

    <div class="row mx-1">
        <div class="col-12 col-xl-12 stretch-card">
            <div class="row flex-grow">
                
                <div class="col-md-3 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-baseline">
                                <h6 class="card-title mb-0">Number of Customers</h6>
                            </div>
                            <div class="row">
                                <div class="col-6 col-md-12 col-xl-5 mt-4">
                                    <h3 class="mb-2">3,897</h3>
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
                                <h6 class="card-title mb-0">Number of Sub-Officers</h6>
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
                                <h6 class="card-title mb-0">Not Take Action Complaints</h6>
                            </div>
                            <div class="row">
                                <div class="col-6 col-md-12 col-xl-5 mt-4">
                                    <h3 class="mb-2">89.87</h3>
                                     
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
                                <h6 class="card-title mb-0">Number of Over Due Complaints</h6>
                            </div>
                            <div class="row">
                                <div class="col-6 col-md-12 col-xl-5 mt-3">
                                    <h3 class="mb-2">89.87</h3>
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

    <div class="row mx-1">
        <div class="col-12 col-xl-12 stretch-card">
            <div class="row flex-grow">
                <div class="col-md-3 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-baseline">
                                <h6 class="card-title mb-0">Inprocess Complaints</h6>
                            </div>
                            <div class="row">
                                <div class="col-6 col-md-12 col-xl-5">
                                    <h3 class="mb-2">3,897</h3>
                                     
                                </div>
                                <div class="col-6 col-md-12 col-xl-7 d-flex justify-content-center align-items-center mt-4">
                                    <i class="fas fa-paper-plane fa-3x text-primary"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-baseline">
                                <h6 class="card-title mb-0">Closed Complaints</h6>
                            </div>
                            <div class="row">
                                <div class="col-6 col-md-12 col-xl-5 mt-4">
                                    <h3 class="mb-2">3584</h3>
                                     
                                </div>
                                <div class="col-6 col-md-12 col-xl-7 d-flex justify-content-center align-items-center mt-4">
                                    <i class="fas fa-lock fa-3x text-primary"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-baseline">
                                <h6 class="card-title mb-0">Not Assign Complaints</h6>
                            </div>
                            <div class="row">
                                <div class="col-6 col-md-12 col-xl-5">
                                    <h3 class="mb-2">89.87</h3>
                                     
                                </div>
                                <div class="col-6 col-md-12 col-xl-7 d-flex justify-content-center align-items-center mt-4">
                                    <i class="fas fa-clipboard fa-3x text-primary"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-baseline">
                                <h6 class="card-title mb-0">Number of Complaints</h6>
                            </div>
                            <div class="row">
                                <div class="col-6 col-md-12 col-xl-5">
                                    <h3 class="mb-2">89.87</h3>
                                    <div class="d-flex align-items-baseline">
                                    </div>
                                </div>
                                <div class="col-6 col-md-12 col-xl-7 d-flex justify-content-center align-items-center mt-4">
                                    <i class="fas fa-clipboard fa-3x text-primary"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mx-1">
        <div class="col-xl-7 grid-margin grid-margin-xl-0 stretch-card">
          <div class="card">
            <div class="card-body">
              <h6 class="card-title">Grouped bar chart</h6>
              <canvas id="chartjsGroupedBar"></canvas>
            </div>
          </div>
        </div>
       <div class="col-xl-5 stretch-card">
          <div class="card">
            <div class="card-body">
              <h6 class="card-title">Mixed bar chart</h6>
              <canvas id="chartjsDoughnut"></canvas>
            </div>
          </div>
        </div>
    </div>


    <div class="row mx-1">

        <div>
            <h4 class="m-4">Recently Make Complaints</h4>
        </div>
        
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title"></h6>
                    <div class="table-responsive pt-3">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Ref No</th>
                                    <th>Full Name</th>
                                    <th>Progress</th>
                                    <th>Country</th>
                                    <th>Date</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                               
                                <tr>
                                    <td>1</td>
                                    <td>Sonya Frost</td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </td>
                                    <td>Sri Lanaka</td>
                                    <td>July 18, 2021</td>
                                    <td> <button class="btn btn-primary"><i class="fas fa-eye"></i> View</button></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Sonya Frost</td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar" style="width: 55%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </td>
                                    <td>Sri Lanaka</td>
                                    <td>July 18, 2021</td>
                                    <td> <button class="btn btn-primary"><i class="fas fa-eye"></i> View</button></td>

                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Sonya Frost</td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar" style="width: 45%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </td>
                                    <td>Sri Lanaka</td>
                                    <td>July 18, 2021</td>
                                    <td> <button class="btn btn-primary"><i class="fas fa-eye"></i> View</button></td>

                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Sonya Frost</td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </td>
                                    <td>Sri Lanaka</td>
                                    <td>July 18, 2021</td>
                                    <td> <button class="btn btn-primary"><i class="fas fa-eye"></i> View</button></td>

                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Sonya Frost</td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar" style="width: 25%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </td>
                                    <td>Sri Lanaka</td>
                                    <td>July 18, 2021</td>
                                    <td> <button class="btn btn-primary"><i class="fas fa-eye"></i> View</button></td>

                                </tr>
                               
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="">

        <div>
            <h4 class="mb-4">Event Calendar</h4>
        </div>

        <div class="row">
            <div class="col-12 col-md-12">
                    <div id='external-events' class='external-events'></div>
                    <div class="col-12 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div id='fullcalendar'></div>
                            </div>
                        </div>
                    </div>
        
            </div>
        </div>

        <div id="fullCalModal" class="modal fade">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 id="modalTitle1" class="modal-title"></h4>
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                            <span class="sr-only">close</span></button>
                    </div>
                    <div id="modalBody1" class="modal-body"></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button class="btn btn-primary">Event Page</button>
                    </div>
                </div>
            </div>
        </div>

        <div id="createEventModal" class="modal fade">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 id="modalTitle2" class="modal-title">Add event</h4>
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                            <span class="sr-only">close</span></button>
                    </div>
                    <div id="modalBody2" class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="formGroupExampleInput">Example label</label>
                                <input type="text" class="form-control" id="formGroupExampleInput"
                                    placeholder="Example input">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Another label</label>
                                <input type="text" class="form-control" id="formGroupExampleInput2"
                                    placeholder="Another input">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button class="btn btn-primary">Add</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
