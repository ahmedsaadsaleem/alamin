@extends('layouts.dashboard')
@section('content')
<div class="row">
    <div class="col">
        <div class="card tm-bg-main shadow">
            <div class="card-header d-flex align-items-center mt-3 bg-transparent border-bottom-0">
                <h4 class="card-title mb-0">بيانات الموظفين</h4>
                <div class="control ms-auto">
                    <a href="{{route('employees.create')}}" class="btn btn-primary">
                        <i class="fa-solid fa-square-plus fa-fw"></i>
                        <span>إضافة موظف</span>
                    </a>
                </div>
            </div>
            <div class="card-body">
                @if ($employees->isEmpty())
                <div class="">لا يوجد بيانات لعرضها</div>
                @else
                <div class="table-responsive">
                    <table class="employees table table-hover tm-bg-main">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>اسم الموظف</th>
                                <th>الوظيفة</th>
                                <th>القسم</th>
                                <th>تليفون الموظف</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($employees as $employee)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$employee->first_name .' '. $employee->last_name ?? 'لا توجد بيانات'}}</td>
                                <td>{{$employee->job_title ?? 'لا توجد بيانات'}}</td>
                                <td>{{$employee->department->department_name ?? 'لا توجد بيانات'}}</td>
                                <td>{{$employee->phone_number ?? 'لا توجد بيانات'}}</td>
                                <td class="text-nowrap d-flex justify-content-end">
                                    <x-buttons.table-info :action="route('employees.show', $employee->id)" />
                                    <x-buttons.table-edit :action="route('employees.edit', $employee->id)" />
                                    <x-buttons.table-delete :name="$employee->first_name .' '. $employee->last_name" :action="route('employees.destroy', $employee->id)" />
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
<x-alerts.popup />
@endsection