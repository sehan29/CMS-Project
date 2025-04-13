@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Complaint Details #{{ $complaint->id }}</h6>
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
         </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h5>Complaint Information</h5>
                    <table class="table table-bordered">
                        <tr>
                            <th>ID</th>
                            <td>{{ $complaint->id }}</td>
                        </tr>
                        <tr>
                            <th>User</th>
                            <td>{{ $complaint->user->name }} (ID: {{ $complaint->user_id }})</td>
                        </tr>
                        <tr>
                            <th>Category</th>
                            <td>{{ $complaint->category }}</td>
                        </tr>
                        <tr>
                            <th>Subject</th>
                            <td>{{ $complaint->division }}</td>
                        </tr>
                        <tr>
                            <th>Date</th>
                            <td>{{ $complaint->created_at->format('Y-m-d H:i') }}</td>
                        </tr>
                    </table>
                    
                    <h5 class="mt-4">Description</h5>
                    <div class="border p-3">
                        {!! nl2br(e($complaint->description)) !!}
                    </div>
                </div>
                
                <div class="col-md-6">
                    <h5>Admin Section</h5>
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
                            <textarea class="form-control" id="admin_notes" name="admin_notes" rows="5">{{ old('admin_notes', $complaint->notes) }}</textarea>
                        </div>
                        
                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Update Complaint
                            </button>
                            <a href="{{ route('admin.complaints.search') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Back to Search
                            </a>
                        </div>
                    </form>
                    
                    @if($complaint->attachments && count($complaint->attachments) > 0)
                        <h5 class="mt-4">Attachments</h5>
                        <div class="row">
                            @foreach($complaint->attachments as $attachment)
                                <div class="col-md-4 mb-3">
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <i class="fas fa-file-alt fa-3x mb-2"></i>
                                            <p class="mb-1">{{ Str::limit(basename($attachment), 20) }}</p>
                                            <a href="{{ asset('storage/' . $attachment) }}" target="_blank" class="btn btn-sm btn-primary">
                                                <i class="fas fa-download"></i> Download
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection