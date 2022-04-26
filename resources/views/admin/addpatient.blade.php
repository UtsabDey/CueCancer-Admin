@extends('layouts.master')
@section('title', 'Patient List')
@section('content')
<!-- Page Wrapper -->
<div class="page-wrapper">
    @include('partials.flash')
    <div class="card">
        <div class="card-body">
            
            <!-- Profile Settings Form -->
            <form action="{{ url('patient/add/submit') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <h4 class="card-title">Patient Information</h4>
                <div class="row form-row">

                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label>User ID</label>
                            <input type="text" placeholder="PT001" name="patient_id" class="form-control" value="{{ old('patient_id') }}" required>@error('doctor_id')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" placeholder="Name" class="form-control" value="{{ old('name') }}"> @error('name')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label>Date of Birth</label>
                                <input type="date" name="dob" class="form-control" value="{{ old('dob') }}">@error('dob')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label>Blood Group</label>
                            <select class="form-control" name="blood_grp" required>
                                <option value="">Select Bloog Group</option>
                                <option value="A+VE">A+VE</option>
                                <option value="A-VE">A-VE</option>
                                <option value="B+VE">B+VE</option>
                                <option value="B-VE">B-VE</option>
                                <option value="O+VE">O+VE</option>
                                <option value="O-VE">O-VE</option>
                                <option value="AB+VE">AB+VE</option>
                                <option value="AB-VE">AB-VE</option>
                            </select>@error('blood_grp')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label>Email ID</label>
                            <input class="form-control" name="email" type="text" value="{{ old('email') }}" placeholder="Email" required>@error('email')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label>Mobile</label>
                            <input class="form-control" type="text" name="mobile" placeholder="Contact No (01********)" pattern="[0]{1}[1]{1}[0-9]{9}" title="Enter 11 digits mobile number" value="{{ old('mobile') }}" required>@error('mobile')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <div class="custom-file">
                                <input type="file" name="image" class="custom-file-input" id="image" required>
                                <label class="custom-file-label" for="image" required>Choose Picture</label>@error('image')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <input class="form-control" id="myInput" type="password" placeholder="Password" name="password" value="{{ old('password') }}" required>
                            <input type="checkbox" onclick="showPass1()">Show Password @error('password')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                        <label>Address</label>
                        <input class="form-control" name="address" type="text" value="{{ old('address') }}" placeholder="Address" required> @error('address')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                    </div>
                </div>
                <div class="submit-section">
                    <button type="submit" class="btn btn-primary submit-btn"><i class="fa fa-user-plus"></i> Add Patient</button>
                </div>
            </form>
            <!-- /Profile Settings Form -->
            
        </div>
    </div>
</div>
<!-- /Page Wrapper -->
@endsection