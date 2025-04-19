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
                <!-- Total Complaints Card -->
                <div class="col-md-3 grid-margin stretch-card">
                    <div class="card border-left-primary shadow-sm h-90">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <h6 class="card-title mb-0 text-muted text-uppercase fs-12 fw-semibold">Total Complaints</h6>
                                <div class="icon-shape icon-md bg-opacity-10 text-primary rounded-3">
                                    <i class="fas fa-clipboard-list fs-5"></i>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <h3 class="mb-0 fw-bold">{{ $totalComplaints ?? 0 }}</h3>
                                <div id="totalComplaintsChart" style="width: 80px; height: 60px;"></div>
                            </div>
                            {{-- <div class="mt-2">
                                <span class="text-success fw-semibold fs-12">
                                    <i class="fas fa-caret-up me-1"></i> 12.5%
                                </span>
                                <span class="text-muted ms-2 fs-12">vs last month</span>
                            </div> --}}
                        </div>
                    </div>
                </div>
                
                <!-- Pending Complaints Card -->
                <div class="col-md-3 grid-margin stretch-card">
                    <div class="card border-left-warning shadow-sm h-90">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <h6 class="card-title mb-0 text-muted text-uppercase fs-12 fw-semibold">Pending Complaints</h6>
                                <div class="icon-shape icon-md bg-opacity-10 text-primary rounded-3">
                                    <i class="fas fa-hourglass-half fs-5"></i>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <h3 class="mb-0 fw-bold">{{ $pendingComplaints ?? 0 }}</h3>
                                <div id="pendingComplaintsChart" style="width: 80px; height: 60px;"></div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                
                <!-- In Process Card -->
                <div class="col-md-3 grid-margin stretch-card">
                    <div class="card border-left-info shadow-sm h-90">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <h6 class="card-title mb-0 text-muted text-uppercase fs-12 fw-semibold">In Process</h6>
                                <div class="icon-shape icon-md  bg-opacity-10 text-primary rounded-3">
                                    <i class="fas fa-tasks fs-5"></i>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <h3 class="mb-0 fw-bold">{{ $inProcessComplaints ?? 0 }}</h3>
                                <div id="inProcessChart" style="width: 80px; height: 60px;"></div>
                            </div>
                            
                        </div>
                    </div>
                </div>
        
                <!-- Resolved Card -->
                <div class="col-md-3 grid-margin stretch-card">
                    <div class="card border-left-success shadow-sm h-90">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <h6 class="card-title mb-0 text-muted text-uppercase fs-12 fw-semibold">Resolved</h6>
                                <div class="icon-shape icon-md  bg-opacity-10 text-primary rounded-3">
                                    <i class="fas fa-check-circle fs-5"></i>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <h3 class="mb-0 fw-bold">{{ $resolvedComplaints ?? 0 }}</h3>
                                <div id="resolvedChart" style="width: 80px; height: 60px;"></div>
                            </div>
                             
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mx-1">
        <div class="col-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Event Calendar</h4>
                    <div id="calendar"></div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Event Modal -->
    <div class="modal fade" id="eventModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Event Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="eventForm">
                        @csrf
                        <input type="hidden" id="eventId">
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" class="form-control" id="title" required>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" id="description"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Start</label>
                            <input type="datetime-local" class="form-control" id="start" required>
                        </div>
                        <div class="form-group">
                            <label>End</label>
                            <input type="datetime-local" class="form-control" id="end" required>
                        </div>
                        <div class="form-group">
                            <label>Color</label>
                            <select class="form-control" id="color">
                                <option value="#007bff">Blue</option>
                                <option value="#28a745">Green</option>
                                <option value="#dc3545">Red</option>
                                <option value="#ffc107">Yellow</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" id="deleteBtn" style="display: none;">Delete</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="saveBtn">Save</button>
                </div>
            </div>
        </div>
    </div>
    
    @push('styles')
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.css" rel="stylesheet">
    <style>
        #calendar {
            height: 600px;
        }
        .fc-toolbar-title {
            font-size: 1.2rem !important;
        }
        .fc-button {
            padding: 0.3rem 0.6rem !important;
        }
    </style>
    @endpush
    
    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Set up CSRF token for AJAX
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    
        const calendarEl = document.getElementById('calendar');
        const calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            events: '/events',
            editable: true,
            selectable: true,
            eventColor: '#378006',
            eventTextColor: '#ffffff',
            dateClick: function(info) {
                $('#eventForm')[0].reset();
                $('#eventId').val('');
                $('#deleteBtn').hide();
                $('#start').val(info.dateStr + 'T00:00');
                $('#end').val(info.dateStr + 'T23:59');
                $('#eventModal').modal('show');
            },
            eventClick: function(info) {
                const event = info.event;
                $('#eventId').val(event.id);
                $('#title').val(event.title);
                $('#description').val(event.extendedProps.description || '');
                $('#start').val(event.start.toISOString().slice(0, 16));
                $('#end').val(event.end ? event.end.toISOString().slice(0, 16) : '');
                $('#color').val(event.backgroundColor || '#378006');
                $('#deleteBtn').show();
                $('#eventModal').modal('show');
            },
            eventDrop: function(info) {
                updateEvent(info.event);
            },
            eventResize: function(info) {
                updateEvent(info.event);
            }
        });
        
        calendar.render();
    
        $('#saveBtn').click(function() {
            const eventData = {
                title: $('#title').val(),
                description: $('#description').val(),
                start: $('#start').val(),
                end: $('#end').val(),
                color: $('#color').val()
            };
    
            const eventId = $('#eventId').val();
            const method = eventId ? 'PUT' : 'POST';
            const url = eventId ? `/events/${eventId}` : '/events';
    
            $.ajax({
                url: url,
                type: method,
                data: eventData,
                success: function() {
                    calendar.refetchEvents();
                    $('#eventModal').modal('hide');
                },
                error: function(xhr) {
                    console.error(xhr.responseJSON);
                    alert('Error saving event. Check console for details.');
                }
            });
        });
    
        $('#deleteBtn').click(function() {
            if (confirm('Are you sure you want to delete this event?')) {
                const eventId = $('#eventId').val();
                $.ajax({
                    url: `/events/${eventId}`,
                    type: 'DELETE',
                    success: function() {
                        calendar.refetchEvents();
                        $('#eventModal').modal('hide');
                    },
                    error: function(xhr) {
                        alert('Error deleting event');
                    }
                });
            }
        });
    
        function updateEvent(event) {
            $.ajax({
                url: `/events/${event.id}`,
                type: 'PUT',
                data: {
                    title: event.title,
                    start: event.start.toISOString(),
                    end: event.end ? event.end.toISOString() : null,
                    color: event.backgroundColor
                },
                error: function(xhr) {
                    alert('Error updating event');
                    calendar.refetchEvents();
                }
            });
        }
    });
    </script>
    @endpush
@endsection
