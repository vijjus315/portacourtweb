@extends('Superadmin.utils.master')

@section('title', 'Banners')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 d-flex justify-content-between">
                    <div class="left">
                        Banners List
                    </div>
                    <a href="{{route('banners.create')}}" class="btn btn-primary"><i class="fas fa-plus"></i> Add Banner</a>
                </div>

            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>S.NO.</th>
                                        <!-- <th>Title</th> -->
                                        <th>Photo</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($banners as $key=>$val)
                                    <tr>
                                        <td>{{ $key+1}}</td>
                                        <!-- <td>{{ $val->title }}</td> -->
                                        <td>
                                            <img src="{{ asset('storage/' . $val->image_url) }}" height="100px;" width="150px;">
                                        </td>
                                        <td class="project-state">
                                            @if($val->status == 1)
                                            <span class="badge badge-success">Active</span>
                                            @else
                                            <span class="badge badge-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a class="btn btn-info btn-sm" href="{{route('banners.edit',$val)}}"><i class="fas fa-pencil-alt">
                                                </i> Edit</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

@endsection