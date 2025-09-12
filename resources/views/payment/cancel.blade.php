@extends('web.utils.master')
@section('content')
<section class="py-5">
    <div class="container">
        <div class="row py-5">
            <div class="col-md-7 mx-auto">
                <div class="pt-0">
                    <div class="text-center">
                    <img src="{{ asset('webassets/img/remove.png') }}" class="img-fluid pb-3" style="width: 100px; height:100px;object-fit:contain;">
                        <h1 class="font-oswald pb-3">Cancel</h1>
                        <a href="{{route('home')}}" class="btn green-btn w-50 box-shadow">Back to Home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection