@extends('dashboard')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Complaint Details</h4>

                <p><strong>Category:</strong> {{ $complaint->category }}</p>
                <p><strong>Details:</strong> {{ $complaint->details }}</p>
                <p><strong>Date:</strong> {{ $complaint->created_at->format('Y-m-d H:i') }}</p>

                <h5>Attachments:</h5>
                @if ($complaint->documents->count() > 0)
                    <div class="row">
                        @foreach ($complaint->documents as $document)
                            <div class="col-md-4">
                                <div class="card">
                                    <img src="{{ asset('storage/' . $document->file_path) }}" class="card-img-top img-fluid" alt="Attachment">
                                    <div class="card-body text-center">
                                        <a href="{{ asset('storage/' . $document->file_path) }}" target="_blank" class="btn btn-primary btn-sm">
                                            View Full Image
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p>No attachments available.</p>
                @endif

                <h5 class="mt-4">Current Rating: 
                    @if ($complaint->rating)
                        <span class="text-warning">⭐ {{ $complaint->rating }}/5</span>
                    @else
                        Not Rated
                    @endif
                </h5>

                {{-- <form action="{{ route('complaints.rate', $complaint->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="rating">Select Rating:</label>
                        <select name="rating" id="rating" class="form-control w-25">
                            <option value="1">⭐ 1</option>
                            <option value="2">⭐⭐ 2</option>
                            <option value="3">⭐⭐⭐ 3</option>
                            <option value="4">⭐⭐⭐⭐ 4</option>
                            <option value="5">⭐⭐⭐⭐⭐ 5</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success mt-2">Submit Rating</button>
                </form> --}}

                @if(is_null($complaint->rating)) 
                <h5 class="mt-3">Rate This Complaint</h5>
                <form action="{{ route('complaints.rate', $complaint->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="rating">Select Rating:</label>
                        <select name="rating" id="rating" class="form-control w-25">
                            <option value="1">⭐ 1</option>
                            <option value="2">⭐⭐ 2</option>
                            <option value="3">⭐⭐⭐ 3</option>
                            <option value="4">⭐⭐⭐⭐ 4</option>
                            <option value="5">⭐⭐⭐⭐⭐ 5</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success mt-2">Submit Rating</button>
                </form>
                @else
                    <p class="text-success mt-3"><strong>You have already rated this complaint.</strong></p>
                @endif

                <a href="{{ route('history.index') }}" class="btn btn-secondary mt-3">Back to History</a>
            </div>
        </div>
    </div>
</div>
@endsection
