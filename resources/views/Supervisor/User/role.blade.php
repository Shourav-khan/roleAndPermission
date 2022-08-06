

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



                        <h5 class="fw-bolder my-4 btn btn-info fs-2 d-flex justify-content-center text-white">User Role & Permission</h5>

                        <div class="fs-4 d-flex justify-content-center fw-bold">
                           {{$user->name}}
                        </div>
                        <div class="fs-5 d-flex justify-content-center">
                            {{$user->email}}
                        </div>


                        <div class="bg-secondary my-4 rounded-3">
                           <div class="fs-3 mx-2 d-flex justify-content-center text-white fw-bold">Role</div>
                            <div class="my-4 d-flex justify-content-evenly pb-2">


                                @if($user->roles)
                                    @foreach($user->roles as $role)

                                        <form action="{{route('user.role.revoke',[$user->id,$role->id])}}" method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger">{{$role->name}}</button>

                                        </form>
                                    @endforeach
                                @endif

                            </div>

                                    <div class="row">
                                        <form action="{{route('role.add',$user)}}" method="POST">
                                            @csrf

                                            <div class="mb-3">
                                                <label for="role" class="form-label">Roles</label>
                                                <select id="role" name="role" class="form-select" aria-label="Default select example">
                                                    @foreach($roles as $role)
                                                        <option value="{{$role->name}}">{{$role->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <button type="submit" class="btn btn-warning mx-2 mb-2">Assign Role</button>
                                        </form>
                                     </div>
                    </div>


                        <div class="bg-black my-4 rounded-3">
                            <div class="fs-3 mx-2 d-flex justify-content-center text-white fw-bold">Permissions</div>
                            <div class="my-4 d-flex justify-content-evenly pb-2">


                                @if($user->permissions)
                                    @foreach($user->permissions as $permission)

                                        <form action="{{route('user.permission.delete',[$permission->id,$user->id])}}" method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger">{{$permission->name}}</button>

                                        </form>
                                    @endforeach
                                @endif

                            </div>

                            <div class="row">
                                <form action="{{route('add.permission',$user)}}" method="POST">
                                    @csrf

                                    <div class="mb-3">
                                        <label for="permission" class="form-label text-white">Permission</label>
                                        <select id="permission" name="permission" class="form-select" aria-label="Default select example">
                                            @foreach($permissions as $permission)
                                                <option value="{{$permission->name}}">{{$permission->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-warning text-white mx-2 mb-2">Assign Permission</button>
                                </form>
                            </div>
                        </div>


                </div>
            </div>
        </div>
    </div>
@endsection
