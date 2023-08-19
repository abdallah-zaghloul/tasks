@extends('layouts.app')
<link href="{{ asset('css/tasks.css') }}" rel="stylesheet">
@section('content')
    <div class="container" dir="ltr">

        @if(session()->has('success'))
        <div class="row justify-content-center">
            <div class="col-md-4">
                    <div class="card-body">
                        <div class="alert alert-success text-center" role="alert" dir="ltr">
                            <h4> {{session()->get('success')}}&nbsp;<i class="fas fa-check-circle"></i> </h4>
                        </div>
                    </div>
            </div>
        </div>
            {{session()->forget('success')}}
        @endif

        <div class="table-responsive task-table-div">
            <table class="table table-sm table-hover text-center">

            <thead class="thead-light">

            <a class="btn btn-dark" href="{{route('tasks.create')}}">
                <i class="fas fa-plus-square"></i> &nbsp; Create Task
            </a>

            <tr>
                <th colspan="7">
                    <h2>
                        <i class="fas fa-layer-group"></i>&nbsp;
                        Tasks
                    </h2>
                </th>
            </tr>
            </thead>

            <thead class="thead-dark">
            <tr>
                <th> Name</th>
                <th> Status</th>
                <th colspan="2" class="task-description"> Description</th>
                <th > Created At</th>
                <th > Updated At</th>
                <th colspan="1"> Actions</th>


            </tr>
            </thead>

            <tbody>

            @foreach($tasks as $task)
                <tr>
                    <td class="task-name">{{$task['name']}}</td>
                    <td class="task-status">{{$task['status']}}</td>
                    <td class="task-description" colspan="2">
                        {{$task['description']}}
                    </td>
                    <td class="task-updated-at">{{$task['created_at']}}</td>
                    <td class="task-created-at">{{$task['updated_at']}}</td>

                    <td class="task-actions">
                        <a href="{{route('tasks.edit', $task['id'])}}" class="btn btn-sm btn-success"><i
                                class="fas fa-pencil-alt"></i> Edit </a>
                        <a href="{{route('tasks.destroy',$task['id'])}}" class="btn btn-sm btn-danger"><i
                                class="fas fa-trash-alt"></i> Delete </a>
                    </td>

                </tr>
            @endforeach
            </tbody>

            <tfoot>
            <tr>
                <td colspan="7" class="task-table-footer text-center">
                    {{$tasks->links()}}
                </td>
            </tr>
            </tfoot>
        </table>
        </div>
    </div>
@endsection
