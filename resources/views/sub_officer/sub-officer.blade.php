@extends('layouts.subject')

@section('content')
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div d-flex justify-content-between align-items-center>
            <h4 class="mb-3 mb-md-0">Welcome to Dashboard</h4>
            <h4>{{ Auth::user()->section }} Division</h4>
        </div>
    </div>

   {{--  <div class="row mx-1">
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
                                    <h3 class="mb-2">{{ $totalCustomers }}</h3>
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
                                    <h3 class="mb-2">{{ $subOfficers }}</h3>
                                     
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
                                    <h3 class="mb-2">{{ $notActionedComplaints }}</h3>
                                     
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
                                    <h3 class="mb-2">{{ $overdueComplaints }}</h3>
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
 --}}
   {{--  <div class="row mx-1">
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
                                    <h3 class="mb-2">{{ $inProcessComplaints }}</h3>
                                     
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
                                    <h3 class="mb-2">{{ $closedComplaints }}</h3>
                                     
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
                                    <h3 class="mb-2">{{ $notAssignedComplaints }}</h3>
                                     
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
                                <h6 class="card-title mb-0">Total Complaints</h6>
                            </div>
                            <div class="row">
                                <div class="col-6 col-md-12 col-xl-5">
                                    <h3 class="mb-2">{{ $totalComplaints }}</h3>
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
 --}}
{{--     <div class="row mx-1">
        <div class="col-xl-7 grid-margin grid-margin-xl-0 stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Complaints in Last 5 Days</h6>
                    <canvas id="complaintsChart"></canvas>
                </div>
            </div>
        </div>
        
        @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const ctx = document.getElementById('complaintsChart').getContext('2d');
                const chartData = @json($chartData);
                
                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: chartData.dates,
                        datasets: [
                            {
                                label: 'Pending/Not Assigned',
                                data: chartData.pending,
                                backgroundColor: '#ffc107', // Yellow
                                borderColor: '#ffc107',
                                borderWidth: 1
                            },
                            {
                                label: 'In Progress',
                                data: chartData.inProgress,
                                backgroundColor: '#17a2b8', // Teal
                                borderColor: '#17a2b8',
                                borderWidth: 1
                            },
                            {
                                label: 'Closed',
                                data: chartData.closed,
                                backgroundColor: '#28a745', // Green
                                borderColor: '#28a745',
                                borderWidth: 1
                            }
                        ]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            x: {
                                stacked: false,
                                grid: {
                                    display: false
                                }
                            },
                            y: {
                                stacked: false,
                                beginAtZero: true,
                                ticks: {
                                    stepSize: 1
                                }
                            }
                        },
                        plugins: {
                            legend: {
                                position: 'top',
                            },
                            tooltip: {
                                callbacks: {
                                    label: function(context) {
                                        return `${context.dataset.label}: ${context.raw}`;
                                    }
                                }
                            }
                        }
                    }
                });
            });
        </script>
        @endpush
        
       <div class="col-xl-5 stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Division-wise Complaints ({{ $currentYear }})</h6>
                <div style="height: 300px;"> <!-- Fixed height container -->
                    <canvas id="divisionContributionChart"></canvas>
                </div>
            </div>
        </div>
        
        @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('divisionContributionChart').getContext('2d');
            const divisions = @json($divisionStats);
            
            const divisionNames = divisions.map(d => d.division);
            const complaintCounts = divisions.map(d => d.total);
            
            // Generate distinct colors for each division
            const backgroundColors = [];
            for(let i = 0; i < divisionNames.length; i++) {
                const hue = Math.floor(i * 360 / divisionNames.length);
                backgroundColors.push(`hsl(${hue}, 70%, 60%)`);
            }
        
            new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: divisionNames,
                    datasets: [{
                        data: complaintCounts,
                        backgroundColor: backgroundColors,
                        borderColor: '#fff',
                        borderWidth: 2,
                        hoverOffset: 10
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'right',
                            labels: {
                                boxWidth: 12,
                                padding: 20
                            }
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                    const percentage = Math.round((context.raw / total) * 100);
                                    return `${context.label}: ${context.raw} (${percentage}%)`;
                                }
                            }
                        }
                    },
                    cutout: '65%'
                }
            });
        });
        </script>
        @endpush
        </div>
    </div> --}}

  {{--   <div class="row mx-1">
        <div>
            <h4 class="m-4">Recently Made Complaints</h4>
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
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($recentComplaints as $complaint)
                                <tr>
                                    <td>{{ $complaint->id }}</td>
                                    <td>{{ $complaint->user->name }}</td>
                                    <td>
                                        @php
                                            // Calculate progress based on status
                                            $progress = 0;
                                            if($complaint->isResolved()) {
                                                $progress = 100;
                                            } elseif($complaint->isAssigned()) {
                                                $progress = 65;
                                            } elseif($complaint->isPending()) {
                                                $progress = 25;
                                            } elseif($complaint->isReconsideration()) {
                                                $progress = 45;
                                            } elseif($complaint->isOverdue()) {
                                                $progress = 85;
                                            }
                                        @endphp
                                        <div class="progress" style="height: 25px; position: relative;">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" 
                                                 role="progressbar" 
                                                 style="width: {{ $progress }}%" 
                                                 aria-valuenow="{{ $progress }}" 
                                                 aria-valuemin="0" 
                                                 aria-valuemax="100">
                                                 <span style="position: absolute; left: 50%; transform: translateX(-50%); color: #000; font-weight: bold;">
                                                     {{ $progress }}%
                                                 </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge badge-{{ $complaint->status_badge_color }}">
                                            {{ $complaint->status_text }}
                                        </span>
                                    </td>
                                    <td>{{ $complaint->created_at->format('M d, Y') }}</td>
                                    <td>
                                        <a href="{{ route('complaints.show', $complaint->id) }}" class="btn btn-primary">
                                            <i class="fas fa-eye"></i> View
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

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
