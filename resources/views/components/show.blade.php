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

                <a href="{{ route('history.index') }}" class="btn btn-secondary mt-3">Back to History</a>
            </div>
        </div>
    </div>
</div>
@endsection
