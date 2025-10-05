@extends('layouts.dashboard')
@section('content')
<div class="row mb-3">
    <div class="col">
        <div class="control ms-auto">
            <a href="{{route('groups.create')}}" class="btn btn-primary">
                <i class="fa-solid fa-square-plus fa-fw"></i>
                <span>إضافة مجموعة</span>
            </a>
        </div>
    </div>
</div>
<div class="row">
    @if ($groups->isEmpty())
    <div class="col">
        <p>لا يوجد بيانات لعرضها</p>
    </div>
    @else
        @foreach ($groups as $group)
        <div class="col-lg-6 g-4">
            <div class="card tm-bg-main shadow">
                <div class="row">
                    <div class="col-auto d-flex align-items-center ps-4">
                        <i class="fa-solid fa-user-group fs-3 text-primary"></i>
                    </div>
                    <div class="col d-flex align-items-center">
                        <div class="card-body">
                            <h5 class="card-title mb-0">
                                <a href="{{route('groups.show', $group->id)}}">{{$group->group_name}}</a>
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    @endif
</div>
<x-alerts.popup />
@endsection