@extends('layouts.dashboard')
@section('content')
<div class="row">
    <div class="col">
        <div class="card tm-bg-main shadow">
            <div class="card-header">
                {{$model->model_name}}
            </div>
            <div class="card-body">
                <h4 class="card-title mb-4">بيانات الطراز</h4>
                <div>
                    <div class="row justify-content-between align-items-center g-0 gy-3 mb-1">
                        <div class="col-sm-2">اسم الطراز</div>
                        <div class="col-sm-10 bg-light p-2">{{$model->model_name}}</div>
                    </div>
                    <div class="row justify-content-between align-items-center g-0 gy-3 mb-1">
                        <div class="col-sm-2">الفئة</div>
                        <div class="col-sm-10 bg-light p-2">{{$model->category->category_name}}</div>
                    </div>
                    <div class="row justify-content-between align-items-center g-0 gy-3 mb-1">
                        <div class="col-sm-2">العلامة التجارية</div>
                        <div class="col-sm-10 bg-light p-2">{{$model->brand->brand_name}}</div>
                    </div>
                    <div class="row justify-content-between align-items-center g-0 gy-3 mb-1">
                        <div class="col-sm-2">الوصف</div>
                        <div class="col-sm-10 bg-light p-2">{{$model->description}}</div>
                    </div>
                    <div class="d-flex border-top border-secondary mt-3 pt-3">
                        <x-buttons.edit :action="route('models.edit', $model->id)" />
                        <x-buttons.delete :name="$model->model_name" :action="route('models.destroy', $model->id)" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<x-alerts.popup />
@endsection