@extends('layouts.dashboard')
@section('content')
<div class="row">
    <div class="col">
        <div class="card tm-bg-main shadow">
            <div class="card-header">
                {{$task->task}}
            </div>
            <div class="card-body">
                <h4 class="card-title mb-4">بيانات المهمة</h4>
                <div>
                    <div class="row justify-content-between align-items-center g-0 gy-3 mb-1">
                        <div class="col-sm-2">اسم المهمة</div>
                        <div class="col-sm-10 bg-light p-2">{{$task->task ?? 'لا توجد بيانات'}}</div>
                    </div>
                    <div class="row justify-content-between align-items-center g-0 gy-3 mb-1">
                        <div class="col-sm-2">الوصف</div>
                        <div class="col-sm-10 bg-light p-2">{{$task->description ?? 'لا توجد بيانات'}}</div>
                    </div>
                    <div class="d-flex border-top border-secondary mt-3 pt-3">
                        <x-buttons.edit :action="route('tasks.edit', $task->id)" />
                        <x-buttons.delete :name="$task->task" :action="route('tasks.destroy', $task->id)" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<x-alerts.popup />
@endsection