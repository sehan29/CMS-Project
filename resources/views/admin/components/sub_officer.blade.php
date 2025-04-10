@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Subject Officer Management</h6>

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <p class="card-description m-0">Manage Subject Officers and Their Account Permissions Here</p>
                    <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#userModal">
                        <i class="bi bi-person-plus"></i> Add User
                    </button>
                </div>

                <div class="table-responsive">
                    <table id="dataTableExample" class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Section</th>
                                <th>Email</th>
                                <th>NIC/Passport</th>
                                <th>Registered Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($subjectOfficers as $officer)
                            <tr>
                                <td>{{ $officer->name }}</td>
                                <td>{{ $officer->section ?? 'Not assigned' }}</td>
                                <td>{{ $officer->email }}</td>
                                <td>{{ $officer->nic_passport }}</td>
                                <td>{{ $officer->created_at->format('Y/m/d') }}</td>
                                <td>
                                    <button class="btn btn-warning btn-sm edit-btn" 
                                        data-id="{{ $officer->id }}"
                                        data-section="{{ $officer->section }}">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </button>
                                    <form action="{{ route('admin.subject-officers.destroy', $officer->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                                            <i class="bi bi-trash"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add User Modal -->
<div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="userModalLabel">New Subject Officer Registration</h4>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                    <i class="bi bi-x-lg"></i>
                </button>
            </div>
            <form id="assignRoleForm" action="{{ route('admin.subject-officers.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <!-- Search User -->
                    <div class="mb-3">
                        <label for="searchUser" class="form-label">Search by Passport No / NIC No</label>
                        <input type="text" id="searchUser" name="nic_passport" class="form-control" placeholder="Enter Passport or NIC No">
                        <button type="button" class="btn btn-primary mt-2" id="searchBtn"><i class="bi bi-search"></i> Search</button>
                    </div>

                    <!-- User Details (Dynamically Updated) -->
                    <div id="userDetails" class="d-none">
                        <h4 class="mb-4">User Details</h4>
                        <input type="hidden" name="user_id" id="userId">
                        
                        <div class="mb-3">
                            <label for="userName" class="form-label"><strong>Name</strong></label>
                            <input type="text" class="form-control" id="userName" disabled>
                        </div>
                        
                        <div class="mb-3">
                            <label for="userEmail" class="form-label"><strong>Email</strong></label>
                            <input type="email" class="form-control" id="userEmail" disabled>
                        </div>
                        
                        <div class="mb-3">
                            <label for="userPhone" class="form-label"><strong>Phone</strong></label>
                            <input type="text" class="form-control" id="userPhone" disabled>
                        </div>

                        <div class="mb-3">
                            <label for="assignRole" class="form-label">Assign Section</label>
                            <select id="assignRole" name="section" class="form-select" required>
                                <option value="">Select Section</option>
                                <option value="Tourist Police">Tourist Police</option>
                                <option value="Immigration">Immigration</option>
                                <option value="Customs">Customs</option>
                                <option value="Other">Other Sections</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" id="assignRoleBtn" class="btn btn-success d-none">
                        <i class="bi bi-check-circle"></i> Assign Role
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="editModalLabel">Edit Subject Officer</h4>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                    <i class="bi bi-x-lg"></i>
                </button>
            </div>
            <form id="editForm" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="editSection" class="form-label">Section</label>
                        <select id="editSection" name="section" class="form-select" required>
                            <option value="">Select Section</option>
                            <option value="Tourist Police">Tourist Police</option>
                            <option value="Immigration">Immigration</option>
                            <option value="Customs">Customs</option>
                            <option value="Other">Other Sections</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    $(document).ready(function() {
        // Search user by NIC/Passport

        console.log("jQuery is loaded and working");
        $("#searchBtn").click(function(e) {
            e.preventDefault();
            console.log("Search button clicked"); // Debugging
            
            let nicPassport = $("#searchUser").val().trim();
            console.log("Searching for:", nicPassport); // Debugging
            
            if(!nicPassport) {
                alert("Please enter Passport No / NIC No");
                return;
            }

            $.ajax({
                url: "{{ route('admin.subject-officers.search') }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    nic_passport: nicPassport
                },
                success: function(response) {
                    console.log("AJAX success:", response); // Debugging
                    if(response.success) {
                        $("#userId").val(response.user.id);
                        $("#userName").val(response.user.name);
                        $("#userEmail").val(response.user.email);
                        
                        $("#userDetails").removeClass("d-none");
                        $("#assignRoleBtn").removeClass("d-none");
                    } else {
                        alert(response.message);
                    }
                },
                error: function(xhr, status, error) {
                    console.error("AJAX error:", status, error, xhr.responseText); // Debugging
                    alert("An error occurred. Please check console for details.");
                }
            });
        });

        // Edit button click handler
        $('.edit-btn').click(function() {
            var id = $(this).data('id');
            var section = $(this).data('section');
            
            $('#editSection').val(section);
            $('#editForm').attr('action', '/admin/subject-officers/' + id);
            
            var editModal = new bootstrap.Modal(document.getElementById('editModal'));
            editModal.show();
        });

        // Reset modal when closed
        $('#userModal').on('hidden.bs.modal', function () {
            $("#userDetails").addClass("d-none");
            $("#assignRoleBtn").addClass("d-none");
            $("#searchUser").val('');
            $("#assignRoleForm")[0].reset();
        });
    });
</script>
@endsection