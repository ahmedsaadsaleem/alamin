@extends('layouts.dashboard')
@section('content')
<div class="row">
    <div class="col">
        <div class="card tm-bg-main shadow">
            <div class="card-header">
                {{$department->department_name}}
            </div>
            <div class="card-body">
                <h4 class="card-title mb-4">بيانات القسم</h4>
                <div>
                    <div class="row justify-content-between align-items-center g-0 gy-3 mb-1">
                        <div class="col-sm-2">اسم القسم</div>
                        <div class="col-sm-10 bg-light p-2">{{$department->department_name ?? 'لا توجد بيانات'}}</div>
                    </div>
                    <div class="row justify-content-between align-items-center g-0 gy-3 mb-1">
                        <div class="col-sm-2">كود القسم</div>
                        <div class="col-sm-10 bg-light p-2">{{$department->department_code ?? 'لا توجد بيانات'}}</div>
                    </div>
                    <div class="row justify-content-between align-items-center g-0 gy-3 mb-1">
                        <div class="col-sm-2">مدير القسم</div>
                        @if ($department->manager)
                        <div class="col-sm-10 bg-light p-2">{{$department->manager->first_name.' '.$department->manager->last_name ?? 'لا توجد بيانات'}}</div>
                        @else
                        <div class="col-sm-10 bg-light p-2">{{'لا توجد بيانات'}}</div>
                        @endif
                    </div>
                    <div class="row justify-content-between align-items-center g-0 gy-3 mb-1">
                        <div class="col-sm-2">موقع القسم</div>
                        <div class="col-sm-10 bg-light p-2">{{$department->location ?? 'لا توجد بيانات'}}</div>
                    </div>
                    <div class="row justify-content-between align-items-center g-0 gy-3 mb-1">
                        <div class="col-sm-2">تليفون القسم</div>
                        <div class="col-sm-10 bg-light p-2">{{$department->phone_number ?? 'لا توجد بيانات'}}</div>
                    </div>
                    <div class="d-flex border-top border-secondary mt-3 pt-3">
                        <x-buttons.edit :action="route('departments.edit', $department->id)" />
                        <x-buttons.delete :name="$department->department_name" :action="route('departments.destroy', $department->id)" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<x-alerts.popup />
@endsection