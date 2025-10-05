@extends('layouts.dashboard')
@section('content')
<div class="row">
    <div class="col">
        <div class="card tm-bg-main shadow">
            <div class="card-body">
                <h4 class="card-title mb-4">بيانات القسم</h4>
                <div>
                    <form method="POST" action="{{route('departments.update', $department->id)}}">
                        @method('PUT')
                        @csrf
                        <div class="row mb-3">
                            <label  class="col-lg-2 col-md-3 col-form-label" for="department_name">اسم القسم</label>
                            <div class="col-lg-5 col-md-7">
                                <input class="form-control @error('department_name') is-invalid @else {{old('department_name') ? 'is-valid' : '';}} @enderror" type="text" name="department_name" id="department_name" value="{{old('department_name') ?? $department->department_name}}" />
                                @error('department_name')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label  class="col-lg-2 col-md-3 col-form-label" for="department_code">كود القسم</label>
                            <div class="col-lg-5 col-md-7">
                                <input class="form-control @error('department_code') is-invalid @else {{old('department_code') ? 'is-valid' : '';}} @enderror" type="text" name="department_code" id="department_code" value="{{old('department_code') ?? $department->department_code}}" />
                                @error('department_code')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label  class="col-lg-2 col-md-3 col-form-label" for="manager">مدير القسم</label>
                            <div class="col-lg-5 col-md-7">
                                <select id="manager" name="manager" class="form-select @error('manager') is-invalid @else {{old('manager') ? 'is-valid' : '';}} @enderror">
                                    <option selected disabled>اختر</option>
                                    @foreach ($managers as $manager)
                                        <option value="{{$manager->id}}" @selected(old('manager') === $manager->id || $department->manager_id === $manager->id)>{{$manager->first_name.' '.$manager->last_name}}</option>
                                    @endforeach
                                </select>
                                @error('manager')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label  class="col-lg-2 col-md-3 col-form-label" for="location">موقع القسم</label>
                            <div class="col-lg-5 col-md-7">
                                <input class="form-control @error('location') is-invalid @else {{old('location') ? 'is-valid' : '';}} @enderror" type="text" name="location" id="location" value="{{old('location') ?? $department->location}}" />
                                @error('location')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label  class="col-lg-2 col-md-3 col-form-label" for="phone_number">تليفون القسم</label>
                            <div class="col-lg-5 col-md-7">
                                <input class="form-control @error('phone_number') is-invalid @else {{old('phone_number') ? 'is-valid' : '';}} @enderror" type="text" name="phone_number" id="phone_number" value="{{old('phone_number') ?? $department->phone_number}}" />
                                @error('phone_number')
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