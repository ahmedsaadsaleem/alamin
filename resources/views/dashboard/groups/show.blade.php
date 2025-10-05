@extends('layouts.dashboard')
@section('content')
<div class="row">
    <div class="col">
        <div class="card tm-bg-main shadow">
            <div class="card-header">
                {{$group->group_name}}
            </div>
            <div class="card-body">
                <h4 class="card-title mb-4">بيانات المجموعة</h4>
                <div>
                    <div class="row justify-content-between align-items-center g-0 gy-3 mb-1">
                        <div class="col-sm-2">اسم المجموعة</div>
                        <div class="col-sm-10 bg-light p-2">{{$group->group_name}}</div>
                    </div>
                    <div class="row justify-content-between align-items-top g-0 gy-3 mb-1">
                        <div class="col-sm-2">صلاحيات المجموعة</div>
                        <div class="col-sm-10 bg-light p-2">
                        @if ($group->roles->isEmpty())
                            لا توجد صلاحيات لهذه المجموعة
                        @else
                            @foreach ($group->roles as $role)
                            <div>
                                <a href="{{route('roles.show', $role->id)}}">{{$role->role_name}}</a>
                            </div>
                            @endforeach
                        @endif
                        </div>
                    </div>
                    <div class="row justify-content-between align-items-top g-0 gy-3 mb-1">
                        <div class="col-sm-2">أعضاء المجموعة</div>
                        <div class="col-sm-10 bg-light p-2">
                        @if ($group->users->isEmpty())
                            لا يوجد أعضاء في هذه المجموعة
                        @else
                            @foreach ($group->users as $user)
                                <div>
                                    <a href="{{route('users.show', $user->id)}}">{{$user->username}}</a>
                                </div>
                            @endforeach
                        @endif
                        </div>
                    </div>
                    <div class="d-flex border-top border-secondary mt-3 pt-3">
                        <x-buttons.edit :action="route('groups.edit', $group->id)" />
                        <x-buttons.delete :name="$group->group_name" :action="route('groups.destroy', $group->id)" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<x-alerts.popup />
@endsection