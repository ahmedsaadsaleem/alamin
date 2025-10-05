@extends('layouts.dashboard')
@section('content')
<div class="row">
    <div class="col">
        <div class="card tm-bg-main shadow">
            <div class="card-body">
                <h4 class="card-title mb-4">بيانات الفرع</h4>
                <div>
                    <form method="POST" action="{{route('customers.branches.store', $customer->id)}}">
                        @csrf
                        <div class="row mb-3">
                            <label  class="col-sm-2 col-form-label" for="branch_name">اسم الفرع</label>
                            <div class="col-sm-6">
                                <input class="form-control @error('branch_name') is-invalid @else {{old('branch_name') ? 'is-valid' : '';}} @enderror" type="text" name="branch_name" id="branch_name" value="{{old('branch_name')}}" />
                                @error('branch_name')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label  class="col-sm-2 col-form-label" for="alamin_code">كود الأمين</label>
                            <div class="col-sm-6">
                                <input class="form-control @error('alamin_code') is-invalid @else {{old('alamin_code') ? 'is-valid' : '';}} @enderror" type="text" name="alamin_code" id="alamin_code" value="{{old('alamin_code')}}" />
                                @error('alamin_code')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label  class="col-sm-2 col-form-label" for="address">العنوان</label>
                            <div class="col-sm-6">
                                <input class="form-control @error('address') is-invalid @else {{old('address') ? 'is-valid' : '';}} @enderror" type="text" name="address" id="address" value="{{old('address')}}" />
                                @error('address')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label  class="col-sm-2 col-form-label" for="branch_phone">تليفون الفرع</label>
                            <div class="col-sm-6">
                                <input class="form-control @error('branch_phone') is-invalid @else {{old('branch_phone') ? 'is-valid' : '';}} @enderror" type="text" name="branch_phone" id="branch_phone" value="{{old('branch_phone')}}" />
                                @error('branch_phone')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label  class="col-sm-2 col-form-label" for="branch_emp">ممثل الفرع</label>
                            <div class="col-sm-6">
                                <input class="form-control @error('branch_emp') is-invalid @else {{old('branch_emp') ? 'is-valid' : '';}} @enderror" type="text" name="branch_emp" id="branch_emp" value="{{old('branch_emp')}}" />
                                @error('branch_emp')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label  class="col-sm-2 col-form-label" for="emp_phone">تليفون ممثل الفرع</label>
                            <div class="col-sm-6">
                                <input class="form-control @error('emp_phone') is-invalid @else {{old('emp_phone') ? 'is-valid' : '';}} @enderror" type="text" name="emp_phone" id="emp_phone" value="{{old('emp_phone')}}" />
                                @error('emp_phone')
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