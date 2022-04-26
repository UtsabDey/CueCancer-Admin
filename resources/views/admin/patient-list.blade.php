@extends('layouts.master')
@section('title', 'Patient List')
@section('content')
<!-- Page Wrapper -->
<div class="page-wrapper">
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">List of Patient</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#">Users</a></li>
                        <li class="breadcrumb-item active">Patient</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- /Page Header -->
        <div class="row">
            <div class="col-sm-12">
                @include('partials.flash')
                <div class="card">
                        <div class="table-responsive">
                            <div class="table-responsive">
                            <table class="datatable table table-hover table-center mb-0">
                                <thead>
                                    <tr>
                                        <th>Patient ID</th>
                                        <th>Patient Name</th>
                                        <th>DOB</th>
                                        <th>Age</th>
                                        <th>Address</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Blood Group</th>
                                        <th>Last Visit</th>
                                        <th>Total Visit</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($patients->count())
                                    @foreach ($patients as $patient)
                                    <tr>
                                        <td>{{ $patient->patient_id }}</td>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="#" class="avatar avatar-sm mr-2">
                                                    <img class="avatar-img rounded-circle" 
                                                    src="{{ config('app.front_url').'/photos/'. $patient->image }}" alt="User Image"></a>
                                                <a href="">{{ $patient->name }} 
                                                    </a>
                                            </h2>
                                        </td>
                                        <td>{{ $patient->dob }}</td>
                                        <td>{{ $patient->age }}</td>
                                        <td>{{ $patient->address }}</td>
                                        <td>{{ $patient->email }}</td>
                                        <td>{{ $patient->mobile }}</td>
                                        <td>{{ $patient->blood_grp }}</td>
                                        <td>{{ !$patient->last_visit ? 'N/A' : $patient->last_visit}}</td>
                                        <td>{{ $patient->total_visit }}</td>
                                        <td>
                                            <a href="{{ url('/') }}" class="btn btn-sm btn-info"> <i class="fa fa-eye"></i> </a>
                                            <a href="{{ url(''.$patient->id) }}" class="btn btn-sm btn-primary"> <i class="fa fa-edit"></i> </a>
                                            <a href="{{ url(''.$patient->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you want to delete?')"> <i class="fa fa-trash"></i> </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @else   
                                        <tr>
                                            <td colspan="6">
                                                <h5 class="text-center">No posts found.</h5>
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                            @include('partials.paginate', ['data' => $patients])
                        </div>
                        </div>
                    </div>
                </div>
            </div>			
        </div>
        
    </div>			
</div>
<!-- /Page Wrapper -->
@endsection