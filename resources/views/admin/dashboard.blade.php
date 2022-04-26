@extends('layouts.master')
@section('content')
<!-- Page Wrapper -->
<div class="page-wrapper">

    <div class="content container-fluid">
        
        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">Welcome Admin!</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        <div class="row">
            <div class="col-xl-4 col-sm-6 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="dash-widget-header">
                            <span class="dash-widget-icon text-primary border-primary">
                                <i class="fe fe-users"></i>
                            </span>
                            <div class="dash-count">
                                <h3>{{ $doctor->count() }}</h3>
                            </div>
                        </div>
                        <div class="dash-widget-info">
                            <h6 class="text-muted">Doctors</h6>
                            <div class="progress progress-sm">
                                <div class="progress-bar bg-primary w-50"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="dash-widget-header">
                            <span class="dash-widget-icon text-success">
                                <i class="fe fe-credit-card"></i>
                            </span>
                            <div class="dash-count">
                                <h3>{{ $patient->count() }}</h3>
                            </div>
                        </div>
                        <div class="dash-widget-info">
                            
                            <h6 class="text-muted">Patients</h6>
                            <div class="progress progress-sm">
                                <div class="progress-bar bg-success w-50"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="dash-widget-header">
                            <span class="dash-widget-icon text-danger border-danger">
                                <i class="fe fe-money"></i>
                            </span>
                            <div class="dash-count">
                                <h3>{{ $appointment->count() }}</h3>
                            </div>
                        </div>
                        <div class="dash-widget-info">
                            
                            <h6 class="text-muted">Appointment</h6>
                            <div class="progress progress-sm">
                                <div class="progress-bar bg-danger w-50"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 d-flex">
            
                <!-- Recent Orders -->
                <div class="card card-table flex-fill">
                    <div class="card-header">
                        <h4 class="card-title">Doctors List</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-center mb-0">
                                <thead>
                                    <tr>
                                        <th>Doctor ID</th>
                                        <th>Doctor Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Speciality</th>
                                        <th>Fee</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($doctor as $doctor)
                                    <tr>
                                        <td>{{ $doctor->doctor_id }}</td>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="">{{ $doctor->name }}</a>
                                            </h2>
                                        </td>
                                        <td>{{ $doctor->email }}</td>
                                        <td>{{ $doctor->mobile }}</td>
                                        <td>{{ $doctor->speciality }}</td>
                                        <td>{{ $doctor->fee }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /Recent Orders -->
                
            </div>
            <div class="col-md-6 d-flex">
            
                <!-- Feed Activity -->
                <div class="card  card-table flex-fill">
                    <div class="card-header">
                        <h4 class="card-title">Patients List</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-center mb-0">
                                <thead>
                                    <tr>	
                                        <th>Patient ID</th>
                                        <th>Patient Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Address</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($patient as $patient)
                                    <tr>
                                        <td>{{ $patient->patient_id }}</td>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="">{{ $patient->name }}</a>
                                            </h2>
                                        </td>
                                        <td>{{ $patient->email }}</td>
                                        <td>{{ $patient->mobile }}</td>
                                        <td class="text-right">{{ $patient->address }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /Feed Activity -->
                
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
            
                <!-- Recent Orders -->
                <div class="card card-table">
                    <div class="card-header">
                        <h4 class="card-title">Appointment List</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-center">Appointment ID</th>
                                        <th class="text-center">Doctor Name</th>
                                        <th class="text-center">Patient Name</th>
                                        <th class="text-center">Apointment Date</th>
                                        <th class="text-center">Problems</th>
                                        <th class="text-center">Payment</th>
                                        <th class="text-center">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($appointment as $appointment)
                                    <tr>
                                        <td class="text-center">
                                            <h2 class="table-avatar">
                                                <a href="profile.html">AP00{{ $appointment->id }}</a>
                                            </h2>
                                        </td>
                                        <td class="text-center">{{ $appointment->doctor_name }}<span class="text-info d-block">{{ $appointment->doctor_id }}</span></td>
                                        <td class="text-center">
                                            <h2 class="table-avatar">
                                                <a href="profile.html">{{ $appointment->patient_name }}</a>
                                            </h2><span class="text-info d-block">{{ $appointment->patient_id }}</span>
                                        </td>
                                        <td class="text-center">{{ $appointment->appt_date }}</td>
                                        <td class="text-center">{{ $appointment->note }}</td>
                                        <td class="text-center">{{ $appointment->payment }}</td>
                                        <td class="text-center">
                                            @if ($appointment->status == 'pending')
                                            <span class="badge bg-warning-light">{{ $appointment->status }}</span>
                                            @else
                                            <span class="badge bg-success-light">{{ $appointment->status }}</span> 
                                            @endif
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