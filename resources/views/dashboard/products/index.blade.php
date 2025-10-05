@extends('layouts.dashboard')
@section('content')
<div class="row">
    <div class="col">
        <div class="card tm-bg-main shadow">
            <div class="card-header d-flex align-items-center mt-3 bg-transparent border-bottom-0">
                <h4 class="card-title mb-0">بيانات المنتجات</h4>
                <div class="control ms-auto">
                    <a href="{{route('products.create')}}" class="btn btn-primary">
                        <i class="fa-solid fa-square-plus fa-fw"></i>
                        <span>إضافة منتج</span>
                    </a>
                </div>
            </div>
            <div class="card-body">
                @if ($products->isEmpty())
                <div class="">لا يوجد بيانات لعرضها</div>
                @else
                <div class="table-responsive">
                    <table class="roles table table-hover tm-bg-main">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>فئة المنتج</th>
                                <th>طراز المنتج</th>
                                <th>العلامة التجارية</th>
                                <th>رقم السريال</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$product->model->category->category_name ?? 'لا توجد بيانات'}}</td>
                                <td>{{$product->model->model_name ?? 'لا توجد بيانات'}}</td>
                                <td>{{$product->model->brand->brand_name ?? 'لا توجد بيانات'}}</td>
                                <td>{{$product->serial_number ?? 'لا توجد بيانات'}}</td>
                                <td class="text-nowrap d-flex justify-content-end">
                                    <x-buttons.table-info :action="route('products.show', $product->id)" />
                                    <x-buttons.table-edit :action="route('products.edit', $product->id)" />
                                    <x-buttons.table-delete :name="$product->product_name" :action="route('products.destroy', $product->id)" />
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