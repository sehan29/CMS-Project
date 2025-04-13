@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">User Details: {{ $user->name }}</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h5>Basic Information</h5>
                    <table class="table table-bordered">
                        <tr>
                            <th>ID</th>
                            <td>{{ $user->id }}</td>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <td>{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>
                                @if($user->isBanned())
                                    <span class="badge badge-danger">Banned</span>
                                @elseif($user->isActive())
                                    <span class="badge badge-success">Active</span>
                                @else
                                    <span class="badge badge-secondary">Inactive</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Registered</th>
                            <td>{{ $user->created_at->format('Y-m-d H:i') }}</td>
                        </tr>
                    </table>
                </div>
                
                {{-- @if($user->isBanned())
                <div class="col-md-6">
                    <h5>Block Information</h5>
                    <table class="table table-bordered">
                        <tr>
                            <th>Block Reason</th>
                            <td>{{ $user->block_reason ?? 'Not specified' }}</td>
                        </tr>
                        <tr>
                            <th>Blocked Until</th>
                            <td>
                                @if($user->blocked_until)
                                    {{ $user->blocked_until->format('Y-m-d H:i') }}
                                    ({{ $user->blocked_until->diffForHumans() }})
                                @else
                                    Permanent
                                @endif
                            </td>
                        </tr>
                    </table>
                </div>
                @endif --}}
            </div>
            
            <div class="mt-4">
                <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-primary">
                    <i class="fas fa-edit"></i> Edit User
                </a>
                <a href="{{ route('admin.users.search') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Back to Search
                </a>
            </div>
        </div>
    </div>
</div>
@endsection