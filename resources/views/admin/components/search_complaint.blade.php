@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h4 class="m-0 font-weight-bold text-dark">Complaint Search</4>
        </div>
        <div class="card-body">
            <!-- Search Form -->
            <form method="GET" action="{{ route('admin.complaints.search') }}" class="mb-4">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="complaint_id">Complaint ID</label>
                            <input type="text" class="form-control" id="complaint_id" name="complaint_id" 
                                   value="{{ request('complaint_id') }}" placeholder="Search by Complaint Ref No">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="user_id">User ID</label>
                            <input type="text" class="form-control" id="user_id" name="user_id" 
                                   value="{{ request('user_id') }}" placeholder="Search by User ID">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status">
                                <option value="">All Statuses</option>
                                <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="in_progress" {{ request('status') == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                                <option value="resolved" {{ request('status') == 'resolved' ? 'selected' : '' }}>Resolved</option>
                                <option value="rejected" {{ request('status') == 'rejected' ? 'selected' : '' }}>Rejected</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="date_range">Date Range</label>
                            <select class="form-control" id="date_range" name="date_range">
                                <option value="">All Time</option>
                                <option value="today" {{ request('date_range') == 'today' ? 'selected' : '' }}>Today</option>
                                <option value="this_week" {{ request('date_range') == 'this_week' ? 'selected' : '' }}>This Week</option>
                                <option value="this_month" {{ request('date_range') == 'this_month' ? 'selected' : '' }}>This Month</option>
                                <option value="last_month" {{ request('date_range') == 'last_month' ? 'selected' : '' }}>Last Month</option>
                                <option value="custom">Custom Range</option>
                            </select>
                        </div>
                    </div>
                </div>
                
                <!-- Custom Date Range Fields (Hidden by Default) -->
                <div class="row mt-3" id="customDateRange" style="display: {{ request('date_range') == 'custom' ? 'block' : 'none' }};">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="from_date">From Date</label>
                            <input type="date" class="form-control" id="from_date" name="from_date" 
                                   value="{{ request('from_date') }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="to_date">To Date</label>
                            <input type="date" class="form-control" id="to_date" name="to_date" 
                                   value="{{ request('to_date') }}">
                        </div>
                    </div>
                </div>
                
                <div class="row mt-3">
                    <div class="col-md-12 text-right">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-search"></i> Search
                        </button>
                        <a href="{{ route('admin.complaints.search') }}" class="btn btn-secondary">
                            <i class="fas fa-sync-alt"></i> Reset
                        </a>
                    </div>
                </div>
            </form>

            <!-- Search Results -->
            @if(isset($complaints))
                <div class="table-responsive">
                    <table class="table table-bordered" id="complaintsTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>User</th>
                                <th>Subject</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($complaints as $complaint)
                            <tr>
                                <td>{{ $complaint->id }}</td>
                                <td>{{ $complaint->user->name }} (ID: {{ $complaint->user_id }})</td>
                                <td>{{ Str::limit($complaint->division, 50) }}</td>
                                <td>{{ $complaint->category }}</td>
                                <td>
                                    @php
                                        $statusText = [
                                            0 => 'Pending',
                                            1 => 'Assigned',
                                            2 => 'Resolved',
                                            4 => 'Over Due'
                                        ][$complaint->status] ?? 'Unknown';
                                        
                                        $badgeClass = [
                                            0 => 'badge-secondary',
                                            1 => 'badge-info',
                                            2 => 'badge-success',
                                            4 => 'badge-danger'
                                        ][$complaint->status] ?? 'badge-warning';
                                    @endphp
                                    
                                    <span class="badge {{ $badgeClass }}">
                                        {{ $statusText }}
                                    </span>
                                </td>
                                <td>{{ $complaint->created_at->format('Y-m-d H:i') }}</td>
                                <td>
                                    <a href="{{ route('admin.complaints.show', $complaint->id) }}" 
                                       class="btn btn-sm btn-info" title="View">
                                        <i class="fas fa-eye"></i>View
                                    </a>
                                    <a href="{{ route('admin.complaints.edit', $complaint->id) }}" 
                                       class="btn btn-sm btn-primary" title="Edit">
                                        <i class="fas fa-edit"></i>Edit
                                    </a>
                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">No complaints found matching your criteria.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                @if($complaints->hasPages())
                    <div class="d-flex justify-content-center mt-3">
                        {{ $complaints->withQueryString()->links() }}
                    </div>
                @endif
            @else
                <div class="alert alert-info">
                    Enter search criteria to find complaints.
                </div>
            @endif
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        // Show/hide custom date range fields
        $('#date_range').change(function() {
            if ($(this).val() === 'custom') {
                $('#customDateRange').show();
            } else {
                $('#customDateRange').hide();
            }
        });

        // Initialize DataTable if complaints exist
        @if(isset($complaints))
            $('#complaintsTable').DataTable({
                "paging": false,
                "searching": false,
                "info": false,
                "order": [[0, "desc"]]
            });
        @endif
    });
</script>
@endsection