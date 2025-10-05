@extends('layouts.dashboard')
@section('content')
<div class="row">
    <div class="col">
        <div class="card tm-bg-main shadow">
            <div class="card-body">
                <h4 class="card-title mb-4">بيانات العميل</h4>
                <div>
                    <form method="POST" action="{{route('customers.store')}}">
                        @csrf
                        <div class="row mb-3">
                            <label  class="col-lg-2 col-md-3 col-form-label" for="customer_name">اسم العميل</label>
                            <div class="col-lg-5 col-md-7">
                                <input class="form-control @error('customer_name') is-invalid @else {{old('customer_name') ? 'is-valid' : '';}} @enderror" type="text" name="customer_name" id="customer_name" value="{{old('customer_name')}}" />
                                @error('customer_name')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label  class="col-lg-2 col-md-3 col-form-label" for="main_branch">الفرع الرئيسي</label>
                            <div class="col-lg-5 col-md-7">
                                <input class="form-control @error('main_branch') is-invalid @else {{old('main_branch') ? 'is-valid' : '';}} @enderror" type="text" name="main_branch" id="main_branch" value="{{old('main_branch')}}" />
                                @error('main_branch')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label  class="col-lg-2 col-md-3 col-form-label" for="address">العنوان</label>
                            <div class="col-lg-5 col-md-7">
                                <input class="form-control @error('address') is-invalid @else {{old('address') ? 'is-valid' : '';}} @enderror" type="text" name="address" id="address" value="{{old('address')}}" />
                                @error('address')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label  class="col-lg-2 col-md-3 col-form-label" for="phone">التليفون</label>
                            <div class="col-lg-5 col-md-7">
                                <input class="form-control @error('phone') is-invalid @else {{old('phone') ? 'is-valid' : '';}} @enderror" type="text" name="phone" id="phone" value="{{old('phone')}}" />
                                @error('phone')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label  class="col-lg-2 col-md-3 col-form-label" for="responsible">ممثل العميل</label>
                            <div class="col-lg-5 col-md-7">
                                <input class="form-control @error('responsible') is-invalid @else {{old('responsible') ? 'is-valid' : '';}} @enderror" type="text" name="responsible" id="responsible" value="{{old('responsible')}}" />
                                @error('responsible')
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