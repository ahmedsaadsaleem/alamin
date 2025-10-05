@extends('layouts.dashboard')
@section('content')
<div class="row">
    <div class="col">
        <div class="card tm-bg-main shadow">
            <div class="card-header d-flex align-items-center mt-3 bg-transparent border-bottom-0">
                <h4 class="card-title mb-0">بيانات الأقسام</h4>
                <div class="control ms-auto">
                    <a href="{{route('departments.create')}}" class="btn btn-primary">
                        <i class="fa-solid fa-square-plus fa-fw"></i>
                        <span>إضافة قسم</span>
                    </a>
                </div>
            </div>
            <div class="card-body">
                @if ($departments->isEmpty())
                <div class="">لا يوجد بيانات لعرضها</div>
                @else
                <div class="table-responsive">
                    <table class="roles table table-hover tm-bg-main">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>اسم القسم</th>
                                <th>المدير المسئول</th>
                                <th>موقع القسم</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($departments as $department)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$department->department_name ?? 'لا توجد بيانات'}}</td>
                                <td>
                                @if ($department->manager)
                                    {{$department->manager->first_name.' '.$department->manager->last_name}}
                                @else
                                    {{'لا توجد بيانات'}}
                                @endif
                                </td>
                                <td>{{$department->location ?? 'لا توجد بيانات'}}</td>
                                <td class="text-nowrap d-flex justify-content-end">
                                    <x-buttons.table-info :action="route('departments.show', $department->id)" />
                                    <x-buttons.table-edit :action="route('departments.edit', $department->id)" />
                                    <x-buttons.table-delete :name="$department->department_name" :action="route('departments.destroy', $department->id)" />
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