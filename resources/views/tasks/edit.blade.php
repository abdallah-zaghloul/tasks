@extends('layouts.app')
<link href="{{ asset('css/tasks.css') }}" rel="stylesheet">
@section('content')
<div class="container">

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

    <h1 class="text-center">Edit Task</h1>
    <br>

    <form action="{{route('tasks.update',$task->id)}}" method="post" dir="ltr">
        @csrf
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label"> Name </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name" value="{{$task->name}}" required>
                @error('name')
                <small class="small-error">{{$message}}</small>
                @enderror
            </div>
        </div>
        <br>


        <div class="form-group row">
            <label for="description" class="col-sm-2 col-form-label"> Description </label>
            <div class="col-sm-10">
                <textarea type="text" class="form-control" id="description" name="description" required>
                    {{$task->description}}
                </textarea>
                @error('description')
                <small class="small-error">{{$message}}</small>
                @enderror
            </div>
        </div>

        <br>
        <div class="form-group row">
            <label for="status" class="col-sm-2 col-form-label"> Status </label>
            <div class="col-sm-10">

                <select class="form-select" id="status" name="status" aria-label="Default select example">
                    @foreach(\App\Enums\TaskStatusEnum::ALL as $status)
                        @if($status === $task->status)
                            <option selected> {{$status}} </option>
                        @else
                            <option value="{{$status}}"> {{$status}} </option>
                        @endif
                    @endforeach
                </select>

                @error('status')
                <small class="small-error">{{$message}}</small>
                @enderror
            </div>
        </div>
        <br>
        <div class="text-center">
        <button type="submit" class="btn btn-success"><i class="fas fa-check"></i> Save </button>
        <button type="reset" class="btn btn-danger"><i class="fas fa-eraser"></i> Reset </button>
        </div>
    </form>
</div>
@endsection
