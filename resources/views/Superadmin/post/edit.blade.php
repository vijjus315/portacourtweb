@extends('Superadmin.utils.master')
@section('title', 'Edit Post')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 d-flex justify-content-between">
                    <h1>Edit Post</h1>
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
                                        <form class="form-horizontal" action="{{ route('post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group">
                                                <label for="inputName" class="col-sm-12 control-label">Title</label>
                                                <div class="col-sm-12">
                                                    <input class="form-control" placeholder="Enter title" required type="text" name="title" value="{{$post->title}}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputName" class="col-sm-12 control-label">Author</label>
                                                <div class="col-sm-12">
                                                    <input class="form-control" placeholder="Enter author" required type="text" name="author" value="{{$post->author}}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputName" class="col-sm-12 control-label">Meta Title</label>
                                                <div class="col-sm-12">
                                                    <input class="form-control" placeholder="Enter title" required type="text" name="meta_title"  value="{{$post->meta_title}}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputName" class="col-sm-12 control-label">Meta Description</label>
                                                <div class="col-sm-12">
                                                    <input class="form-control" placeholder="Enter description" required type="text" name="meta_description"  value="{{$post->meta_description}}">
                                                </div>
                                            </div>
                                            <!-- <div class="form-group">
                                                <label for="inputName" class="col-sm-12 control-label">Quote</label>
                                                <div class="col-sm-12">
                                                    <textarea class="summernote" required type="text" name="quote">{{$post->quote}}</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputName" class="col-sm-12 control-label">Summary</label>
                                                <div class="col-sm-12">
                                                    <textarea class="summernote" required type="text" name="summary">{{$post->summary}}</textarea>
                                                </div>
                                            </div> -->

                                            <div class="form-group">
                                                <label for="inputName" class="col-sm-12 control-label">Description</label>
                                                <div class="col-sm-12">
                                                    <textarea class="summernote" required type="text" name="description">{{$post->description}}</textarea>
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
                                                <label for="inputName" class="col-sm-12 control-label">Schema</label>
                                                <div class="col-sm-12">
                                                    <textarea class="form-control" required type="text" name="schema">{{$post->schema}}</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputName" class="col-sm-12 control-label">Slug</label>
                                                <div class="col-sm-12">
                                                    <input class="form-control" placeholder="Enter slug" required type="text" name="slug"  value="{{$post->slug}}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputName" class="col-sm-12 control-label">Status</label>
                                                <select class="custom-select" name="status" required>
                                                    <option value="1" {{$post->status == 1 ? 'selected' : ''}}>Active</option>
                                                    <option value="0" {{$post->status == 0 ? 'selected' : ''}}>Inactive</option>
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