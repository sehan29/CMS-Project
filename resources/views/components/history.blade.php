@extends('dashboard')

@section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Complaint History</h4>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Category</th>
                                <th>Details</th>
                                <th>Date</th>
                                <th>Rating</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($complaints as $complaint)
                                <tr>
                                    <td>{{ $complaint->id }}</td>
                                    <td>{{ $complaint->category }}</td>
                                    <td>{{ $complaint->details }}</td>
                                    <td>{{ $complaint->created_at->format('Y-m-d H:i') }}</td>
                                    <td>@if ($complaint->rating)
                                        <span class="text-warning">⭐ {{ $complaint->rating }}/5</span>
                                    @else
                                        Not Rated
                                    @endif</td>

                                    <td><a href="{{ route('complaints.show', $complaint->id) }}" class="btn btn-info btn-sm">View</a></td>

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
