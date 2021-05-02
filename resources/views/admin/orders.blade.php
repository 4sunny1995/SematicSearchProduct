@extends('admin.master')
@section('content')
    @include('table.orders')
@endsection
@section('vuejs')
    <script src="{{asset('js/ajax/orders.js')}}"></script>
@endsection