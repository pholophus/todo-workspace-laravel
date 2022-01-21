@extends('layouts.app')

@section('content')
<div class="container">
    <div class="text-right pull-right mt-3 mb-2">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Create Task
        </button>    
    </div>
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
            <th scope="col">No</th>
            <th scope="col">Task</th>
            <th scope="col">Time</th>
            <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($todos as $key => $todo)
            <tr data-id="{{ $todo->id }}">
                <th scope="row">{{++$key}}</th>
                <td>
                    <span class="name">{{$todo->todo}}</span>
                </td>
                    @if($todo->status == 1)
                        <td>
                            <span>
                                {{ $carbon->longRelativeDiffForHumans($todo->updated_at) }}
                            </span>
                        </td>
                        <td>
                            <buttton href="{{route('todo.update', $todolist->id)}}" class="btn btn-success update-status" value="1">Completed</button>
                        </td>
                    @else
                        <td>
                            <span>
                                {{ \Carbon\Carbon::create($todo->due)->longRelativeDiffForHumans($carbon) }}
                            </span>
                        </td>
                        <td>
                            <buttton href="{{route('todo.update', $todolist->id)}}" class="btn btn-warning update-status" value="0">Not Complete</button>
                        </td>
                    @endif
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Task</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('todo.store', $todolist)}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Task</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter task">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Date</label>
                            <input type="date" name="date" class="form-control" placeholder="Enter date">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Time</label>
                            <input type="time" name="time" class="form-control" placeholder="Enter time">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')

<script>
    $(document).ready(function($){
        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(".update-status").click(function (e) {
            e.preventDefault();

            var ele = $(this);
            var todo = ele.parents("tr").find("td span.name").text();
            var id = ele.parents("tr").attr("data-id");
            var status = ele.attr("value");

            var urlUpdate = "{{ route('todo.update', 'id') }}";

            urlUpdate = urlUpdate.replace('id', id);

            $.ajax({
                url: urlUpdate,
                method: "put",
                data: {
                    status:status,
                    todo: todo
                },
                dataType: 'json',
                success: function (resp) {
                    // console.log("dapat");
                    location.reload(); 
                },
                error: function (data) {
                    var errors = data;
                }
            });
        });
    });
</script>
@endsection
