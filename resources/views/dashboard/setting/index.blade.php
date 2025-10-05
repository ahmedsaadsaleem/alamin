@extends('layouts.dashboard')
@section('content')
<div class="row g-4">
    @can('viewAny', '\App\Models\User')
    <div class="col-xl-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">
                    <a class="" href="{{route('users.index')}}">
                        <i class="fa-solid fa-user-group fa-fw"></i>
                        <span>المستخدمين</span>
                    </a>
                </h5>
                <p class="card-text">
                    التحكم في المستخدمين
                </p>
            </div>
        </div>
    </div>
    @endcan
    @can('viewAny', '\App\Models\Task')
    <div class="col-xl-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">
                    <a class="" href="{{route('tasks.index')}}">
                        <i class="fa-solid fa-list-check fa-fw"></i>
                        <span>مهام المستخدمين</span>
                    </a>
                </h5>
                <p class="card-text">
                    التحكم في مهام المستخدمين
                </p>
            </div>
        </div>
    </div>
    @endcan
    @can('viewAny', '\App\Models\UserGroup')
    <div class="col-xl-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">
                    <a class="" href="{{route('groups.index')}}">
                        <i class="fa-solid fa-users-rectangle fa-fw"></i>
                        <span>مجموعات المستخدمين</span>
                    </a>
                </h5>
                <p class="card-text">
                    التحكم في مجموعات المستخدمين
                </p>
            </div>
        </div>
    </div>
    @endcan
    @can('viewAny', '\App\Models\Roles')
    <div class="col-xl-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">
                    <a class="" href="{{route('roles.index')}}">
                        <i class="fa-solid fa-user-check fa-fw"></i>
                        <span>الصلاحيات</span>
                    </a>
                </h5>
                <p class="card-text">
                    التحكم في الصلاحيات
                </p>
            </div>
        </div>
    </div>
    @endcan
</div>
@endsection