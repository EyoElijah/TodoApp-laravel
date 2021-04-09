@extends('layouts.app')

@section('content')
    <h1 class="text-center my-5">Edit Todos</h1>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">
                        Edit
                    </div>

                    <div class="card-body">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="list-group">
                                @foreach($errors->all() as $error)
                                    <li class="list-group-item">
                                        {{ $error }}
                                    </li> 
                                @endforeach
                            </ul>
                        </div>

                    @endif
                        <form action="/todos/{{ $todo->id }}/update-todos" method="post">
                            @csrf
                            <div class="form-group pb-3">
                                <input type="text" class="form-control" 
                                name="name" 
                                placeholder="Name"
                                value="{{ $todo->name }}">
                            </div>
                            <div class="form-group pb-3">
                                <textarea placeholder="Description" 
                                name="description" 
                                class="form-control" cols="5" rows="5"
                                >{{ $todo->description }}</textarea>
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-success">Update Todo</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection