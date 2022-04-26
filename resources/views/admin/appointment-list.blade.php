@extends('layouts.master')
@section('title', 'Appointment List')
@section('content')
<!-- Page Wrapper -->
<div class="page-wrapper">
    <div class="content container-fluid">
        @include('partials.flash')
        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">Appointments</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Appointments</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->
        <div class="row">
            <div class="col-md-12">
            
                <!-- Recent Orders -->
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="datatable table table-hover table-center mb-0">
                                <thead>
                                    <tr>
                                        <th>Appoinment ID</th>
                                        <th>Doctor Name</th>
                                        <th>Patient Name</th>
                                        <th>Appt Date</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">Mobile</th>
                                        <th>Disease</th>
                                        <th class="text-center">Payment</th>
                                        <th>Status</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($appointment as $appointment)
                                    <tr>
                                        <td class="text-center">AP00{{ $appointment->id }}</td>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="patient-profile.html">{{ $appointment->doctor_name }} <span>{{ $appointment->doctor_id }}</span></a>
                                            </h2>
                                        </td>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="patient-profile.html">{{ $appointment->patient_name }}<span>{{ $appointment->patient_id }}</span></a>
                                            </h2>
                                        </td>
                                        <td>{{ $appointment->appt_date }}</td>
                                        <td>{{ $appointment->email }}</td>
                                        <td>{{ $appointment->mobile }}</td>
                                        <td class="text-center">{{ $appointment->note }}</td>
                                        <td class="text-center">{{ $appointment->payment }}</td>
                                        <td class="text-center">
                                            @if ($appointment->status == 'pending')
                                            <span class="badge bg-warning-light">{{ $appointment->status }}</span>
                                            @else
                                            <span class="badge bg-success-light">{{ $appointment->status }}</span> 
                                            @endif
                                        </td>
                                        <td class="text-right text-center">
                                            <div class="table-action">
                                                @if ($appointment->status == 'pending')
                                                <a href="{{ url('doctor/accept/'.$appointment->id) }}" class="btn btn-sm bg-success-light">
                                                <i class="fa fa-check"></i> Accept</a>
                                                <a href="javascript:void(0);" class="btn btn-sm bg-info-light"><i class="fa fa-eye"></i>Prescription</a>
                                                @else
                                                <a href="javascript:void(0);" class="btn btn-sm bg-warning-light" onclick="alert('Already Approved')">
                                                <i class="fa fa-check"></i> Accept</a>
                                                <a href="{{ url('doctor/pres/'. $appointment->id) }}" class="btn btn-sm bg-info-light">
                                                <i class="fa fa-eye"></i>Prescription
                                                </a>
                                                @endif
                                                {{-- <a href="javascript:void(0);" class="btn btn-sm bg-danger-light">
                                                <i class="fas fa-trash"></i> Cancel</a> --}}
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /Recent Orders -->
                
            </div>
        </div>
    </div>			
</div>
<!-- /Page Wrapper -->
@endsection