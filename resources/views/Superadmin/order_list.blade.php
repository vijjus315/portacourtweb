@extends('Superadmin.utils.master')

@section('title', 'Category')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 d-flex justify-content-between">
                    <div class="left">
                        Order List
                    </div>
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
                                        <th>OrderID</th>
                                        <th>Product Name</th>
                                        <th>Price</th>
                                        <th>Qty</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($order as $key=>$val)
                                    <tr>
                                        <td>{{ $key+1}}</td>
                                        <td>#{{ $val->order->order_number }}</td>
                                        <td>{{ $val->product->title }}</td>
                                        <td>{{ $val->price }}</td>
                                        <td>{{ $val->qty }}</td>
                                        <td>
                                        <select name="status" id="status-dropdown-{{ $val->id }}" data-id="{{ $val->id }}">
                                                <option value="1" {{ $val->status == 1 ? 'selected' : '' }}>Placed</option>
                                                <option value="2" {{ $val->status == 2 ? 'selected' : '' }}>Shipping</option>
                                                <option value="3" {{ $val->status == 3 ? 'selected' : '' }}>Out For Delivery</option>
                                                <option value="4" {{ $val->status == 4 ? 'selected' : '' }}>Deliverd</option>
                                                <option value="5" {{ $val->status == 5 ? 'selected' : '' }}>Cancel</option>
                                            </select>
                                        </td>
                                        <td>{{ $val->created_at }}</td>
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
@section('scripts')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
        $(document).ready(function() {
            $('select[name="status"]').on('change', function() {
                var status = $(this).val();
                var id = $(this).data('id');

                $.ajax({
                    url: "{{route('updateStatus')}}",
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: id,
                        status: status
                    },
                    success: function(response) {
                        if (response.success) {
                            toastr.success('Status updated successfully.');
                        } else {
                            toastr.error('Failed to update status.');
                        }
                    },
                    error: function() {
                        toastr.error('An error occurred.');
                    }
                });
            });
        });
    </script>
@endsection