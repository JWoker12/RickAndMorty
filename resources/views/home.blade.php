@extends('layouts.app')

@section('content')
<div class="container text-center">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md">
            <home-component />
        </div>
    </div>
</div>
@endsection
