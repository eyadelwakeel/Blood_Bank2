@extends('admin.layouts.main')

@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Donation Request Details</h3>
        </div>

        <div class="card-body">
            <table class="table table-bordered">

                <tr>
                    <th>Patient Name</th>
                    <td>{{ $donationRequest->name }}</td>
                </tr>

                <tr>
                    <th>Blood Type</th>
                    <td>{{ $donationRequest->bloodType->name }}</td>
                </tr>

                <tr>
                    <th>Bags Required</th>
                    <td>{{ $donationRequest->bags_number }}</td>
                </tr>

                <tr>
                    <th>Hospital Name</th>
                    <td>{{ $donationRequest->hospital_name }}</td>
                </tr>

                <tr>
                    <th>City</th>
                    <td>{{ $donationRequest->city->name ?? 'N/A' }}</td>
                </tr>

                <tr>
                    <th>Hospital Address</th>
                    <td>{{ $donationRequest->hospital_address ?? 'N/A' }}</td>
                </tr>

                <tr>
                    <th>Details</th>
                    <td>{{ $donationRequest->notes }}</td>
                </tr>

                <tr>
                    <th>Created At</th>
                    <td>{{ $donationRequest->created_at->format('Y-m-d') }}</td>
                </tr>

            </table>

            
        </div>
        <a href="{{url(route('admin.donation_requests.index'))}}" class="btn btn-secondary">
                Back
            </a>
    </div>
</div>

@endsection