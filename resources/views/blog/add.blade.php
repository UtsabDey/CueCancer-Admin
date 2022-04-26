@extends('layouts.master')
@section('title', 'Add Blog')
@section('content')
<!-- Page Wrapper -->
<div class="page-wrapper">
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">Add Blog</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                        <li class="breadcrumb-item">Blogs</a></li>
                        <li class="breadcrumb-item active">Add Blog</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->
        
        <div class="row">
            <div class="col-sm-12">
                <!-- Main content -->
                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-12">
                                @include('partials.flash')
                                <div class="card">
                                    <div class="card-header">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h3 class="card-title">Create Post</h3>
                                            <a href="{{ url('blog/list') }}" class="btn btn-primary">Go Back to Blog List</a>
                                        </div>
                                    </div>
                                    <div class="card-body p-0">
                                        <div class="row">
                                            <div class="col-12 col-lg-8 offset-lg-2 col-md-8 offset-md-2">
                                                <form action="{{ url('blog/store') }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="card-body">
                                                        {{-- @include('includes.errors') --}}
                                                        <div class="form-group">
                                                            <label for="title"><b>Post title</b></label>
                                                            <input type="name" name="title" value="{{ old('title') }}" maxlength= "100" class="form-control" placeholder="Enter title" required>
                                                            @error('title')
                                                                <small class="text-danger">
                                                                    {{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                        {{-- <div class="form-group">
                                                            <label for="category">Post Category</label>
                                                            
                                                            <select name="category" id="category" class="form-control">
                                                                <option value="" style="display: none" selected>Select Category</option>
                                                                @foreach($categories as $c)
                                                                <option value="{{ $c->id }}"> {{ $c->name }} </option>
                                                                @endforeach
                                                            </select>
                                                        </div> --}}
                                                        <div class="form-group">
                                                            <label for="author"><b>Author</b></label>
                                                            <input type="name" name="author_id" value="{{ session('loggedUser')->user_id }}" class="form-control" readonly>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="image"><b>Image</b></label>
                                                            <div class="custom-file">
                                                                <input type="file" name="image" class="custom-file-input" id="image">
                                                                <label class="custom-file-label" for="image" required>Choose file</label>
                                                                @error('image')
                                                                <small class="text-danger">
                                                                    {{ $message }}</small>
                                                            @enderror
                                                            </div>
                                                        </div>
                                                        {{-- <div class="form-group">
                                                            <label>Choose Post Tags</label>
                                                            <div class=" d-flex flex-wrap">
                                                                @foreach($tags as $tag) 
                                                                <div class="custom-control custom-checkbox" style="margin-right: 20px">
                                                                    <input class="custom-control-input" name="tags[]" type="checkbox" id="tag{{ $tag->id}}" value="{{ $tag->id }}">
                                                                    <label for="tag{{ $tag->id}}" class="custom-control-label">{{ $tag->name }}</label>
                                                                </div>
                                                                @endforeach
                                                            </div>
                                                        </div> --}}
                                                        <div class="form-group">
                                                            <label for="details"><b>Description</b></label>
                                                            <textarea name="details" id="details" rows="4" class="form-control"
                                                                placeholder="Enter Details" required>{{ old('details') }}</textarea>
                                                            @error('details')
                                                                <small class="text-danger">
                                                                    {{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="card-footer">
                                                        <button type="submit" class="btn btn-lg btn-primary">Submit</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Main content -->
            </div>			
        </div>
        
    </div>			
</div>
<!-- /Page Wrapper -->
@endsection