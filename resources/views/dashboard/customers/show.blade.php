@extends('layouts.dashboard')
@section('content')
<div class="row">
    <div class="col">
        <div class="card tm-bg-main shadow">
            <div class="card-header">
                {{$customer->customer_name}}
            </div>
            <div class="card-body">
                <h4 class="card-title mb-4">بيانات العميل</h4>
                <div>
                    <div class="row justify-content-between align-items-center g-0 gy-3 mb-1">
                        <div class="col-sm-2">اسم العميل</div>
                        <div class="col-sm-10 bg-light p-2">{{$customer->customer_name ?? 'لا توجد بيانات'}}</div>
                    </div>
                    <div class="row justify-content-between align-items-center g-0 gy-3 mb-1">
                        <div class="col-sm-2">الفرع الرئيسي</div>
                        <div class="col-sm-10 bg-light p-2">{{$customer->main_branch ?? 'لا توجد بيانات'}}</div>
                    </div>
                    <div class="row justify-content-between align-items-center g-0 gy-3 mb-1">
                        <div class="col-sm-2">العنوان</div>
                        <div class="col-sm-10 bg-light p-2">{{$customer->address ?? 'لا توجد بيانات'}}</div>
                    </div>
                    <div class="row justify-content-between align-items-center g-0 gy-3 mb-1">
                        <div class="col-sm-2">التليفون</div>
                        <div class="col-sm-10 bg-light p-2">{{$customer->phone ?? 'لا توجد بيانات'}}</div>
                    </div>
                    <div class="row justify-content-between align-items-center g-0 gy-3 mb-1">
                        <div class="col-sm-2">ممثل العميل</div>
                        <div class="col-sm-10 bg-light p-2">{{$customer->responsible ?? 'لا توجد بيانات'}}</div>
                    </div>
                    <div class="row justify-content-between align-items-center g-0 gy-3 mb-1">
                        <div class="col-sm-2">فروع العميل</div>
                        <div class="col-sm-10 p-2">
                            <a href="{{route('customers.branches.index', $customer->id)}}" class="btn btn-success px-4">عرض الفروع</a>
                            <a href="{{route('customers.branches.create',$customer->id )}}" class="btn btn-primary ms-4">إضافة فرع</a>
                        </div>
                    </div>
                    <div class="row justify-content-between align-items-center g-0 gy-3 mb-1">
                        <div class="col-sm-2">منتجات الأمين لدى العميل</div>
                        <div class="col-sm-10 p-2">
                            <a href="{{route('customers.products.index', $customer->id)}}" class="btn btn-success px-4">عرض المنتجات</a>
                            <a href="{{route('customers.products.create',$customer->id )}}" class="btn btn-primary ms-4">إضافة منتج</a>
                        </div>
                    </div>
                    <div class="d-flex border-top border-secondary mt-3 pt-3">
                        <x-buttons.edit :action="route('customers.edit', $customer->id)" />
                        <x-buttons.delete :name="$customer->customer_name" :action="route('customers.destroy', $customer->id)" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<x-alerts.popup />
@endsection