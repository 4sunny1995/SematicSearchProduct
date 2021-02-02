@extends('admin.master')
@section('content')
    <div id="broaders">
        @include('table.broader')
    </div>
    <div id="narrowers">
        @include('table.narrower')
    </div>
    <div id="histories">
        @include('table.history')
    </div>
@endsection