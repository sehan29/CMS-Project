@extends('layouts.subject')

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Over Due Complaints</h6>
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
                            <th>Resoled By</th>
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

                                @else
                                    <span class="badge bg-success">Resolved</span>
                                @endif
                            </td>
                            <td>{{ $complaint->division ?? 'Not Assigned' }}</td>
                            <td><span class="text-danger">{{ ($complaint->resolved_by) }}</span></td>
                            <td>
                                <a href="{{ url('compl/' .$complaint->id) }}" class="btn btn-sm btn-primary">
                                    <i class="fas fa-eye"></i>&nbsp;&nbsp;View
                                </a>
                                @if($complaint->isPending() or $complaint->isOverdue() )
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