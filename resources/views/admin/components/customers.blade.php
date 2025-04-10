@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Customer Management</h6>

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <p class="card-description m-0">Manage Customers and Their Account Permissions Here</p>
                </div>

                <div class="table-responsive">
                    <table id="dataTableExample" class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>NIC/Passport</th>
                                <th>Registered Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($customers as $customer)
                            <tr>
                                <td>{{ $customer->name }}</td>
                                <td>{{ $customer->email }}</td>
                                <td>{{ $customer->nic_passport }}</td>
                                <td>{{ $customer->created_at->format('Y/m/d') }}</td>
                                <td>
                                    <button class="btn btn-warning btn-sm edit-btn" 
                                        data-id="{{ $customer->id }}"
                                        data-name="{{ $customer->name }}"
                                        data-email="{{ $customer->email }}"
                                        data-nic_passport="{{ $customer->nic_passport }}"
                                        data-bs-toggle="modal" 
                                        data-bs-target="#editModal">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </button>
                                    <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this customer?')">
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

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Customer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editForm" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="editName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="editName" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="editEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="editEmail" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="editNicPassport" class="form-label">NIC/Passport</label>
                        <input type="text" class="form-control" id="editNicPassport" name="nic_passport" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function() {
        // Edit button click handler
        $('.edit-btn').click(function() {
            var id = $(this).data('id');
            var name = $(this).data('name');
            var email = $(this).data('email');
            var nic_passport = $(this).data('nic_passport');
            
            $('#editName').val(name);
            $('#editEmail').val(email);
            $('#editNicPassport').val(nic_passport);
            $('#editForm').attr('action', '/admin/customers/' + id);
        });
    });
</script>
@endsection