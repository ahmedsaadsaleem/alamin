@extends('layouts.dashboard')
@section('content')
<div class="row">
    <div class="col">
        <div class="card tm-bg-main shadow">
            <div class="card-header">
                {{$employee->first_name.' '.$employee->last_name}}
            </div>
            <div class="card-body">
                <h5 class="card-title mb-4">بيانات الموظف</h5>
                <div>
                    <div class="row justify-content-between align-items-center g-0 gy-3 mb-1">
                        <div class="col-sm-2">اسم الموظف</div>
                        <div class="col-sm-10 bg-light p-2">{{$employee->first_name.' '.$employee->last_name ?? 'لا توجد بيانات'}}</div>
                    </div>
                    <div class="row justify-content-between align-items-center g-0 gy-3 mb-1">
                        <div class="col-sm-2">البريد الإلكتروني</div>
                        <div class="col-sm-10 bg-light p-2">{{$employee->email ?? 'لا توجد بيانات'}}</div>
                    </div>
                    <div class="row justify-content-between align-items-center g-0 gy-3 mb-1">
                        <div class="col-sm-2">التليفون</div>
                        <div class="col-sm-10 bg-light p-2">{{$employee->phone_number ?? 'لا توجد بيانات'}}</div>
                    </div>
                    <div class="row justify-content-between align-items-center g-0 gy-3 mb-1">
                        <div class="col-sm-2">الكود</div>
                        <div class="col-sm-10 bg-light p-2">{{$employee->alamin_code ?? 'لا توجد بيانات'}}</div>
                    </div>
                    <div class="row justify-content-between align-items-center g-0 gy-3 mb-1">
                        <div class="col-sm-2">تاريخ التوظيف</div>
                        <div class="col-sm-10 bg-light p-2">{{$employee->hire_date ?? 'لا توجد بيانات'}}</div>
                    </div>
                    <div class="row justify-content-between align-items-center g-0 gy-3 mb-1">
                        <div class="col-sm-2">الوظيفة</div>
                        <div class="col-sm-10 bg-light p-2">{{$employee->job_title ?? 'لا توجد بيانات'}}</div>
                    </div>
                    <div class="row justify-content-between align-items-center g-0 gy-3 mb-1">
                        <div class="col-sm-2">القسم</div>
                        <div class="col-sm-10 bg-light p-2">{{$employee->department->department_name ?? 'لا توجد بيانات'}}</div>
                    </div>
                    <div class="row justify-content-between align-items-center g-0 gy-3 mb-1">
                        <div class="col-sm-2">المدير المباشر</div>
                        <div class="col-sm-10 bg-light p-2">
                        @if ($employee->manager)
                            {{$employee->manager->first_name.' '.$employee->manager->last_name}}
                        @else
                            {{'لا توجد بيانات'}}
                        @endif
                        </div>
                    </div>
                    <div class="row justify-content-between align-items-center g-0 gy-3 mb-1">
                        <div class="col-sm-2">العنوان</div>
                        <div class="col-sm-10 bg-light p-2">{{$employee->address.' - '.$employee->city.' - '.$employee->state ?? 'لا توجد بيانات'}}</div>
                    </div>
                    <div class="row justify-content-between align-items-center g-0 gy-3 mb-1">
                        <div class="col-sm-2">الدولة</div>
                        <div class="col-sm-10 bg-light p-2">{{$employee->country->country_ar ?? 'لا توجد بيانات'}}</div>
                    </div>
                    <div class="d-flex border-top border-secondary mt-3 pt-3">
                        <button class="btn btn-secondary me-2" onclick="">
                            <i class="fa-solid fa-link fa-fw"></i>
                            <span>ربط بمستخدم</span>
                        </button>
                        <x-buttons.edit :action="route('employees.edit', $employee->id)" />
                        <x-buttons.delete :name="$employee->first_name.' '.$employee->last_name" :action="route('employees.destroy', $employee->id)" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <livewire:employees.link-user :employee="$employee" />
</div>
<x-alerts.popup />
@endsection