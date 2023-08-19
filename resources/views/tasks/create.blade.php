@extends('layouts.app')
<link href="{{ asset('css/tasks.css') }}" rel="stylesheet">
@section('content')
<div class="container">

    <h1 class="text-center">Create Task</h1>
    <br>

    <form action="{{route('tasks.store')}}" method="post" dir="ltr">
        @csrf
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label"> Name </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}" required>
                @error('name')
                <small class="small-error">{{$message}}</small>
                @enderror
            </div>
        </div>
        <br>


        <div class="form-group row">
            <label for="description" class="col-sm-2 col-form-label"> Description </label>
            <div class="col-sm-10">
                <textarea type="text" class="form-control" placeholder="write description here" id="description" name="description" required>{{old('description')}}</textarea>
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
                        @if($status === old('status'))
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
