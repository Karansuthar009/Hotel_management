@extends('frontlayout');
@section('content')
    <div class="container my-4">
        <h3>{{ $service->title }}</h3>
        <p>{{ $service->full_detail }}</p>
    </div>
@endsection
