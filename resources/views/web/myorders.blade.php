@extends('web.utils.master')

@section('content')
<div id="react-myorders-root"></div>
@endsection

@push('scripts')
<script type="module" src="/resources/js/orders/MyOrders.jsx"></script>
@endpush
