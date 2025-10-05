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
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>اسم الفرع</th>
                                <th>كود الأمين</th>
                                <th>العنوان</th>
                                <th>تليفون الفرع</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($branches as $branch)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$branch->branch_name ?? 'لا توجد بيانات'}}</td>
                                <td>{{$branch->alamin_code ?? 'لا توجد بيانات'}}</td>
                                <td>{{$branch->address ?? 'لا توجد بيانات'}}</td>
                                <td>{{$branch->phone ?? 'لا توجد بيانات'}}</td>
                                <td class="text-nowrap d-flex justify-content-end">
                                    <x-buttons.table-info :action="route('branches.show', $branch->id)" />
                                    <x-buttons.table-edit :action="route('branches.edit', $branch->id)" />
                                    <x-buttons.table-delete :name="$branch->branche_name" :action="route('branches.destroy', $branch->id)" />
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