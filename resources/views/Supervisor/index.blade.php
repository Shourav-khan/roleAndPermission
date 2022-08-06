@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}

                    </div>

                    <a class="btn btn-danger" href="{{route('supervisor.role')}}" role="button">Role</a> <br>
                    <a class="btn btn-success " href="{{route('supervisor.permission')}}" role="button">Permission</a>
                    <a class="btn btn-warning my-4" href="{{route('index.user')}}" role="button">User</a>


                </div>

            </div>

        </div>
    </div>
@endsection
