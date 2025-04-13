@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Edit Complaint #{{ $complaint->id }}</h6>
            <span class="badge 
                @if($complaint->status == 'pending') badge-secondary
                @elseif($complaint->status == 'in_progress') badge-primary
                @elseif($complaint->status == 'resolved') badge-success
                @else badge-danger
                @endif">
                {{ ucfirst(str_replace('_', ' ', $complaint->status)) }}
            </span>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.complaints.update', $complaint->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" id="status" name="status" required>
                        <option value="pending" {{ $complaint->status == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="in_progress" {{ $complaint->status == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                        <option value="resolved" {{ $complaint->status == 'resolved' ? 'selected' : '' }}>Resolved</option>
                        <option value="rejected" {{ $complaint->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="admin_notes">Admin Notes</label>
                    <textarea class="form-control" id="admin_notes" name="admin_notes" rows="5">{{ old('admin_notes', $complaint->admin_notes) }}</textarea>
                </div>
                
                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Update Complaint
                    </button>
                    <a href="{{ route('admin.complaints.search') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection