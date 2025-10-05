@extends('layouts.dashboard')
@section('content')
<div class="row">
    <div class="col">
        <div class="card tm-bg-main shadow">
            <div class="card-body">
                <h4 class="card-title mb-4">بيانات المنتج</h4>
                <div>
                    <form method="POST" action="{{route('products.store')}}">
                        @csrf
                        <div class="row mb-3">
                            <label class="col-lg-2 col-md-3 col-form-label" for="model">الطراز</label>
                            <div class="col-lg-5 col-md-7">
                                <select name="model" id="model" class="form-select @error('model') is-invalid @else {{old('model') ? 'is-valid' : '';}} @enderror">
                                    <option selected disabled>اختر طراز</option>
                                    @foreach ($models as $model)
                                    <option value="{{$model->id}}" @selected(old('model') == $model->id)>{{$model->model_name}}</option>
                                    @endforeach
                                </select>                                
                                @error('model')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-lg-2 col-md-3 col-form-label" for="serial_number">رقم السريال</label>
                            <div class="col-lg-5 col-md-7">
                                <input class="form-control @error('serial_number') is-invalid @else {{old('serial_number') ? 'is-valid' : '';}} @enderror" type="text" name="serial_number" id="serial_number" value="{{old('serial_number')}}" />
                                @error('serial_number')
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