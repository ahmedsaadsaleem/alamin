@extends('layouts.dashboard')
@section('content')
<div class="row">
    <div class="col">
        <div class="card tm-bg-main shadow">
            <div class="card-body">
                <h4 class="card-title mb-4">بيانات المهمة</h4>
                <div>
                    <form method="POST" action="{{route('tasks.update', $task)}}">
                        @method('PUT')
                        @csrf
                        <div class="row mb-3">
                            <label  class="col-lg-2 col-md-3 col-form-label" for="task">المهمة</label>
                            <div class="col-lg-5 col-md-7">
                                <input class="form-control @error('task') is-invalid @else {{old('task') ? 'is-valid' : '';}} @enderror" type="text" name="task" id="task" value="{{old('task') ?? $task->task}}" />
                                @error('task')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label  class="col-lg-2 col-md-3 col-form-label" for="description">الوصف</label>
                            <div class="col-lg-5 col-md-7">
                                <textarea name="description" class="form-control @error('description') is-invalid @else {{old('description') ? 'is-valid' : '';}} @enderror" id="description" cols="30" rows="5" style="resize: none;">{{old('description') ?? $task->description}}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <input class="btn btn-primary mt-3" type="submit" value="حفظ">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection