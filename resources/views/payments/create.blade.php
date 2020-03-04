@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="/payments" method="post">
            @csrf
            <button class="btn btn-primary">
                Make payment
            </button>
        </form>
    </div>
@endsection
