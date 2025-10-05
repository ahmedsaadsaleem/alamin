@extends('layouts.dashboard')
@section('content')
<div class="row">
    <div class="col">
        <div class="card tm-bg-main shadow">
            <div class="card-header d-flex align-items-center mt-3 bg-transparent border-bottom-0">
                <h4 class="card-title mb-0">بيانات العملاء</h4>
                <div class="control ms-auto">
                    <a href="{{route('customers.create')}}" class="btn btn-primary">
                        <i class="fa-solid fa-square-plus fa-fw"></i>
                        <span>إضافة عميل</span>
                    </a>
                </div>
            </div>
            <div class="card-body">
                @if ($customers->isEmpty())
                <div class="">لا يوجد بيانات لعرضها</div>
                @else
                <div class="table-responsive">
                    <table class="customers table table-hover tm-bg-main">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>اسم العميل</th>
                                <th>الفرع الرئيسي</th>
                                <th>العنوان</th>
                                <th>تليفون العميل</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($customers as $customer)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td><a href="{{route('customers.show', $customer->id)}}">{{$customer->customer_name ?? 'لا توجد بيانات'}}</a></td>
                                <td>{{$customer->main_branch ?? 'لا توجد بيانات'}}</td>
                                <td class="overflow-hidden">
                                    <div>
                                        {{$customer->address ?? 'لا توجد بيانات'}}
                                    </div>
                                </td>
                                <td>{{$customer->phone ?? 'لا توجد بيانات'}}</td>
                                <td>
                                    <a class="btn btn-success" href="{{route('customers.branches.index', $customer->id)}}">الفروع</a>
                                    <a class="btn btn-success" href="{{route('customers.products.index', $customer->id)}}">المنتجات</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
<x-alerts.popup />
@endsection