@extends('layouts.dashboard')
@section('content')
<div class="row">
    <div class="col">
        <div class="card tm-bg-main shadow">
            <div class="card-header d-flex align-items-center mt-3 bg-transparent border-bottom-0">
                <h4 class="card-title mb-0">بيانات الطرازات</h4>
                <div class="control ms-auto">
                    <a href="{{route('models.create')}}" class="btn btn-primary">
                        <i class="fa-solid fa-square-plus fa-fw"></i>
                        <span>إضافة طراز</span>
                    </a>
                </div>
            </div>
            <div class="card-body">
                @if ($models->isEmpty())
                <div class="">لا يوجد بيانات لعرضها</div>
                @else
                <div class="table-responsive">
                    <table class="roles table table-hover tm-bg-main">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>اسم الطراز</th>
                                <th>الفئة</th>
                                <th>العلامة التجارية</th>
                                <th>الوصف</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($models as $model)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$model->model_name}}</td>
                                <td>{{$model->category->category_name}}</td>
                                <td>{{$model->brand->brand_name}}</td>
                                <td>{{$model->description}}</td>
                                <td class="text-nowrap d-flex justify-content-end">
                                    <x-buttons.table-info :action="route('models.show', $model->id)" />
                                    <x-buttons.table-edit :action="route('models.edit', $model->id)" />
                                    <x-buttons.table-delete :name="$model->brand_name" :action="route('models.destroy', $model->id)" />
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div> 
            </div>
            @endif
        </div>
    </div>
</div>
<x-alerts.popup />
@endsection