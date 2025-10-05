@extends('layouts.dashboard')
@section('content')
<div class="row">
    <div class="col">
        <div class="card tm-bg-main shadow">
            <div class="card-header d-flex align-items-center mt-3 bg-transparent border-bottom-0">
                <h4 class="card-title mb-0">بيانات المهام</h4>
                <div class="control ms-auto">
                    <a href="{{route('tasks.create')}}" class="btn btn-primary">
                        <i class="fa-solid fa-square-plus fa-fw"></i>
                        <span>إضافة مهمة</span>
                    </a>
                </div>
            </div>
            <div class="card-body">
                @if ($tasks->isEmpty())
                <div class="">لا يوجد بيانات لعرضها</div>
                @else
                <div class="table-responsive">
                    <table class="roles table table-hover tm-bg-main">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>المهمة</th>
                                <th>الوصف</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tasks as $task)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$task->task ?? 'لا توجد بيانات'}}</td>
                                <td>{{$task->description ?? 'لا توجد بيانات'}}</td>
                                <td class="text-nowrap d-flex justify-content-end">
                                    <x-buttons.table-info :action="route('tasks.show', $task->id)" />
                                    <x-buttons.table-edit :action="route('tasks.edit', $task->id)" />
                                    <x-buttons.table-delete :name="$task->task" :action="route('tasks.destroy', $task->id)" />
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div> 
            </div>
            @endif
        </div>
    </div>
</div>
<x-alerts.popup />
@endsection