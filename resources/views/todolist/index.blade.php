@extends('layouts.app')

@section('content')
<div class="container">
    <div class="text-right pull-right mt-3 mb-2">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Create Workspace
        </button>    
    </div>
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
            <th scope="col">No</th>
            <th scope="col">Workspace</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($todolists as $key => $todolist)
            <tr>
                <th scope="row">{{++$key}}</th>
                <td>{{$todolist->name}}</td>
                <td><a href="{{route('todo.index', $todolist->id)}}">View</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Workspace</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('todolists.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Workspace</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter workspace">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
