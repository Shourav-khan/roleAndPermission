
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit History</div>

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif


                    @if ($message = Session::get('succes'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    @if ($message = Session::get('no'))
                        <div class="alert alert-danger">
                            <p>{{ $message }}</p>
                        </div>
                    @endif


                    <div class="card-body">

                        <form action="{{route('edit.role',$role)}}" method="POST">
                         @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Name</label>
                                <input type="text" name="name" value="{{$role->name}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                            </div>


                            <button type="submit" class="btn btn-outline-success">Edit</button>
                        </form>

                        <h5 class="fw-bold my-4">Role Permissions</h5>

                        <div class="d-flex justify-content-evenly my-4 mx-2">



                            @if($role->permissions)

                                @foreach($role->permissions as $role_permission)

                                    <form action="{{route('permission.delete.it',[$role_permission->id,$role->id])}}" method="POST">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger">{{$role_permission->name}}</button>


                                    </form>
                                @endforeach

                            @endif
                        </div>



                        <div class="row">
                            <form action="{{route('permission.role',$role->id)}}" method="POST">
                                @csrf

                                <div class="mb-3">
                                    <label for="permission" class="form-label">Permissions</label>
                                    <select id="permission" name="permission" class="form-select" aria-label="Default select example">
                                      @foreach($permissions as $permission)
                                          <option value="{{$permission->name}}">{{$permission->name}}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <button type="submit" class="btn btn-outline-danger">Assign</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
