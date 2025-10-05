@extends('layouts.dashboard')
@section('content')
<div class="row">
    <div class="col">
        <div class="card tm-bg-main shadow">
            <div class="card-header d-flex align-items-center mt-3 bg-transparent border-bottom-0">
                <h4 class="card-title mb-0">بيانات المنتجات</h4>
                <div class="control ms-auto">
                    <a href="{{route('customers.products.create', $customer->id)}}" class="btn btn-primary">
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
                                <th>رقم السريال</th>
                                <th>الفرع</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$product->product->model->category->category_name}}</td>
                                <td>{{$product->product->model->model_name}}</td>
                                <td>{{$product->product->serial_number}}</td>
                                <td>{{$product->branch->branch_name ?? 'ليس تابع لفرع'}}</td>
                                <td class="text-nowrap d-flex justify-content-end">
                                    <x-buttons.table-info :action="route('customers.products.show', [$product->customer->id, $product->id])" />
                                    <x-buttons.table-edit :action="route('customers.products.edit', [$product->customer->id, $product->id])" />
                                    <x-buttons.table-delete :name="$product->product->brand_name" :action="route('customers.products.destroy',[$product->customer_id, $product->id])" />
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