@extends('layouts.dashboard')
@section('content')
<div class="row">
    <div class="col">
        <div class="card tm-bg-main shadow">
            <div class="card-body">
                <h4 class="card-title mb-4">بيانات المنتج</h4>
                <div>
                    <form method="POST" action="{{route('customers.products.store', $customer->id)}}">
                        @csrf
                        <div class="row mb-3">
                            <label class="col-lg-2 col-md-3 col-form-label" for="product">المنتج</label>
                            <div class="col-lg-5 col-md-7">
                                <select name="product" id="product" class="form-select @error('product') is-invalid @else {{old('product') ? 'is-valid' : '';}} @enderror">
                                    <option selected disabled>اختر منتج</option>
                                    @foreach ($products as $product)
                                    <option value="{{$product->id}}" @selected(old('product') == $product->id)>{{$product->model->model_name}} - {{$product->serial_number}}</option>
                                    @endforeach
                                </select>                                
                                @error('product')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-lg-2 col-md-3 col-form-label" for="branch">الفرع</label>
                            <div class="col-lg-5 col-md-7">
                                <select name="branch" id="branch" class="form-select @error('branch') is-invalid @else {{old('branch') ? 'is-valid' : '';}} @enderror">
                                    <option selected disabled>اختر فرع</option>
                                    @foreach ($branches as $branch)
                                    <option value="{{$branch->id}}" @selected(old('branch') == $branch->id)>{{$branch->branch_name}}</option>
                                    @endforeach
                                </select>                                
                                @error('branch')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-lg-2 col-md-3 col-form-label" for="purchase_date">تاريخ الشراء</label>
                            <div class="col-sm-3">
                                <input class="form-control @error('purchase_date') is-invalid @else {{old('purchase_date') ? 'is-valid' : '';}} @enderror" type="date" name="purchase_date" id="purchase_date" value="{{old('purchase_date')}}" />
                                @error('purchase_date')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-5 col-md-7">
                                <input class="form-check-input" type="checkbox" name="warranty" id="warranty" value="1" @checked(old('warranty') == 1) />
                                <label class="form-check-label" for="warranty">تحت الضمان</label>
                                @error('warranty')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-lg-2 col-md-3 col-form-label" for="end_warranty">نهاية الضمان</label>
                            <div class="col-sm-3">
                                <input class="form-control @error('end_warranty') is-invalid @else {{old('end_warranty') ? 'is-valid' : '';}} @enderror" type="date" name="end_warranty" id="end_warranty" value="{{old('end_warranty')}}" />
                                @error('end_warranty')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <input class="btn btn-primary mt-3" type="submit" value="حفظ">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection