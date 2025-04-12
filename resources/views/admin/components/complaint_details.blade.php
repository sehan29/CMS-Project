
@extends('layouts.admin')

@section('content')
<div class="container-fluid px-4">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Complaint Details #COMP-{{ $complaint->id }}</h1>
        <a href="{{ route('admin.complaints.index') }}" class="d-none d-sm-inline-block btn btn-secondary shadow-sm">
            &nbsp;Back to Complaints
        </a>
    </div>

    <div class="row">
        <!-- Main Content -->
        <div class="col-xl-8 col-lg-7">
            <!-- Complaint Card -->
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-primary">
                    <h5 class="m-0 font-weight-bold text-white">Complaint Overview</h5>
                    {{-- <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-white"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#printModal">
                                <i class="fas fa-print fa-sm mr-2"></i>Print Details
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-file-export fa-sm mr-2"></i>Export
                            </a>
                        </div>
                    </div> --}}
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="d-flex align-items-center mb-4">
                                <div class="icon-circle bg-primary mr-3">
                                    <i class="fas fa-user text-white"></i>
                                </div>
                                <div>
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Complainant
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $complaint->user->name }}</div>
                                    <small class="text-muted">{{ $complaint->user->email }}</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-center mb-4">
                                <div class="icon-circle bg-info mr-3">
                                    <i class="fas fa-id-card text-white"></i>
                                </div>
                                <div>
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                        Passport/NIC
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $complaint->user->passport_nic ?? 'N/A' }}</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-4">
                            <div class="card border-left-primary h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Status
                                            </div>
                                            <div class="h5 mb-0">
                                                @if($complaint->isPending())
                                                    <span class="badge badge-warning">Pending</span>
                                                @elseif($complaint->isAssigned())
                                                    <span class="badge badge-info">Assigned</span>
                                                @else
                                                    <span class="badge badge-success">Resolved</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card border-left-success h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Priority
                                            </div>
                                            <div class="h5 mb-0">
                                                @if($complaint->priority === 'high')
                                                    <span class="badge badge-danger">High</span>
                                                @elseif($complaint->priority === 'medium')
                                                    <span class="badge badge-warning">Medium</span>
                                                @else
                                                    <span class="badge badge-success">Low</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-exclamation-triangle fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card border-left-info h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                Category
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $complaint->category }}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-tag fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Complaint Details -->
                    <div class="mb-4">
                        <h5 class="font-weight-bold text-gray-800 mb-3">
                            <i class="fas fa-file-alt mr-2"></i>Complaint Description
                        </h5>
                        <div class="card">
                            <div class="card-body">
                                <div class="text-muted mb-2">
                                    <i class="far fa-clock mr-1"></i> 
                                    Submitted on {{ $complaint->created_at->format('M d, Y \a\t h:i A') }}
                                </div>
                                <hr>
                                <p class="mb-0">{{ $complaint->description }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Admin Notes -->
                    @if($complaint->notes)
                    <div class="mb-4">
                        <h5 class="font-weight-bold text-gray-800 mb-3">
                            <i class="fas fa-sticky-note mr-2"></i>Administrator Notes
                        </h5>
                        <div class="card border-left-warning">
                            <div class="card-body">
                                <div class="text-muted mb-2">
                                    <i class="far fa-clock mr-1"></i> 
                                    Last updated on {{ $complaint->updated_at->format('M d, Y \a\t h:i A') }}
                                </div>
                                <hr>
                                <p class="mb-0">{{ $complaint->notes }}</p>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="col-xl-4 col-lg-5">
            <!-- Actions Card -->
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-primary">
                    <h6 class="m-0 font-weight-bold text-white">Complaint Actions</h6>
                </div>
                <div class="card-body">
                    @if($complaint->isPending())
                        <button class="btn btn-primary btn-icon-split btn-block mb-3 assign-btn" 
                            data-toggle="modal" 
                            data-target="#assignModal">
                            <span class="icon text-white-50">
                                <i class="fas fa-paper-plane"></i>
                            </span>
                            <span class="text">Assign to Division</span>
                        </button>
                    @elseif($complaint->isAssigned())
                        <button class="btn btn-success btn-icon-split btn-block mb-3 resolve-btn" 
                            data-action="{{ route('admin.complaints.resolve', $complaint) }}">
                            <span class="icon text-white-50">
                                <i class="fas fa-check-circle"></i>
                            </span>
                            <span class="text">Mark as Resolved</span>
                        </button>
                        <button class="btn btn-info btn-icon-split btn-block mb-3 assign-btn" 
                            data-toggle="modal" 
                            data-target="#assignModal">
                            <span class="icon text-white-50">
                                <i class="fas fa-sync-alt"></i>
                            </span>
                            <span class="text">Reassign Division</span>
                        </button>
                    @endif
                    
                    <button class="btn btn-warning btn-icon-split btn-block mb-3" 
                        data-toggle="modal" 
                        data-target="#noteModal">
                        <span class="icon text-white-50">
                            <i class="fas fa-edit"></i>
                        </span>
                        <span class="text">Add/Edit Note</span>
                    </button>
                </div>
            </div>

            <!-- Division Information -->
            @if($complaint->division)
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-primary">
                    <h6 class="m-0 font-weight-bold text-white">Assigned Division</h6>
                   {{--  <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-white"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-history fa-sm mr-2"></i>View History
                            </a>
                        </div>
                    </div> --}}
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <div class="mb-3">
                            <div class="icon-circle bg-info text-white" style="width: 60px; height: 60px; margin: 0 auto;">
                                <i class="fas fa-building fa-2x"></i>
                            </div>
                        </div>
                        <h4 class="font-weight-bold text-gray-800">{{ $complaint->division }}</h4>
                        <div class="mb-3">
                            <span class="badge badge-{{ $complaint->priority === 'high' ? 'danger' : ($complaint->priority === 'medium' ? 'warning' : 'success') }}">
                                {{ ucfirst($complaint->priority) }} Priority
                            </span>
                        </div>
                        <p class="text-muted small">
                            <i class="far fa-clock mr-1"></i>
                            Assigned on {{ $complaint->updated_at->format('M d, Y \a\t h:i A') }}
                        </p>
                    </div>
                </div>
            </div>
            @endif

            <!-- Attachments -->
            @if($complaint->documents->count() > 0)
            <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-primary">
                    <h6 class="m-0 font-weight-bold text-white">Attachments</h6>
                    <span class="badge badge-light">{{ $complaint->documents->count() }}</span>
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach($complaint->documents as $document)
                        <div class="col-6 mb-3">
                            <div class="attachment-card">
                                <a href="{{ asset('storage/'.$document->file_path) }}" data-toggle="lightbox" data-gallery="attachment-gallery">
                                    <div class="attachment-thumbnail">
                                        @if(in_array(strtolower(pathinfo($document->file_path, PATHINFO_EXTENSION)), ['jpg','jpeg','png','gif']))
                                            <img src="{{ asset('storage/'.$document->file_path) }}" class="img-fluid rounded" alt="Attachment">
                                        @else
                                            <div class="file-icon">
                                                <i class="fas fa-file-{{ $document->file_type_icon }} fa-3x"></i>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="attachment-info">
                                        <small class="text-truncate d-block">{{ $document->file_name }}</small>
                                        <small class="text-muted">{{ $document->created_at->format('M d, Y') }}</small>
                                    </div>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>

<!-- Assign Modal -->
<div class="modal fade" id="assignModal" tabindex="-1" role="dialog" aria-labelledby="assignModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="assignModalLabel">
                    <i class="fas fa-paper-plane mr-2"></i>
                    Assign Complaint #COMP-{{ $complaint->id }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.complaints.assign', $complaint) }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="division" class="font-weight-bold">Division</label>
                                <select class="form-control selectpicker" id="division" name="division" required data-live-search="true">
                                    <option value="">Select Division</option>
                                    <option value="Tourist Police" {{ $complaint->division == 'Tourist Police' ? 'selected' : '' }}>Tourist Police</option>
                                    <option value="Immigration" {{ $complaint->division == 'Immigration' ? 'selected' : '' }}>Immigration</option>
                                    <option value="Customs" {{ $complaint->division == 'Customs' ? 'selected' : '' }}>Customs</option>
                                    <option value="Other" {{ $complaint->division == 'Other' ? 'selected' : '' }}>Other</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="priority" class="font-weight-bold">Priority Level</label>
                                <select class="form-control selectpicker" id="priority" name="priority" required>
                                    <option value="low" {{ $complaint->priority == 'low' ? 'selected' : '' }}>Low Priority</option>
                                    <option value="medium" {{ $complaint->priority == 'medium' ? 'selected' : '' }}>Medium Priority</option>
                                    <option value="high" {{ $complaint->priority == 'high' ? 'selected' : '' }}>High Priority</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="notes" class="font-weight-bold">Additional Notes</label>
                        <textarea class="form-control" id="notes" name="notes" rows="4" placeholder="Enter any special instructions for the division...">{{ $complaint->notes }}</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-paper-plane mr-2"></i> Assign Complaint
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Note Modal -->
<div class="modal fade" id="noteModal" tabindex="-1" role="dialog" aria-labelledby="noteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-warning text-white">
                <h5 class="modal-title" id="noteModalLabel">
                    <i class="fas fa-sticky-note mr-2"></i>
                    Complaint Notes
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.complaints.note', $complaint) }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <textarea class="form-control" id="complaintNotes" name="note" rows="8" placeholder="Enter your notes about this complaint...">{{ $complaint->notes }}</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-warning">
                        <i class="fas fa-save mr-2"></i> Save Notes
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Print Modal -->
<div class="modal fade" id="printModal" tabindex="-1" role="dialog" aria-labelledby="printModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="printModalLabel">Print Complaint Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Select the content you want to include in the printout:</p>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="printBasicInfo" checked>
                    <label class="form-check-label" for="printBasicInfo">
                        Basic Complaint Information
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="printDescription" checked>
                    <label class="form-check-label" for="printDescription">
                        Complaint Description
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="printNotes" checked>
                    <label class="form-check-label" for="printNotes">
                        Administrator Notes
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="printAttachments">
                    <label class="form-check-label" for="printAttachments">
                        Attachments List
                    </label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="window.print()">
                    <i class="fas fa-print mr-2"></i> Print
                </button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<link href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" rel="stylesheet">
<style>
    .icon-circle {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .attachment-card {
        border: 1px solid #e3e6f0;
        border-radius: 0.35rem;
        padding: 0.5rem;
        transition: all 0.3s;
    }
    
    .attachment-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
    }
    
    .attachment-thumbnail {
        height: 100px;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #f8f9fc;
        border-radius: 0.25rem;
        overflow: hidden;
        margin-bottom: 0.5rem;
    }
    
    .attachment-thumbnail img {
        max-height: 100%;
        width: auto;
    }
    
    .file-icon {
        color: #4e73df;
        text-align: center;
    }
    
    .attachment-info {
        text-align: center;
    }
    
    .selectpicker {
        border: 1px solid #d1d3e2;
    }
    
    .dropdown-menu {
        box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
        border: none;
    }
    
    .card-header {
        border-bottom: 1px solid rgba(0, 0, 0, 0.05);
    }
    
    .badge {
        font-size: 0.85em;
        font-weight: 600;
        padding: 0.35em 0.65em;
    }
    .icon-circle::before {

        display: none;
    }
</style>
@endsection

@section('scripts')
<!-- Bootstrap core JavaScript-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Bootstrap Select -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

<!-- Lightbox -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>

<!-- Custom scripts -->
<script>
    $(document).ready(function() {
        // Initialize select picker
        $('.selectpicker').selectpicker();
        
        // Resolve button handler
        $('.resolve-btn').click(function(e) {
            e.preventDefault();
            if(confirm('Are you sure you want to mark this complaint as resolved?')) {
                $.ajax({
                    url: $(this).data('action'),
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function() {
                        location.reload();
                    },
                    error: function(xhr) {
                        alert('An error occurred: ' + xhr.responseText);
                    }
                });
            }
        });
        
        // Initialize lightbox for attachments
        lightbox.option({
            'resizeDuration': 200,
            'wrapAround': true,
            'showImageNumberLabel': true
        });
    });
</script>
@endsection