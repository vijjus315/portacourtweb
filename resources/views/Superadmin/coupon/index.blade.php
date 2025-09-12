@extends('Superadmin.utils.master')

@section('title', 'Coupons')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 d-flex justify-content-between">
                    <div class="left">
                    Coupons List
                    </div>
                    <a href="{{route('coupon.create')}}" class="btn btn-primary"><i class="fas fa-plus"></i> Add Coupon</a>
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
                                        <th>Title</th>
                                        <th>Coupon code</th>
                                        <th>Expire date</th>
                                        <th>limit</th>
                                        <th>discount</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($coupon as $key=>$val)
                                    <tr>
                                        <td>{{ $key+1}}</td>
                                        <td>{{ $val->title }}</td>
                                        <td>{{ $val->coupon_code }}</td>
                                        <td>{{ $val->expire_date }}</td>
                                        <td>{{ $val->limit }}</td>
                                        <td>{{ $val->discount }}</td>
                                        <td>
                                            <a class="btn btn-info btn-sm" href="{{route('coupon.edit',$val)}}"><i class="fas fa-pencil-alt">
                                                </i> Edit</a>
                                                <a href="{{route('coupon.destroy',$val->id)}}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete?');">
                                                    <i class="fas fa-trash-alt"></i> Delete
                                                </a>
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