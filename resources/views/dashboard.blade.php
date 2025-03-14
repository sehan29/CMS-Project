@extends('layouts.app')

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
                                <h6 class="card-title mb-0">Inprocess Complaints</h6>
                            </div>
                            <div class="row">
                                <div class="col-6 col-md-12 col-xl-5">
                                    <h3 class="mb-2">3,897</h3>
                                     
                                </div>
                                <div class="col-6 col-md-12 col-xl-7">
                                    <div id="apexChart1" class="mt-md-3 mt-xl-0"></div>
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
                                <div class="col-6 col-md-12 col-xl-5">
                                    <h3 class="mb-2">35,084</h3>
                                     
                                </div>
                                <div class="col-6 col-md-12 col-xl-7">
                                    <div id="apexChart2" class="mt-md-3 mt-xl-0"></div>
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
                                <div class="col-6 col-md-12 col-xl-5">
                                    <h3 class="mb-2">89.87</h3>
                                     
                                </div>
                                <div class="col-6 col-md-12 col-xl-7">
                                    <div id="apexChart3" class="mt-md-3 mt-xl-0"></div>
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
                                <div class="col-6 col-md-12 col-xl-5">
                                    <h3 class="mb-2">89.87</h3>
                                    <div class="d-flex align-items-baseline">
                                    </div>
                                </div>
                                <div class="col-6 col-md-12 col-xl-7">
                                    <div id="apexChart2" class="mt-md-3 mt-xl-0"></div>
                                </div>
                            </div>
                        </div>
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
