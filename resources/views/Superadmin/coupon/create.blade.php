@extends('Superadmin.utils.master')
@section('title', 'Add Coupon')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 d-flex justify-content-between">
                    <h1>Add Coupon</h1>
                </div>
            </div>
        </div>
    </section>

    @if (session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
    @endif

    @if (session()->has('error'))
    <div class="alert alert-danger">
        {{ session()->get('error') }}
    </div>
    @endif

    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="profilepage_show ">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="col-md-12">
                                    <div class="card card-primary card-outline p-3">
                                        <form class="form-horizontal" action="{{ route('coupon.store') }}" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <label for="inputTitle" class="col-sm-12 control-label">Title</label>
                                                <div class="col-sm-12">
                                                    <input class="form-control @error('title') is-invalid @enderror" placeholder="Enter title" type="text" name="title" value="{{ old('title') }}">
                                                    @error('title')
                                                    <span class="invalid-feedback">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputCouponCode" class="col-sm-12 control-label">Coupon Code</label>
                                                <div class="col-sm-12">
                                                    <input class="form-control @error('coupon_code') is-invalid @enderror" placeholder="Enter coupon code" type="text" name="coupon_code" value="{{ old('coupon_code') }}">
                                                    @error('coupon_code')
                                                    <span class="invalid-feedback">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputExpireDate" class="col-sm-12 control-label">Expire Date</label>
                                                <div class="col-sm-12">
                                                    <input class="form-control @error('expire_date') is-invalid @enderror" placeholder="Enter expire date" type="date" name="expire_date" value="{{ old('expire_date') }}">
                                                    @error('expire_date')
                                                    <span class="invalid-feedback">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputLimit" class="col-sm-12 control-label">Limit</label>
                                                <div class="col-sm-12">
                                                    <input class="form-control @error('limit') is-invalid @enderror" placeholder="Enter limit" type="number" name="limit" value="{{ old('limit') }}">
                                                    @error('limit')
                                                    <span class="invalid-feedback">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputDiscount" class="col-sm-12 control-label">Discount (%)</label>
                                                <div class="col-sm-12">
                                                    <input class="form-control @error('discount') is-invalid @enderror" placeholder="Enter discount" type="number" step="0.01" name="discount" value="{{ old('discount') }}">
                                                    @error('discount')
                                                    <span class="invalid-feedback">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <button type="submit" class="btn btn-primary">Submit</button>
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
