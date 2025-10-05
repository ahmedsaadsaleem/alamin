@extends('layouts.dashboard')
@section('content')
<div class="row">
    <div class="col">
        <div class="card tm-bg-main shadow">
            <div class="card-header d-flex align-items-center mt-3 bg-transparent border-bottom-0">
                <h4 class="card-title mb-0">بيانات العلامات</h4>
                <div class="control ms-auto">
                    <a href="{{route('brands.create')}}" class="btn btn-primary">
                        <i class="fa-solid fa-square-plus fa-fw"></i>
                        <span>إضافة علامة</span>
                    </a>
                </div>
            </div>
            <div class="card-body">
                @if ($brands->isEmpty())
                <div class="">لا يوجد بيانات لعرضها</div>
                @else
                <div class="table-responsive">
                    <table class="roles table table-hover tm-bg-main">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>اسم العلامة</th>
                                <th>الوصف</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($brands as $brand)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$brand->brand_name ?? 'لا توجد بيانات'}}</td>
                                <td>{{$brand->description ?? 'لا توجد بيانات'}}</td>
                                <td class="text-nowrap d-flex justify-content-end">
                                    <x-buttons.table-info :action="route('brands.show', $brand->id)" />
                                    <x-buttons.table-edit :action="route('brands.edit', $brand->id)" />
                                    <x-buttons.table-delete :name="$brand->brand_name" :action="route('brands.destroy', $brand->id)" />
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