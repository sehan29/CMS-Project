@extends('dashboard')

@section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">My Complaint</h4>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Ref No</th>
                                <th>Category</th>
                                <th>Date</th>
                                <th>Over Due Days</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($complaints as $complaint)
                                <tr>
                                    <td>{{ $complaint->id }}</td>
                                    <td>REF/123/456/23455</td>
                                    <td>{{ $complaint->category }}</td>
                                    <td>{{ $complaint->created_at->format('Y-m-d H:i') }}</td>
                                    <td>Over Due Dates Include Here</td>
                                    <td>@if($complaint->isPending())
                                        <span class="badge bg-warning text-white">Pending</span>
                                    @elseif($complaint->isAssigned())
                                        <span class="badge bg-info text-white">Assigned</span>
                                    @elseif($complaint->isOverdue())
                                        <span class="badge bg-danger text-white">Over Due</span>
                                    @elseif($complaint->isReconsideration())
                                        <span class="badge bg-danger text-white">Re Consideration</span>
                                    @else
                                        <span class="badge bg-success">Resolved</span>
                                    @endif</td>

                                    <td><a href="{{ route('complaints.show', $complaint->id) }}" class="btn btn-primary btn-sm text-white text-justify"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;View</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
