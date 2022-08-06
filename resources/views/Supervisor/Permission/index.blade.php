
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header fw-bold">Permissions</div>


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



                    <div class="d-flex justify-content-center my-2">
                        <a class="btn btn-success " href="{{route('permission.create')}}" role="button">Create Permission</a>
                    </div>

                    <div class="card-body">

                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>

                            </tr>
                            </thead>
                            <tbody>

                            @foreach($permissions as $permission)

                                <tr>

                                    <td>{{$permission->id}}</td>
                                    <td>{{$permission->name}}</td>

                                    <td>

                                        <div class="row">
                                            <div class="col-2">
                                                <a style="text-decoration: none; color: white" class=" btn btn-primary" href="{{route('permission.edit',$permission->id)}}">Edit</a>
                                            </div>
                                            <div class="col-2">
                                                <form action="{{route('permission.delete',$permission)}}" method="POST">

                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="btn btn-danger">Delete</button>

                                                    {{--                                    <a style="text-decoration: none; color: white" class=" btn btn-danger" href="#">Delete</a>--}}
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
