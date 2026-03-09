@extends('admin.layouts.main')

@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>User Details</h3>
        </div>

        <div class="card-body">
            <table class="table table-bordered">

                <tr>
                    <th>User Name</th>
                    <td>{{ $user->name }}</td>
                </tr>

                <tr>
                    <th>Email</th>
                    <td>{{ $user->email }}</td>
                </tr>

                <tr>
                    <th>Birth Date</th>
                    <td>{{ $user->birth_date }}</td>
                </tr>

                <tr>
                    <th>Last Donation Date</th>
                    <td>{{ $user->last_donation_date }}</td>
                </tr>

                <tr>
                    <th>City</th>
                    <td>{{ $user->city->name ?? 'N/A' }}</td>
                </tr>

                <tr>
                    <th>Phone</th>
                    <td>{{ $user->phone ?? 'N/A' }}</td>
                </tr>

                <tr>
                    <th>Blood Type</th>
                    <td>{{ $user->bloodType->name ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <th>Is Active</th>
                    <td>
                                    @if($user->is_active)
                                    <span class="badge badge-success mr-2">Active</span>
                                    @else
                                    <span class="badge badge-danger mr-2">Inactive</span>
                                    @endif

                                    <form action="{{ route('admin.users.toggle', $user->id) }}"
                                        method="POST"
                                        style="display:inline-block">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit"
                                            onclick="return confirm('Are you sure you want to toggle this user?')"
                                            class="btn btn-sm {{ $user->is_active ? 'btn-warning' : 'btn-success' }}">
                                            {{ $user->is_active ? 'Deactivate' : 'Activate' }}
                                        </button>
                                    </form>
                                </td>
                </tr>

                <tr>
                    <th>Created At</th>
                    <td>{{ $user->created_at->format('Y-m-d') }}</td>
                </tr>

            </table>

            
        </div>
        <a href="{{url(route('admin.users.index'))}}" class="btn btn-secondary">
                Back
            </a>
    </div>
</div>

@endsection