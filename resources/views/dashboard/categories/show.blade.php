@extends('layouts.dashboard')
@section('content')
<div class="row">
    <div class="col">
        <div class="card tm-bg-main shadow">
            <div class="card-header">
                {{$category->category_name}}
            </div>
            <div class="card-body">
                <h4 class="card-title mb-4">بيانات الفئة</h4>
                <div>
                    <div class="row justify-content-between align-items-center g-0 gy-3 mb-1">
                        <div class="col-sm-2">اسم الفئة</div>
                        <div class="col-sm-10 bg-light p-2">{{$category->category_name ?? 'لا توجد بيانات'}}</div>
                    </div>
                    <div class="row justify-content-between align-items-center g-0 gy-3 mb-1">
                        <div class="col-sm-2">الوصف</div>
                        <div class="col-sm-10 bg-light p-2">{{$category->description ?? 'لا توجد بيانات'}}</div>
                    </div>
                    <div class="row justify-content-between align-items-center g-0 gy-3 mb-1">
                        <div class="col-sm-2">الطرازات التابعة للفئة</div>
                        <div class="col-sm-10 bg-light p-2">
                        @if ($category->models->isEmpty())
                            لا يوجد طرازات تابعة لهذه الفئة
                        @else
                            @foreach ($category->models as $model)
                            <div>
                                {{$model->model_name}}
                            </div>
                            @endforeach
                        @endif
                        </div>
                    </div>
                    <div class="d-flex border-top border-secondary mt-3 pt-3">
                        <x-buttons.edit :action="route('categories.edit', $category->id)" />
                        <x-buttons.delete :name="$category->category_name" :action="route('categories.destroy', $category->id)" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<x-alerts.popup />
@endsection