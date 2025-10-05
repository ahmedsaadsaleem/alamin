@extends('layouts.dashboard')
@section('content')
<div class="row">
    <div class="col">
        <div class="card tm-bg-main shadow">
            <div class="card-header">
                {{$role->role_name}}
            </div>
            <div class="card-body">
                <h4 class="card-title mb-4">بيانات الصلاحية</h4>
                <div>
                    <div class="row justify-content-between align-items-center g-0 gy-3 mb-1">
                        <div class="col-sm-2">اسم الصلاحية</div>
                        <div class="col-sm-10 bg-light p-2">{{$role->role_name}}</div>
                    </div>
                    <div class="row justify-content-between align-items-center g-0 gy-3 mb-1">
                        <div class="col-sm-2">الصلاحية</div>
                        <div class="col-sm-10 bg-light p-2">{{$role->role}}</div>
                    </div>
                    <div class="row justify-content-between align-items-center g-0 gy-3 mb-1">
                        <div class="col-sm-2">الهدف</div>
                        <div class="col-sm-10 bg-light p-2">{{$role->target}}</div>
                    </div>
                    <div class="row justify-content-between align-items-center g-0 gy-3 mb-1">
                        <div class="col-sm-2">من يمتلكون هذه الصلاحية</div>
                        <div class="col-sm-10 bg-light p-2">
                            @foreach ($role->groups as $group)
                                <div>{{$group->group_name}}</div>
                            @endforeach
                        </div>
                    </div>
                    <div class="d-flex border-top border-secondary mt-3 pt-3">
                        <x-buttons.edit :action="route('roles.edit', $role->id)" />
                        <x-buttons.delete :name="$role->role_name" :action="route('roles.destroy', $role->id)" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<x-alerts.popup />
@endsection