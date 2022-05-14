@extends('layouts.app')
@section('main')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="form">
                    <form action="{{ route('loginAction') }}" method="post">
                        @csrf
                        <input type="email" class="form-control" name="email">
                        <input type="password" class="form-control" name="password">
                        <button type="submit" class="btn btn-info">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
