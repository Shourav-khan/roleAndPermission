@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Role Create</div>

                    <div class="card-body">


                        <form action="{{route('create.complete')}}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                            </div>


                            <button type="submit" class="btn btn-primary">Add</button>
                        </form>



                    </div>


                </div>

            </div>

        </div>
    </div>
@endsection

