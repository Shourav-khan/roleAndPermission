
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit History</div>

                    <div class="card-body">

                        <form action="{{route('permission.edit.done',$permission)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Name</label>
                                <input type="text" name="name" value="{{$permission->name}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                            </div>


                            <button type="submit" class="btn btn-outline-success">Edit</button>
                        </form>



                        <div class="mt-3">

                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
