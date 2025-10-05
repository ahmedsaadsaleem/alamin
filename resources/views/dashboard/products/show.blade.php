@extends('layouts.dashboard')
@section('content')
<div class="row">
    <div class="col">
        <div class="card tm-bg-main shadow">
            <div class="card-header">
                {{$product->model->model_name}} - {{$product->serial_number}}
            </div>
            <div class="card-body">
                <h4 class="card-title mb-4">بيانات المنتج</h4>
                <div>
                    <div class="row justify-content-between align-items-center g-0 gy-3 mb-1">
                        <div class="col-sm-2">الفئة</div>
                        <div class="col-sm-10 bg-light p-2">{{$product->model->category->category_name ?? 'لا توجد بيانات'}}</div>
                    </div>
                    <div class="row justify-content-between align-items-center g-0 gy-3 mb-1">
                        <div class="col-sm-2">الطراز</div>
                        <div class="col-sm-10 bg-light p-2">{{$product->model->model_name ?? 'لا توجد بيانات'}}</div>
                    </div>
                    <div class="row justify-content-between align-items-center g-0 gy-3 mb-1">
                        <div class="col-sm-2">العلامة التجارية</div>
                        <div class="col-sm-10 bg-light p-2">{{$product->model->brand->brand_name ?? 'لا توجد بيانات'}}</div>
                    </div>
                    <div class="row justify-content-between align-items-center g-0 gy-3 mb-1">
                        <div class="col-sm-2">رقم السريال</div>
                        <div class="col-sm-10 bg-light p-2">{{$product->serial_number ?? 'لا توجد بيانات'}}</div>
                    </div>
                    <div class="row justify-content-between align-items-center g-0 gy-3 mb-1">
                        <div class="col-sm-2">تاريخ الشراء</div>
                        <div class="col-sm-10 bg-light p-2">{{$product->purchase_date ?? 'لا توجد بيانات'}}</div>
                    </div>
                    <div class="row justify-content-between align-items-center g-0 gy-3 mb-1">
                        <div class="col-sm-2">نهاية الضمان</div>
                        <div class="col-sm-10 bg-light p-2">{{$product->end_warranty ?? 'لا توجد بيانات'}}</div>
                    </div>
                    <div class="row justify-content-between align-items-center g-0 gy-3 mb-1">
                        <div class="col-sm-2">تحت الضمان</div>
                        <div class="col-sm-10 bg-light p-2">
                            @if ($product->warranty === 1)
                                نعم
                            @elseif ($product->warranty === 0)
                                لا
                            @else
                                غير محدد
                            @endif
                        </div>
                    </div>
                    <div class="row justify-content-between align-items-center g-0 gy-3 mb-1">
                        <div class="col-sm-2">العميل التابع له</div>
                        <div class="col-sm-10 bg-light p-2">
                            {{$product->customerProduct->branch->branch_name ?? $product->customerProduct->customer->customer_name ?? 'لا توجد بيانات'}}
                        </div>
                    </div>
                    <div class="d-flex border-top border-secondary mt-3 pt-3">
                        <x-buttons.edit :action="route('products.edit', $product->id)" />
                        <x-buttons.delete :name="$product->product_name" :action="route('products.destroy', $product->id)" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<x-alerts.popup />
@endsection