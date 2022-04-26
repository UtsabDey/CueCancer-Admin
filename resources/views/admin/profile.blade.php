@extends('layouts.master')
@section('title', 'Profile')
@section('content')
<!-- Page Wrapper -->
<div class="page-wrapper">
    <div class="content container-fluid">
        @include('partials.flash')
        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Profile</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Profile</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->
        
        <div class="row">
            <div class="col-md-12">
                <div class="profile-header">
                    <div class="row align-items-center">
                        <div class="col-auto profile-image">
                            <a href="#">
                                <img class="rounded-circle" alt="User Image" src="{{asset('photos/'.$user->image)}}">
                            </a>
                        </div>
                        <div class="col ml-md-n2 profile-user-info">
                            <h4 class="user-name mb-0">{{ $user->name }}</h4>
                            <h6 class="text-muted">{{ $user->email }}</h6>
                            <div class="user-Location"><i class="fa fa-map-marker"></i> &nbsp; {{ $user->address }}</div>
                            <div class="about-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>
                        </div>
                        {{-- <div class="col-auto profile-btn">    
                            <a href="#" class="btn btn-primary">
                                Edit
                            </a>
                        </div> --}}
                    </div>
                </div>
                <div class="profile-menu">
                    <ul class="nav nav-tabs nav-tabs-solid">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#per_details_tab">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#password_tab">Password</a>
                        </li>
                    </ul>
                </div>	
                <div class="tab-content profile-tab-cont">
                    
                    <!-- Personal Details Tab -->
                    <div class="tab-pane fade show active" id="per_details_tab">
                    
                        <!-- Personal Details -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title d-flex justify-content-between">
                                            <span>Personal Details</span> 
                                            <a class="edit-link" data-toggle="modal" href="#edit_personal_details" data-id="{{ $user->id }}"><i class="fa fa-edit mr-1"></i>Edit</a>
                                        </h5>
                                        <div class="row">
                                            <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Name</p>
                                            <p class="col-sm-10">{{ $user->name }}</p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Email ID</p>
                                            <p class="col-sm-10">{{ $user->email }}</p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Mobile</p>
                                            <p class="col-sm-10">{{ $user->mobile }}</p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Blood Group</p>
                                            <p class="col-sm-10">{{ $user->blood_grp }}</p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-2 text-muted text-sm-right mb-0">Address</p>
                                            <p class="col-sm-10 mb-0">{{ $user->address }}<br>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Edit Details Modal -->
                                <div class="modal fade" id="edit_personal_details" aria-hidden="true" role="dialog">
                                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document" >
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Personal Details</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ url('profile/submit') }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="row form-row">
                                                        <div class="col-6">
                                                            <input type="hidden" name="id" value="{{ $user->id }}">
                                                            <div class="form-group">
                                                                <label> Name</label>
                                                                <input type="text" name="name" class="form-control" value="{{ $user->name }}">@error('name')<small class="text-danger">{{ $message }}</small>@enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label>User ID</label>
                                                                    <input type="text" name="user_id" class="form-control" value="{{ $user->user_id }}" readonly>@error('user_id')<small class="text-danger">{{ $message }}</small>@enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label>Email ID</label>
                                                                <input type="email" name="email" class="form-control" value="{{ $user->email }}">
                                                                @error('email')<small class="text-danger">{{ $message }}</small>@enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label>Mobile</label>
                                                                <input type="text" name="mobile"  value="{{ $user->mobile }}" class="form-control">@error('mobile')<small class="text-danger">{{ $message }}</small>@enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                            <label>Address</label>
                                                                <input class="form-control" name="address" type="text" value="{{ $user->address }}" required>@error('address')<small class="text-danger">{{ $message }}</small>@enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                            <label>Blood Group</label>
                                                            <select class="form-control" name="blood_grp" required>
                                                                <option value="{{ $user->blood_grp  }}">{{ $user->blood_grp }}</option>
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
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label>Image</label>
                                                                <input type="file" name="image" class="custom-file-input" id="image">                
                                                                <label class="custom-file-label" for="image">Choose Picture</label>@error('image')<small class="text-danger">{{ $message }}</small>@enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary btn-block">Save Changes</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Edit Details Modal -->
                                
                            </div>

                        
                        </div>
                        <!-- /Personal Details -->

                    </div>
                    <!-- /Personal Details Tab -->
                    
                    <!-- Change Password Tab -->
                    <div id="password_tab" class="tab-pane fade">
                    
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Change Password</h5>
                                <div class="row">
                                    <div class="col-md-10 col-lg-6">
                                        <form action="{{ url('password/update') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $user->id }}">
                                            <div class="form-group">
                                                <label>Old Password</label>
                                                <input type="password" id="myInput1" name="oldpassword" class="form-control" value="" required><input type="checkbox" onclick="showPass1()">Show Password @error('oldpassword')<small class="text-danger">{{ $message }}</small>@enderror
                                            </div>
                                            <div class="form-group">
                                                <label>New Password</label>
                                                <input type="password" id="myInput2" name="password" class="form-control" value="" required><input type="checkbox" onclick="showPass2()">Show Password @error('password')<small class="text-danger">{{ $message }}</small>@enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Confirm Password</label>
                                                <input type="password" id="myInput3" name="cpassword" class="form-control" value="" required><input type="checkbox" onclick="showPass3()">Show Password @error('cpassword')<small class="text-danger">{{ $message }}</small>@enderror
                                            </div>
                                            <button class="btn btn-primary" type="submit">Save Changes</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Change Password Tab -->
                    
                </div>
            </div>
        </div>
    
    </div>			
</div>
<!-- /Page Wrapper -->
@endsection