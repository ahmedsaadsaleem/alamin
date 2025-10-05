@extends('layouts.dashboard')
@section('content')
<div class="row mb-4">
    <div class="col">
        <div class="control ms-auto">
            <a href="{{route('categories.create')}}" class="btn btn-primary">
                <i class="fa-solid fa-square-plus fa-fw"></i>
                <span>إضافة فئة</span>
            </a>
        </div>
    </div>
</div>
<div class="row g-3">
    @if ($categories->isEmpty())
    <div class="col">
        <div class="">لا يوجد بيانات لعرضها</div>
    </div>
    @else
        @foreach ($categories as $category)
        <div class="col-xl-4 mb-4 mb-xl-0">
            <div class="card h-100 tm-bg-main shadow">
                <div class="row">
                    <div class="col-3">
                        <img src="/imgs/4me-icon-product.png" class="category-img card-img-top" alt="...">
                    </div>
                    <div class="col-9 ps-0">
                        <div class="card-body">
                            <h5 class="card-title"> 
                                <a href="{{route('categories.show', $category->id)}}">{{$category->category_name ?? 'لا توجد بيانات'}}</a>
                            </h5>
                            <p class="card-text">{{$category->description ?? 'لا توجد بيانات'}}</p>
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