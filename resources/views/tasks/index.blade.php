@extends('layouts.app')

@section('content')
<div class="container">
    <button id="btn-add" name="btn-add" class="btn btn-raised btn-primary btn-md">Add New Task</button>
    <table class="table">
    <thead>
      <tr>
        <th>Name</th>
        <th>Decription</th>
        <th>Created At</th>
        <th>Edit / Delete</th>
      </tr>
    </thead>
    <tbody>
      @foreach($tasks as $task)
          <tr>
            <td>{{ $task->name }}</td>
            <td>{{ $task->description }}</td>
            <td>{{ $task->created_at->diffForHumans() }}</td>
            <td>
              <button class="task-edit btn btn-warning btn-xs btn-detail open-modal" data-id="{{ $task->id }}" value="{{$task->id}}">Edit</button>
              <button class="task-delete btn btn-danger btn-xs btn-delete" value="{{$task->id}}" data-id="{{ $task->id }}">Delete</button>
            </td>
          </tr>
        @endforeach
     </tbody>
  </table>
  <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title text-center">Task</h4>
          </div>
          <div class="modal-body">
              <form id="frmTasks" name="frmTasks" class="form-horizontal" novalidate="">
                    <div class="form-group error">
                        <label for="inputTask" class="col-sm-3 control-label">Task</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control has-error" id="name" name="name" placeholder="Task" value="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Description</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="description" name="description" placeholder="Description" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Completed ?</label>
                        <div class="col-sm-9">
                            <input check="checked" type="checkbox" id="checkbox" name="confirmed" value="true">
                        </div>
                    </div>
              </form>
          </div>
          <div class="modal-footer">
            <button type="button" id="btn-save" class="btn btn-default" data-dismiss="modal">Save Changes</button>
          </div>
        </div>

      </div>
    </div>
</div>
@endsection
