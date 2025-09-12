@extends('Superadmin.utils.master')
@section('title', 'Add banners')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 d-flex justify-content-between">
                    <h1>Add Banners</h1>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>

    @if (session()->has('message'))
    <div class="alert alert-success message">
        {{ session()->get('message') }}
    </div>
    @endif

    @if (session()->has('error'))
    <div class="alert alert-danger error">
        {{ session()->get('error') }}
    </div>
    @endif
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center ">
                <div class="col-md-12">
                    <div class="profilepage_show ">
                        <div class="card-body">
                            <div class="d-flex">

                                <div class="col-md-12">
                                    <div class="card card-primary card-outline p-3">
                                        <form class="form-horizontal" action="{{route('banners.store')}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <!-- <div class="form-group">
                                                <label for="inputName" class="col-sm-12 control-label">Title</label>
                                                <div class="col-sm-12">
                                                    <input class="form-control" placeholder="Enter title" required type="text" name="title" value="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputName" class="col-sm-12 control-label">Description</label>
                                                <div class="col-sm-12">
                                                    <textarea class="summernote" required type="text" name="description"></textarea>
                                                </div>
                                            </div> -->
                                            <div class="form-group">
                                                <label for="inputEmail" class="col-sm-12 control-label">Photo</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="exampleInputFile" name="image" required>
                                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                    </div>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">Upload</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputName" class="col-sm-12 control-label">Status</label>
                                                <select class="custom-select" name="status" required>
                                                    <option value="1">Active</option>
                                                    <option value="0">Inactive</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <button type="submit" class="btn btn-primary btnsign_green toastrDefaultSuccess">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>
@endsection