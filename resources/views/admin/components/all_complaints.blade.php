@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">All Complaints</h6>
            <div class="dropdown">
                <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" id="filterDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-filter"></i> Filter
                </button>
                <ul class="dropdown-menu" aria-labelledby="filterDropdown">
                    <li><a class="dropdown-item" href="?status=all">All Complaints</a></li>
                    <li><a class="dropdown-item" href="?status=pending">Pending</a></li>
                    <li><a class="dropdown-item" href="?status=assigned">Assigned</a></li>
                    <li><a class="dropdown-item" href="?status=resolved">Resolved</a></li>
                </ul>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Ref No</th>
                            <th>Complainant</th>
                            <th>Category</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Division</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($complaints as $complaint)
                        <tr>
                            <td>COMP-{{ $complaint->id }}</td>
                            <td>{{ $complaint->user->name }}</td>
                            <td>{{ $complaint->category }}</td>
                            <td>{{ $complaint->created_at->format('Y-m-d') }}</td>
                            <td>
                                @if($complaint->isPending())
                                    <span class="badge bg-warning text-white">Pending</span>
                                @elseif($complaint->isAssigned())
                                    <span class="badge bg-info text-white">Assigned</span>
                                @elseif($complaint->isOverdue())
                                    <span class="badge bg-danger text-white">Over Due</span>
                                @elseif($complaint->isReconsideration())
                                    <span class="badge bg-danger text-white">Re Consideration</span>
                                @else
                                    <span class="badge bg-success">Resolved</span>
                                @endif
                            </td>
                            <td>{{ $complaint->division ?? 'Not Assigned' }}</td>
                            <td>
                                <a href="{{ url('compl/' .$complaint->id) }}" class="btn btn-sm btn-primary">
                                    <i class="fas fa-eye"></i>&nbsp;&nbsp;View
                                </a>
                                @if($complaint->isPending())
                                    <button class="btn btn-sm btn-success assign-btn" 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#assignModal{{ $complaint->id }}">
                                        <i class="fas fa-paper-plane"></i>&nbsp;&nbsp;Action
                                    </button>
                                @elseif($complaint->isOverdue())
                                    <button class="btn btn-sm btn-success assign-btn" 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#assignModal{{ $complaint->id }}">
                                        <i class="fas fa-paper-plane"></i>&nbsp;&nbsp;Action
                                    </button>

                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Assign Modals -->
@foreach($complaints as $complaint)
@if($complaint->isPending() ||$complaint->isOverdue())
<div class="modal fade" id="assignModal{{ $complaint->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Assign Complaint #COMP-{{ $complaint->id }}</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.complaints.assign', $complaint) }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Division</label>
                        <select class="form-control" name="division" required>
                            <option value="">Select Division</option>
                            <option value="Tourist Police">Tourist Police</option>
                            <option value="Immigration">Immigration</option>
                            <option value="Customs">Customs</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Priority</label>
                        <select class="form-control" name="priority" required>
                            <option value="low">Low</option>
                            <option value="medium" selected>Medium</option>
                            <option value="high">High</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Assign</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endif
@endforeach
@endsection

@section('scripts')
<script>
    // Initialize DataTable
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });

 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

 <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" />

 <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
</script>
@endsection