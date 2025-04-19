{{-- @extends('dashboard')

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
@endsection --}}
{{-- 
 @extends('dashboard')

 @section('content')
 <div class="row">
     <div class="col-lg-12">
         <div class="card">
             <div class="card-body">
                 <h4 class="card-title">Complaint Details</h4>
                 
                 <div class="row">
                     <div class="col-md-6">
                         <p><strong>Reference No:</strong> REF/{{ $complaint->id }}/{{ date('Y') }}</p>
                         <p><strong>Category:</strong> {{ $complaint->category }}</p>
                         <p><strong>Status:</strong> 
                             @switch($complaint->status)
                                 @case(0) Pending @break
                                 @case(1) Assigned @break
                                 @case(2) Resolved @break
                                 @case(3) Reconsideration Requested @break
                                 @default Unknown
                             @endswitch
                         </p>
                     </div>
                     <div class="col-md-6">
                         <p><strong>Date Submitted:</strong> {{ $complaint->created_at->format('Y-m-d H:i') }}</p>
                         <p><strong>Last Updated:</strong> {{ $complaint->updated_at->format('Y-m-d H:i') }}</p>
                     </div>
                 </div>
                 
                 <div class="mt-4">
                     <h5>Details:</h5>
                     <p>{{ $complaint->details }}</p>
                 </div>
                 
                 @if ($complaint->documents->count() > 0)
                 <div class="mt-4">
                     <h5>Attachments:</h5>
                     <div class="row">
                         @foreach ($complaint->documents as $document)
                         <div class="col-md-3 mb-3">
                             <div class="card">
                                 <div class="card-body">
                                     <a href="{{ asset('storage/' . $document->file_path) }}" target="_blank" class="btn btn-sm btn-primary">
                                         View Attachment {{ $loop->iteration }}
                                     </a>
                                 </div>
                             </div>
                         </div>
                         @endforeach
                     </div>
                 </div>
                 @endif
                 
                 <div class="mt-4">
                     @if ($complaint->status == 2)  
                         @if (!$complaint->rating)
                         <h5>Rate This Resolution</h5>
                         <form method="POST" action="{{ route('complaints.rate', $complaint->id) }}">
                             @csrf
                             <div class="form-group">
                                 <label>Rating (1-5 stars)</label>
                                 <select name="rating" class="form-control" required>
                                     <option value="">Select rating</option>
                                     <option value="1">1 - Poor</option>
                                     <option value="2">2 - Fair</option>
                                     <option value="3">3 - Good</option>
                                     <option value="4">4 - Very Good</option>
                                     <option value="5">5 - Excellent</option>
                                 </select>
                             </div>
                             <div class="form-group">
                                 <label>Feedback (Optional)</label>
                                 <textarea name="feedback" class="form-control" rows="3"></textarea>
                             </div>
                             <button type="submit" class="btn btn-primary">Submit Rating</button>
                         </form>
                         @else
                         <div class="alert alert-info">
                             <h5>Your Rating: <span class="text-warning">⭐ {{ $complaint->rating }}/5</span></h5>
                             @if ($complaint->feedback)
                             <p><strong>Your Feedback:</strong> {{ $complaint->feedback }}</p>
                             @endif
                         </div>
                         @endif
                         
                         @if ($complaint->can_reconsider)
                         <hr>
                         <h5>Not Satisfied With Resolution?</h5>
                         <form method="POST" action="{{ route('complaints.reconsider', $complaint->id) }}">
                             @csrf
                             <div class="form-group">
                                 <label>Please explain why you're not satisfied (min 10 characters)</label>
                                 <textarea name="feedback" class="form-control" rows="3" required></textarea>
                                 <small class="text-muted">You have {{ 3 - $complaint->reconsideration_count }} reconsideration requests remaining.</small>
                             </div>
                             <button type="submit" class="btn btn-warning">Request Reconsideration</button>
                         </form>
                         @endif
                     @elseif($complaint->status == 3)  
                         <div class="alert alert-warning">
                             <h5>Reconsideration Requested</h5>
                             <p>You've submitted a reconsideration request. Please wait for our team to review it.</p>
                             <p><strong>Your feedback:</strong> {{ $complaint->feedback }}</p>
                             <p>Request count: {{ $complaint->reconsideration_count }}/3</p>
                         </div>
                     @endif
                 </div>
                 
                 <div class="mt-4">
                     <a href="{{ route('complaints.index') }}" class="btn btn-secondary">Back to List</a>
                 </div>
             </div>
         </div>
     </div>
 </div>
 @endsection --}}

@extends('dashboard')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h3 class="card-title mb-0">Complaint Details #{{ $complaint->id }}</h3>
                        <span class="badge badge-{{ $complaint->statusBadgeColor }}">{{ $complaint->statusText }}</span>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="card mb-4">
                                <div class="card-header bg-primary text-white d-flex align-items-center">
                                    <i class="fas fa-info-circle mr-2"></i><h5 class="pt-1">Complaint Information</h5>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table {{-- table-borderless --}}">
                                            <tbody>
                                                <tr>
                                                    <th width="30%">Reference No</th>
                                                    <td>REF/{{ $complaint->created_at->format('Y') }}/{{ str_pad($complaint->id, 5, '0', STR_PAD_LEFT) }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Category</th>
                                                    <td>{{ ucfirst($complaint->category) }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Submitted Date</th>
                                                    <td>{{ $complaint->created_at->format('M d, Y H:i') }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Priority</th>
                                                    <td>
                                                        @if (!empty($complaint->priority))
                                                        <p class="badge badge-{{ $complaint->priorityBadgeColor }} px-2" style="font-size: 13px;">
                                                            {{ ucfirst($complaint->priority) }}
                                                        </p>
                                                    @else
                                                        <p class="badge bg-success text-white px-4" style="font-size: 13px;">
                                                            Not Yet Reviewed
                                                        </p>
                                                    @endif                                                    </td>
                                                </tr>

                                                <tr class="bg-{{ $complaint->statusBadgeColor }}" style="opacity: 0.7;">
                                                    <th class="text-white">Complaint Status</th>
                                                    <td>
{{--                                                         <span class="badge badge-{{ $complaint->statusBadgeColor }} text-dark">{{ $complaint->statusText }}</span>
 --}}                                                        <p class="text-white" style="font-weight: bold;">{{ $complaint->statusText }}</p>
                                                    </td>
                                                </tr>

                                                @if ($complaint->isResolved())
                                                    <tr>
                                                        <th>Resolved Date</th>
                                                        <td>{{ $complaint->updated_at->format('M d, Y H:i') }}</td>
                                                    </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card mb-4">
                                <div class="card-header bg-primary text-white d-flex align-items-center">
                                    <i class="fas fa-check-circle mr-2"></i><h5 class="pt-1">Resolution Details</h5>
                                </div>
                                <div class="card-body">
                                    @if ($complaint->isResolved())

                                    <div class="table-responsive">
                                        <table class="table {{-- table-borderless --}}">
                                            <tbody>
                                                <tr>
                                                    <th width="30%">Assigned Division</th>
                                                    <td>{{ $complaint->division ?? 'Not specified' }}</td>
                                                </tr>

                                                <tr>
                                                   {{--  <th width="100%">Admin Notes</th>
                                                    <td>{{ $complaint->notes ?? 'No notes provided' }}</td> --}}
                                                </tr> 
                                            </tbody>
                                        </table>
                                    </div>
                                        

                                        <hr>
                                        <div class="mb-3 mx-3">
                                            <h6 class="mb-2">Admin Notes</h6>
                                            <p>{{ $complaint->notes ?? 'No notes provided' }}</p>
                                        </div>
                                    @else
                                        <p class="text-muted">Resolution details will appear here once the complaint is
                                            resolved.</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <div class="card-header bg-primary text-white d-flex align-items-center">
                            <i class="fas fa-exclamation-circle mr-2"></i><h5 class="pt-1">Complaint Details</h5>
                        </div>
                        <div class="card-body">
                            <p>{{ $complaint->details }}</p>
                        </div>
                    </div>

                    @if ($complaint->documents->count() > 0)
                        <div class="card mb-4">
                            <div class="card-header bg-primary text-white d-flex align-items-center">
                                <i class="fas fa-paperclip mr-2"></i><h5 class="mt-1">Attachments</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    @foreach ($complaint->documents as $document)
                                        <div class="col-md-3 mb-3">
                                            <div class="card border">
                                                <div class="card-img-top d-flex align-items-center justify-content-center"
                                                    style="height: 150px; overflow: hidden;">
                                                    @if (in_array(pathinfo($document->file_path, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'gif']))
                                                        <img src="{{ asset('storage/' . $document->file_path) }}"
                                                            class="img-fluid" style="max-height: 100%; width: auto;">
                                                    @else
                                                        <i class="fas fa-file-alt fa-3x text-secondary"></i>
                                                    @endif
                                                </div>
                                                <div class="card-body text-center p-2">
                                                    <a href="{{ asset('storage/' . $document->file_path) }}"
                                                        target="_blank" class="btn btn-sm btn-outline-primary btn-block">
                                                        <i class="fas fa-download"></i> Download
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif

                    @if ($complaint->reconsiderationNotes->count() > 0)
                        <div class="card mb-4">
                            <div class="card-header bg-primary text-white">
                                <h5 class="mb-0">
                                    <i class="fas fa-redo mr-2"></i>Reconsideration History
                                    <span
                                        class="badge badge-primary float-right">{{ $complaint->reconsiderationNotes->count() }}
                                        Request(s)</span>
                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="">
                                    @foreach ($complaint->reconsiderationNotes as $note)
                                        <div class="timeline-item {{ $loop->last ? '' : 'mb-4' }}">
                                            <div class="timeline-header d-flex justify-content-between align-items-center">
                                                <div>
                                                    <span class="badge badge-success">Request
                                                        #{{ $note->request_number }}</span>
                                                    <span class="badge badge-success ml-2">
                                                        <i class="far fa-clock mr-1"></i>
                                                        {{ $note->created_at->format('M d, Y h:i A') }}
                                                    </span>
                                                </div>
                                                @if ($note->request_number == $complaint->reconsideration_count)
                                                    <span class="badge badge-info">Latest</span>
                                                @endif
                                            </div>
                                            <div class="timeline-body mt-3 p-3 bg-light rounded">
                                                <p class="mb-0">{{ $note->notes }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif

                    @if ($complaint->isResolved())
                        <div class="card mb-4">
                            <div class="card-header bg-primary text-white d-flex align-items-center">
                                <i class="fas fa-star mr-2"></i><h5 class="pt-1">Feedback & Rating</h5>
                            </div>
                            <div class="card-body">

                                @if (is_null($complaint->rating))
                                    <div class="mb-4">
                                        <h5 class="mb-3">Rate This Resolution</h5>
                                        <form action="{{ route('complaints.rate', $complaint->id) }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label class="d-block mb-2 font-weight-bold">Your Rating</label>
                                                <div class="rating-container">
                                                    <div class="rating-stars">
                                                        @for ($i = 5; $i >= 1; $i--)
                                                            <input type="radio" id="star{{ $i }}" name="rating" value="{{ $i }}" {{ old('rating') == $i ? 'checked' : '' }}>
                                                        @endfor
                                                        @for ($i = 5; $i >= 1; $i--)
                                                            <label for="star{{ $i }}" title="{{ $i }} star">
                                                                <i class="fas fa-star"></i>
                                                            </label>
                                                        @endfor
                                                    </div>
                                                    <div class="rating-labels mt-2">
                                                        <span class="text-muted small">Poor</span>
                                                        <span class="text-muted small">Fair</span>
                                                        <span class="text-muted small">Good</span>
                                                        <span class="text-muted small">Very Good</span>
                                                        <span class="text-muted small">Excellent</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="feedback" class="font-weight-bold">Your Feedback
                                                    (Optional)</label>
                                                <textarea class="form-control" id="feedback" name="feedback" rows="4"
                                                    placeholder="Please share your experience with how this complaint was resolved...">{{ old('feedback') }}</textarea>
                                            </div>
                                            <button type="submit" class="btn btn-primary px-4">
                                                <i class="fas fa-paper-plane mr-2"></i> Submit Rating
                                            </button>
                                        </form>
                                    </div>


                                    <div class="border-top pt-3">
                                        <h5 class="pb-2">Not Satisfied With Resolution?</h5>
                                        @if ($complaint->can_reconsider && $complaint->reconsideration_count < 3)
                                            <button class="btn btn-outline-warning" data-toggle="modal"
                                                data-target="#reconsiderModal">
                                                <i class="fas fa-redo"></i> Request Reconsideration
                                            </button>
                                            <small class="text-muted d-block mt-2">
                                                You have {{ 3 - $complaint->reconsideration_count }} reconsideration
                                                requests remaining.
                                            </small>
                                        @else
                                            <div class="alert alert-warning">
                                                @if ($complaint->reconsideration_count >= 3)
                                                    You've used all 3 reconsideration requests for this complaint.
                                                @else
                                                    Reconsideration is not available for this complaint.
                                                @endif
                                            </div>
                                        @endif
                                    </div>
                                @else
                                    <div class="alert alert-success">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <h5>Your Rating:
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        <i
                                                            class="fas fa-star{{ $i <= $complaint->rating ? ' text-warning' : ' text-secondary' }}"></i>
                                                    @endfor
                                                </h5>
                                                @if ($complaint->feedback)
                                                    <div class="mt-2">
                                                        <h6>Your Feedback:</h6>
                                                        <p class="mb-0">{{ $complaint->feedback }}</p>
                                                    </div>
                                                @endif
                                            </div>
                                            <span class="badge badge-success">Submitted</span>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endif

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('history.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left mr-2"></i> Back to History
                        </a>

                        {{-- @if ($complaint->isResolved() && is_null($complaint->rating))
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#ratingModal">
                                <i class="fas fa-star mr-2"></i> Rate This Complaint
                            </button>
                        @endif --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Reconsideration Modal -->
    <div class="modal fade" id="reconsiderModal" tabindex="-1" role="dialog" aria-labelledby="reconsiderModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="reconsiderModalLabel">Request Reconsideration</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('complaints.reconsider', $complaint->id) }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="reconsiderationNote">Please explain why you're requesting reconsideration</label>
                            <textarea class="form-control" id="reconsiderationNote" name="feedback" rows="5" required
                                placeholder="Provide detailed reasons for reconsideration..."></textarea>
                        </div>
                        <div class="alert alert-info">
                            <i class="fas fa-info-circle"></i> You have {{ 3 - $complaint->reconsideration_count }}
                            reconsideration requests remaining for this complaint.
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-warning">Submit Request</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection










@push('styles')
    <style>
        .rating-stars {
            display: flex;
            flex-direction: row-reverse;
            justify-content: center;
        }

        .rating-stars input {
            display: none;
        }

        .rating-stars label {
            font-size: 2rem;
            color: #ddd;
            cursor: pointer;
        }

        .rating-stars input:checked~label,
        .rating-stars label:hover,
        .rating-stars label:hover~label {
            color: #ffc107;
        }
    </style>
@endpush
