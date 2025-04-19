@extends('layouts.admin')

@section('content')

@section('content')
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Complaint Reports</h4>
        </div>
    </div>

{{--     @php
    $monthName = \Carbon\Carbon::now()->format('F');
    @endphp

    <div class="row">
        <div class="col-12 col-xl-12 stretch-card">
            <div class="row flex-grow">
                
                <div class="col-md-3 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-baseline">
                                <h6 class="card-title mb-0">{{ $monthName }} Total Complaint</h6>
                            </div>
                            <div class="row">
                                <div class="col-6 col-md-12 col-xl-5 mt-4">
                                    <h3 class="mb-2">{{ $totalComplaint }}</h3>
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
                                <h6 class="card-title mb-0">{{ $monthName }} Not Assign Complaint</h6>
                            </div>
                            <div class="row">
                                <div class="col-6 col-md-12 col-xl-5 mt-4">
                                    <h3 class="mb-2">{{ $notAssigned }}</h3>
                                     
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
                                <h6 class="card-title mb-0">{{ $monthName }} Inprograss Complaint</h6>
                            </div>
                            <div class="row">
                                <div class="col-6 col-md-12 col-xl-5 mt-4">
                                    <h3 class="mb-2">{{ $inProgress }}</h3>
                                     
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
                                <h6 class="card-title mb-0">{{ $monthName }} Closed Complaint</h6>
                            </div>
                            <div class="row">
                                <div class="col-6 col-md-12 col-xl-5 mt-3">
                                    <h3 class="mb-2">{{ $closed }}</h3>
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
    </div> --}}


    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h5 class="m-0 font-weight-bold text-dark">Current Month Statistics</h5>
        </div>
        <div class="card-body">
            {{-- <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="card text-white bg-primary mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Total Complaints</h5>
                            <p class="card-text display-4">{{ $stats['total'] }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-sm-6">
                    <div class="card text-white bg-warning mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Not Assigned</h5>
                            <p class="card-text display-4">{{ $stats['not_assigned'] }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-sm-6">
                    <div class="card text-white bg-info mb-3">
                        <div class="card-body">
                            <h5 class="card-title">In Progress</h5>
                            <p class="card-text display-4">{{ $stats['in_progress'] }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-sm-6">
                    <div class="card text-white bg-success mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Closed</h5>
                            <p class="card-text display-4">{{ $stats['closed'] }}</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="card text-white bg-danger mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Re-Consideration</h5>
                            <p class="card-text display-4">{{ $stats['reconsider'] }}</p>
                        </div>
                    </div>
                </div>

            </div> --}}

            <div class="row g-3 mb-4">
                <!-- Card Template -->
                @php
                    $cards = [
                        ['title' => 'Total Complaints', 'value' => $stats['total'], 'color' => 'primary', 'icon' => 'fas fa-clipboard-list', 'note' => '<i class="fas fa-arrow-up"></i> 12.5% vs last month'],
                        ['title' => 'Not Assigned', 'value' => $stats['not_assigned'], 'color' => 'warning', 'icon' => 'fas fa-exclamation-circle', 'progress' => ($stats['not_assigned']/$stats['total'])*100],
                        ['title' => 'In Progress', 'value' => $stats['in_progress'], 'color' => 'info', 'icon' => 'fas fa-spinner', 'progress' => ($stats['in_progress']/$stats['total'])*100],
                        ['title' => 'Closed', 'value' => $stats['closed'], 'color' => 'success', 'icon' => 'fas fa-check-circle', 'progress' => ($stats['closed']/$stats['total'])*100],
                        ['title' => 'Reconsideration', 'value' => $stats['reconsider'], 'color' => 'danger', 'icon' => 'fas fa-redo', 'note' => '<i class="fas fa-arrow-up"></i> '.round(($stats['reconsider']/$stats['total'])*100, 1).' % of total'],
                        ['title' => 'Resolution Rate', 'value' => round(($stats['closed']/$stats['total'])*100, 1).'%', 'color' => 'purple', 'icon' => 'fas fa-chart-line']
                    ];
                @endphp
            
                @foreach($cards as $card)
                <div class="col-xl-2 col-lg-4 col-md-4 col-sm-6">
                    <div class="card statistic-card bg-{{ $card['color'] }}-light border-start border-4 border-{{ $card['color'] }} hover-scale">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1">
                                    <h6 class="text-muted mb-2">{{ $card['title'] }}</h6>
                                    <h2 class="mb-0 counter">{{ $card['value'] }}</h2>
                                    @if(isset($card['note']))
                                        <small class="text-muted">{!! $card['note'] !!}</small>
                                    @elseif(isset($card['progress']))
                                        <div class="progress mt-2" style="height: 4px;">
                                            <div class="progress-bar bg-{{ $card['color'] }}" role="progressbar" style="width: {{ $card['progress'] }}%;"></div>
                                        </div>
                                    @endif
                                </div>
                                <div class="avatar-sm flex-shrink-0">
                                    <span class="avatar-title bg-{{ $card['color'] }}-subtle rounded-3 fs-4">
                                        <i class="{{ $card['icon'] }} text-{{ $card['color'] }}"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
            <style>
                .statistic-card {
                    transition: all 0.3s ease;
                    border-radius: 0.75rem;
                    height: 170px; /* Fixed height */
                    padding: 1.25rem;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
                }
            
                .hover-scale:hover {
                    transform: translateY(-4px);
                    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
                }
            
                .counter {
                    font-size: 1.75rem;
                    font-weight: 700;
                }
            
                /* Custom color definitions */
                .bg-purple-light {
                    background-color: #f4f1fa !important;
                }
                .border-purple {
                    border-color: #6c5ffc !important;
                }
                .bg-purple-subtle {
                    background-color: rgba(108, 95, 252, 0.15) !important;
                }
                .text-purple {
                    color: #6c5ffc !important;
                }
            
                /* Light background alternatives for a clean look */
                .bg-primary-light { background-color: #eef4ff !important; }
                .bg-warning-light { background-color: #fff8e6 !important; }
                .bg-info-light { background-color: #e6f7fc !important; }
                .bg-success-light { background-color: #eaf9f0 !important; }
                .bg-danger-light { background-color: #fdecea !important; }
            
                /* Subtle avatar backgrounds */
                .bg-primary-subtle { background-color: rgba(13, 110, 253, 0.1) !important; }
                .bg-warning-subtle { background-color: rgba(255, 193, 7, 0.1) !important; }
                .bg-info-subtle { background-color: rgba(13, 202, 240, 0.1) !important; }
                .bg-success-subtle { background-color: rgba(25, 135, 84, 0.1) !important; }
                .bg-danger-subtle { background-color: rgba(220, 53, 69, 0.1) !important; }
            
                .text-primary { color: #0d6efd !important; }
                .text-warning { color: #ffc107 !important; }
                .text-info { color: #0dcaf0 !important; }
                .text-success { color: #198754 !important; }
                .text-danger { color: #dc3545 !important; }
            </style>
            
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    const counters = document.querySelectorAll('.counter');
                    const speed = 200;
            
                    counters.forEach(counter => {
                        const animate = () => {
                            const target = +counter.getAttribute('data-target') || parseFloat(counter.innerText);
                            const count = +counter.innerText;
                            const increment = target / speed;
            
                            if (count < target) {
                                counter.innerText = Math.ceil(count + increment);
                                setTimeout(animate, 10);
                            } else {
                                counter.innerText = target.toString();
                            }
                        }
            
                        if (!counter.innerText.includes('%')) {
                            counter.setAttribute('data-target', counter.innerText);
                            counter.innerText = '0';
                            animate();
                        }
                    });
            
                    if (typeof $.fn.sparkline !== 'undefined') {
                        $('.sparkline').each(function () {
                            $(this).sparkline('html', $(this).data());
                        });
                    }
                });
            </script>
            
        </div>
    </div>
    
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h5 class="m-0 font-weight-bold text-dark">Monthly Complaints Reports</h5>
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
                        @foreach($reports as $report)
                            <tr>
                                <td>{{ $report['no'] }}</td>
                                <td>{{ $report['month'] }}</td>
                                <td>{{ $report['total_complaints'] }}</td>
                                <td>{{ $report['closed_complaints'] }}</td>
                                <td>{{ $report['quiet_division'] }}</td>
                                <td>{{ $report['major_division'] }}</td>
                                <td>{{ $report['average_rating'] }}</td>
                                <td>
                                    <a href="{{ route('details_complaint_report.report', str_replace(' ', '-', $report['month'])) }}"                                     class="btn btn-primary">
                                        <i class="fa fa-eye" aria-hidden="true"></i> View
                                    </a>

                                   {{--  <a href="{{ route('print.complaint', ['id' => $complaint->id]) }}" 
                                       class="btn btn-success">
                                        <i class="fa fa-print" aria-hidden="true"></i> Print
                                    </a> --}}

                                    <a href="print-monthly-report/{{ str_replace(' ', '-', $report['month']) }}" 
                                        class="btn btn-success">
                                         <i class="fa fa-print" aria-hidden="true"></i> Print Report
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

 
@endsection

 