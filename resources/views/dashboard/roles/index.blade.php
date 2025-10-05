@extends('layouts.dashboard')
@section('content')
<div class="row">
    <div class="col">
        <div class="card tm-bg-main shadow">
            <div class="card-header d-flex align-items-center mt-3 bg-transparent border-bottom-0">
                <h4 class="card-title mb-0">بيانات الصلاحيات</h4>
                <div class="control ms-auto">
                    <a href="{{route('roles.create')}}" class="btn btn-primary">
                        <i class="fa-solid fa-square-plus fa-fw"></i>
                        <span>إضافة صلاحية</span>
                    </a>
                </div>
            </div>
            <div class="card-body">
                @if ($roles->isEmpty())
                <div class="">لا يوجد بيانات لعرضها</div>
                @else
                <div class="table-responsive">
                    <table class="roles table table-hover tm-bg-main">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>اسم الصلاحية</th>
                                <th>الصلاحية</th>
                                <th>الهدف</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($roles as $role)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$role->role_name}}</td>
                                <td>{{$role->role}}</td>
                                <td>{{$role->target}}</td>
                                <td class="text-nowrap d-flex justify-content-end">
                                    <x-buttons.table-info :action="route('roles.show', $role->id)" />
                                    <x-buttons.table-edit :action="route('roles.edit', $role->id)" />
                                    <x-buttons.table-delete :name="$role->role_name" :action="route('roles.destroy', $role->id)" />
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