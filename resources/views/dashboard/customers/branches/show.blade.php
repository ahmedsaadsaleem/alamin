@extends('layouts.dashboard')
@section('content')
<div class="row">
    <div class="col">
        <div class="card tm-bg-main shadow">
            <div class="card-header">
                {{$branch->branch_name}}
            </div>
            <div class="card-body">
                <h4 class="card-title mb-4">بيانات الفرع</h4>
                <div>
                    <div class="row justify-content-between align-items-center g-0 gy-3 mb-1">
                        <div class="col-sm-2">اسم الفرع</div>
                        <div class="col-sm-10 bg-light p-2">{{$branch->branch_name ?? 'لا توجد بيانات'}}</div>
                    </div>
                    <div class="row justify-content-between align-items-center g-0 gy-3 mb-1">
                        <div class="col-sm-2">كود الأمين</div>
                        <div class="col-sm-10 bg-light p-2">{{$branch->alamin_code ?? 'لا توجد بيانات'}}</div>
                    </div>
                    <div class="row justify-content-between align-items-center g-0 gy-3 mb-1">
                        <div class="col-sm-2">العنوان</div>
                        <div class="col-sm-10 bg-light p-2">{{$branch->address ?? 'لا توجد بيانات'}}</div>
                    </div>
                    <div class="row justify-content-between align-items-center g-0 gy-3 mb-1">
                        <div class="col-sm-2">التليفون</div>
                        <div class="col-sm-10 bg-light p-2">{{$branch->phone ?? 'لا توجد بيانات'}}</div>
                    </div>
                    <div class="row justify-content-between align-items-center g-0 gy-3 mb-1">
                        <div class="col-sm-2">ممثل الفرع</div>
                        <div class="col-sm-10 bg-light p-2">{{$branch->branch_emp ?? 'لا توجد بيانات'}}</div>
                    </div>
                    <div class="row justify-content-between align-items-center g-0 gy-3 mb-1">
                        <div class="col-sm-2">تليفون ممثل الفرع</div>
                        <div class="col-sm-10 bg-light p-2">{{$branch->emp_phone ?? 'لا توجد بيانات'}}</div>
                    </div>
                    <div class="row justify-content-between align-items-center g-0 gy-3 mb-1">
                        <div class="col-sm-2">منتجات الأمين لدى الفرع</div>
                        <div class="col-sm-10 bg-light p-2">
                            @if ($branch->products->isEmpty())
                                لا توجد بيانات
                            @else
                                @foreach ($branch->products as $customerProduct)
                                <div>
                                    {{$customerProduct->product->productName()}}
                                </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="d-flex border-top border-secondary mt-3 pt-3">
                        <x-buttons.edit :action="route('branches.edit', $branch->id)" />
                        <x-buttons.delete :name="$branch->branch_name" :action="route('branches.destroy', $branch->id)" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<x-alerts.popup />
@endsection