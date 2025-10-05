@extends('layouts.dashboard')
@section('content')
<div class="row">
    <div class="col">
        <div class="card tm-bg-main shadow">
            <div class="card-header">
                {{$user->first_name . ' ' . $user->last_name}}
            </div>
            <div class="card-body">
                <h4 class="card-title mb-4">بيانات المستحدم</h4>
                <div>
                    <div class="row justify-content-between align-items-center g-0 gy-3 mb-1">
                        <div class="col-sm-2">الأسم الأول</div>
                        <div class="col-sm-10 bg-light p-2">{{$user->first_name}}</div>
                    </div>
                    <div class="row justify-content-between align-items-center g-0 gy-3 mb-1">
                        <div class="col-sm-2">الأسم الأخير</div>
                        <div class="col-sm-10 bg-light p-2">{{$user->last_name}}</div>
                    </div>
                    <div class="row justify-content-between align-items-center g-0 gy-3 mb-1">
                        <div class="col-sm-2">اسم المستخدم</div>
                        <div class="col-sm-10 bg-light p-2">{{$user->username}}</div>
                    </div>
                    <div class="row justify-content-between align-items-center g-0 gy-3 mb-1">
                        <div class="col-sm-2">البريد الإلكتروني</div>
                        <div class="col-sm-10 bg-light p-2">{{$user->email}}</div>
                    </div>
                    <div class="row justify-content-between align-items-center g-0 gy-3 mb-1">
                        <div class="col-sm-2">التليفون</div>
                        <div class="col-sm-10 bg-light p-2">{{$user->phone}}</div>
                    </div>
                    <div class="row justify-content-between align-items-center g-0 gy-3 mb-1">
                        <div class="col-sm-2">مجموعة المستخدم</div>
                        <div class="col-sm-10 bg-light p-2">{{$user->group->group_name}}</div>
                    </div>
                    <div class="row justify-content-between align-items-center g-0 gy-3 mb-1">
                        <div class="col-sm-2">حالة المستخدم</div>
                        <div class="col-sm-10 bg-light p-2">
                            @if ( (bool) $user->active )
                            <span>نشط</span>
                            @else
                            <span>غير نشط</span>
                            @endif
                        </div>
                    </div>
                    <div class="row justify-content-between align-items-center g-0 gy-3 mb-1">
                        <div class="col-sm-2">تاريخ إنشاء الحساب</div>
                        <div class="col-sm-10 bg-light p-2">{{$user->created_at}}</div>
                    </div>
                    <div class="row justify-content-between align-items-center g-0 gy-3 mb-1">
                        <div class="col-sm-2">تاريخ اخر تعديل</div>
                        <div class="col-sm-10 bg-light p-2">{{$user->updated_at}}</div>
                    </div>
                    <div class="d-flex border-top border-secondary mt-3 pt-3">
                        <x-buttons.edit :action="route('users.edit', $user->id)" />
                        <x-buttons.delete :name="$user->username" :action="route('users.destroy', $user->id)" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<x-alerts.popup />
@endsection