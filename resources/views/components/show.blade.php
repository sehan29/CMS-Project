@extends('dashboard')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Complaint Details</h3>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Referance Number</th>
                                <th scope="col">Category</th>
                                <th scope="col">Details</th>
                                <th scope="col">Date</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>REF/2025/22</th>
                                <td>{{ $complaint->category }}</td>
                                <td>{{ $complaint->details }}</td>
                                <td>{{ $complaint->created_at->format('Y-m-d H:i') }}</td>
                                <td>Complete</td>
                            </tr>
                        </tbody>
                    </table>

                    {{-- <p><strong>Referance Number :</strong> REF/2025/22</p>
                    <p><strong>Category :</strong> {{ $complaint->category }}</p>
                    <p><strong>Details :</strong> {{ $complaint->details }}</p>
                    <p><strong>Date :</strong> {{ $complaint->created_at->format('Y-m-d H:i') }}</p> --}}

                    <h5 class="mt-4 mb-4">Attachments</h5>
                    @if ($complaint->documents->count() > 0)
                        <div class="row">
                            @foreach ($complaint->documents as $document)
                                <div class="col-md-3 mb-3">
                                    <div class="border">
                                        <img src="{{ asset('storage/' . $document->file_path) }}" class="card-img-top"
                                            alt="Attachment" width="200px" height="240px" style="object-fit: contain; width:100% height:100%">
                                        <div class="card-body text-center">
                                            <a href="{{ asset('storage/' . $document->file_path) }}" target="_blank"
                                                class="btn btn-primary btn-sm"><i class="fa fa-arrows-alt"
                                                    aria-hidden="true"></i>

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

                    <h5 class="mt-4">Current Rating -
                        @if ($complaint->rating)
                            <span class="text-warning">⭐ {{ $complaint->rating }}/5</span>
                        @else
                            Not Rated
                        @endif
                    </h5>

                    @if (is_null($complaint->rating))
                        <h5 class="mt-3 mb-2">Rate This Complaint</h5>
                        {{-- <form action="{{ route('complaints.rate', $complaint->id) }}" method="POST">
                            @csrf
                            <div class="form-group">
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
                        <form action="{{ route('complaints.rate', $complaint->id) }}" method="POST">
                            @csrf
                            <div class="d-flex align-items-center gap-2">
                                <select name="rating" id="rating" class="form-control w-auto mr-4">
                                    <option value="1">⭐ 1</option>
                                    <option value="2">⭐⭐ 2</option>
                                    <option value="3">⭐⭐⭐ 3</option>
                                    <option value="4">⭐⭐⭐⭐ 4</option>
                                    <option value="5">⭐⭐⭐⭐⭐ 5</option>
                                </select>
                                <button type="submit" class="btn btn-success">Submit Rating</button>
                            </div>
                        </form>
                    @else
                        <p class="text-success mt-3"><strong>You have already rated this complaint.</strong></p>
                    @endif


                    <div class="d-flex justify-content-end">
                        <a href="{{ route('history.index') }}" class="btn btn-secondary mt-3">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp;Back to History
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
