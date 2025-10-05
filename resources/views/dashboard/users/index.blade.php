@extends('layouts.dashboard')
@section('content')
<x-alerts.message :type="session('messageType') ?? null" :message="session('message') ?? null" />
<div class="row">
    <div class="col">
        <div class="card tm-bg-main shadow">
            <div class="card-header d-flex align-items-center mt-3 bg-transparent border-bottom-0">
                <h4 class="card-title mb-0">بيانات المستخدمين</h4>
                <div class="control ms-auto">
                    <a href="{{route('users.create')}}" class="btn btn-primary">
                        <i class="fa-solid fa-square-plus fa-fw"></i>
                        <span>إضافة مستخدم</span>
                    </a>
                </div>
            </div>
            <div class="card-body">
                @if ($users->isEmpty())
                <div class="">لا توجد بيانات لعرضها</div>
                @else
                <div class="table-responsive">
                    <table class="customers table table-hover tm-bg-main">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>اسم المستخدم</th>
                                <th>البريد الإلكتروني</th>
                                <th>تليفون المستخدم</th>
                                <th>مجموعة المستخدم</th>
                                <th>حالة المستخدم</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            @if ($user->id === Auth::user()->id)
                                @continue
                            @endif
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$user->first_name . ' ' . $user->last_name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->phone}}</td>
                                <td>{{$user->group->group_name}}</td>
                                <td>
                                    @if ( (bool) $user->active )
                                    <span>نشط</span>
                                    @else
                                    <span>غير نشط</span>
                                    @endif
                                </td>
                                <td>
                                    <x-buttons.table-info :action="route('users.show', $user->id)" />
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