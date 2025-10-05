@extends('layouts.dashboard')
@section('content')
<div class="row">
    <div class="col">
        <div class="card tm-bg-main shadow">
            <div class="card-header">
                {{$brand->brand_name}}
            </div>
            <div class="card-body">
                <h4 class="card-title mb-4">بيانات العلامة</h4>
                <div>
                    <div class="row justify-content-between align-items-center g-0 gy-3 mb-1">
                        <div class="col-sm-2">اسم العلامة</div>
                        <div class="col-sm-10 bg-light p-2">{{$brand->brand_name ?? 'لا توجد بيانات'}}</div>
                    </div>
                    <div class="row justify-content-between align-items-center g-0 gy-3 mb-1">
                        <div class="col-sm-2">الوصف</div>
                        <div class="col-sm-10 bg-light p-2">{{$brand->description ?? 'لا توجد بيانات'}}</div>
                    </div>
                    <div class="d-flex border-top border-secondary mt-3 pt-3">
                        <x-buttons.edit :action="route('brands.edit', $brand->id)" />
                        <x-buttons.delete :name="$brand->brand_name" :action="route('brands.destroy', $brand->id)" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<x-alerts.popup />
@endsection