@extends('layouts.dashboard')
@section('content')
<div class="row">
    <div class="col">
        <div class="card tm-bg-main shadow">
            <div class="card-header">
                {{$customerProduct->product->model->model_name.' - '.$customerProduct->product->serial_number}}
            </div>
            <div class="card-body">
                <h4 class="card-title mb-4">بيانات المنتج</h4>
                <div>
                    <div class="row justify-content-between align-items-center g-0 gy-3 mb-1">
                        <div class="col-sm-2">الفئة</div>
                        <div class="col-sm-10 bg-light p-2">{{$customerProduct->product->model->category->category_name ?? 'لا توجد بيانات'}}</div>
                    </div>
                    <div class="row justify-content-between align-items-center g-0 gy-3 mb-1">
                        <div class="col-sm-2">الطراز</div>
                        <div class="col-sm-10 bg-light p-2">{{$customerProduct->product->model->model_name ?? 'لا توجد بيانات'}}</div>
                    </div>
                    <div class="row justify-content-between align-items-center g-0 gy-3 mb-1">
                        <div class="col-sm-2">العلامة التجارية</div>
                        <div class="col-sm-10 bg-light p-2">{{$customerProduct->product->model->brand->brand_name ?? 'لا توجد بيانات'}}</div>
                    </div>
                    <div class="row justify-content-between align-items-center g-0 gy-3 mb-1">
                        <div class="col-sm-2">رقم السريال</div>
                        <div class="col-sm-10 bg-light p-2">{{$customerProduct->product->serial_number ?? 'لا توجد بيانات'}}</div>
                    </div>
                    <div class="row justify-content-between align-items-center g-0 gy-3 mb-1">
                        <div class="col-sm-2">اسم الفرع</div>
                        <div class="col-sm-10 bg-light p-2">{{$customerProduct->branch->branch_name ?? 'لا تتبع لفرع معين'}}</div>
                    </div>
                    <div class="row justify-content-between align-items-center g-0 gy-3 mb-1">
                        <div class="col-sm-2">تاريخ الشراء</div>
                        <div class="col-sm-10 bg-light p-2">{{$customerProduct->purchase_date ?? 'لا توجد بيانات'}}</div>
                    </div>
                    <div class="row justify-content-between align-items-center g-0 gy-3 mb-1">
                        <div class="col-sm-2">نهاية الضمان</div>
                        <div class="col-sm-10 bg-light p-2">{{$customerProduct->end_warranty ?? 'لا توجد بيانات'}}</div>
                    </div>
                    <div class="row justify-content-between align-items-center g-0 gy-3 mb-1">
                        <div class="col-sm-2">تحت الضمان</div>
                        <div class="col-sm-10 bg-light p-2">
                            @if ($customerProduct->warranty === 1)
                                نعم
                            @elseif ($customerProduct->warranty === 0)
                                لا
                            @else
                                غير محدد
                            @endif
                        </div>
                    </div>
                    <div class="d-flex border-top border-secondary mt-3 pt-3">
                        <x-buttons.edit :action="route('customers.products.edit', [$customerProduct->customer->id, $customerProduct->id])" />
                        <x-buttons.delete :name="$customerProduct->product->product_name" :action="route('customers.products.destroy', [$customerProduct->customer->id, $customerProduct->id])" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<x-alerts.popup />
@endsection