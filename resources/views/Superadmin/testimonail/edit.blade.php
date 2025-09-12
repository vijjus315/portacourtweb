@extends('Superadmin.utils.master')
@section('title', 'Edit Testimonail')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 d-flex justify-content-between">
                    <h1>Edit Testimonail</h1>
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
                                        <form class="form-horizontal" action="{{ route('testimonail.update', $testimonail->id) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group">
                                                <label for="inputName" class="col-sm-12 control-label">Title</label>
                                                <div class="col-sm-12">
                                                    <input class="form-control" placeholder="Enter name" required type="text" name="name" value="{{$testimonail->name}}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputName" class="col-sm-12 control-label">Designation</label>
                                                <div class="col-sm-12">
                                                    <input class="form-control" placeholder="Enter designation" required type="text" name="designation" value="{{$testimonail->designation}}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputName" class="col-sm-12 control-label">Description</label>
                                                <div class="col-sm-12">
                                                    <textarea class="summernote" required type="text" name="description"><?php echo $testimonail->description; ?></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputEmail" class="col-sm-12 control-label">Photo</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="exampleInputFile" name="image">
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
                                                    <option value="1" {{$testimonail->status == 1 ? 'selected' : ''}}>Active</option>
                                                    <option value="0" {{$testimonail->status == 0 ? 'selected' : ''}}>Inactive</option>
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