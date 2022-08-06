

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">


                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif


                    @if ($message = Session::get('no'))
                        <div class="alert alert-danger">
                            <p>{{ $message }}</p>
                        </div>
                    @endif



                    <div class="card-header">Roles</div>




                    <div class="card-body">

                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>

                            </tr>
                            </thead>
                            <tbody>

                            @foreach($users as $user)

                                <tr>

                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>

                                        <div class="row justify-content-end">
                                            <div class="col-2">
                                                <a style="text-decoration: none; color: white" class=" btn btn-success" href="{{route('show.r.p',$user->id)}}">Roles</a>
                                            </div>

                                            <div class="col-3">
                                                <a style="text-decoration: none; color: white" class=" btn btn-info" href="#">Permissions</a>
                                            </div>

                                            <div class="col-2">
                                                <form action="{{route('user.delete',$user->id)}}" method="POST">

                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="btn btn-danger">Delete</button>


                                                </form>
                                            </div>
                                        </div>




                                    </td>


                                </tr>

                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
