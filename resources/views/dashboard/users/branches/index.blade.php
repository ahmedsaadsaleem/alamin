@extends('layouts.dashboard')
@section('content')
<div class="row">
    <div class="col">
        <div class="card tm-bg-main shadow">
            <div class="card-header d-flex align-items-center mt-3 bg-transparent border-bottom-0">
                <h4 class="card-title mb-0">بيانات الفروع</h4>
                <div class="control ms-auto">
                    <a href="{{route('customers.branches.create', $customer->id)}}" class="btn btn-primary">
                        <i class="fa-solid fa-square-plus fa-fw"></i>
                        <span>إضافة فرع</span>
                    </a>
                </div>
            </div>
            <div class="card-body">
                @if ($branches->isEmpty())
                <div class="">لا يوجد بيانات لعرضها</div>
                @else
                <div class="table-responsive">
                    <table class="branches table table-hover tm-bg-main">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>اسم الفرع</th>
                                <th>كود الأمين</th>
                                <th>العنوان</th>
                                <th>تليفون الفرع</th>
                                <th>ممثل الفرع</th>
                                <th>تليفون ممثل الفرع</th>
                                <th>التحكم</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($branches as $branch)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td><a href="{{route('branches.show', $branch->id)}}">{{$branch->branch_name ?? 'لا توجد بيانات'}}</a></td>
                                <td>{{$branch->alamin_code ?? 'لا توجد بيانات'}}</td>
                                <td>{{$branch->address ?? 'لا توجد بيانات'}}</td>
                                <td>{{$branch->phone ?? 'لا توجد بيانات'}}</td>
                                <td>{{$branch->branch_emp ?? 'لا توجد بيانات'}}</td>
                                <td>{{$branch->emp_phone ?? 'لا توجد بيانات'}}</td>
                                <td class="text-nowrap">
                                    <a class="text-dark" href="{{route('branches.edit', $branch->id)}}" title="تعديل">
                                    <i class="fa-regular fa-file-pen fa-fw fw-bold"></i>
                                    </a>
                                    <x-buttons.table-delete>
                                        <x-slot:name>
                                            {{$branch->branche_name}}
                                        </x-slot:name>
                                        <x-slot:action>
                                            {{route('branches.destroy', $branch->id)}}
                                        </x-slot:action>
                                    </x-buttons.table-delete>
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