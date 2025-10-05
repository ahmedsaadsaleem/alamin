@extends('layouts.dashboard')
@section('content')
<div class="row">
    <div class="col">
        <div class="card tm-bg-main shadow">
            <div class="card-body">
                <h5 class="card-title mb-4">بيانات الموظف</h5>
                <p class="card-text">الحقول المسبوقة بعلامة ( <span class="text-danger">*</span> ) مطلوبة</p>
                <div class="col-xl-6">
                    <form method="POST" action="{{route('employees.update', $employee->id)}}">
                    @method('PUT')
                        @csrf
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <label  class="form-label" for="first_name">الاسم الأول <span class="text-danger">*</span></label>
                                <input class="form-control @error('first_name') is-invalid @else {{old('first_name') ? 'is-valid' : '';}} @enderror" type="text" name="first_name" id="first_name" value="{{old('first_name') ?? $employee->first_name}}" />
                                @error('first_name')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <label  class="form-label" for="last_name">الاسم الثاني <span class="text-danger">*</span></label>
                                <input class="form-control @error('last_name') is-invalid @else {{old('last_name') ? 'is-valid' : '';}} @enderror" type="text" name="last_name" id="last_name" value="{{old('last_name') ?? $employee->last_name}}" />
                                @error('last_name')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <label  class="form-label" for="email">البريد الإلكتروني <span class="text-danger">*</span></label>
                                <input class="form-control @error('email') is-invalid @else {{old('email') ? 'is-valid' : '';}} @enderror" type="email" name="email" id="email" value="{{old('email') ?? $employee->email}}" />
                                @error('email')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <label  class="form-label" for="phone_number">التليفون</label>
                                <input class="form-control @error('phone_number') is-invalid @else {{old('phone_number') ? 'is-valid' : '';}} @enderror" type="text" name="phone_number" id="phone_number" value="{{old('phone_number') ?? $employee->phone_number}}" />
                                @error('phone_number')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <label  class="form-label" for="alamin_code">الكود</label>
                                <input class="form-control @error('alamin_code') is-invalid @else {{old('alamin_code') ? 'is-valid' : '';}} @enderror" type="text" name="alamin_code" id="alamin_code" value="{{old('alamin_code') ?? $employee->alamin_code}}" />
                                @error('alamin_code')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-sm-12">
                                <label  class="form-label" for="hire_date">تاريخ التوظيف <span class="text-danger">*</span></label>
                                <input class="form-control @error('hire_date') is-invalid @else {{old('hire_date') ? 'is-valid' : '';}} @enderror" type="date" name="hire_date" id="hire_date" value="{{old('hire_date') ?? $employee->hire_date}}" />
                                @error('hire_date')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <label  class="form-label" for="job_title">الوظيفة</label>
                                <input class="form-control @error('job_title') is-invalid @else {{old('job_title') ? 'is-valid' : '';}} @enderror" type="text" name="job_title" id="job_title" value="{{old('job_title') ?? $employee->job_title}}" />
                                @error('job_title')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label" for="department">القسم</label>
                                <select name="department" id="department" class="form-select @error('department') is-invalid @else {{old('department') ? 'is-valid' : '';}} @enderror">
                                    <option selected disabled>اختر قسم</option>
                                    @foreach ($departments as $department)
                                    <option value="{{$department->id}}" @selected(old('department') == $department->id || $employee->department_id == $department->id)>{{$department->department_name}}</option>
                                    @endforeach
                                </select>                                
                                @error('department')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label" for="manager">المدير المباشر</label>
                                <select name="manager" id="manager" class="form-select @error('manager') is-invalid @else {{old('manager') ? 'is-valid' : '';}} @enderror">
                                    <option selected disabled>اختر</option>
                                    @foreach ($managers as $manager)
                                    <option value="{{$manager->id}}" @selected(old('manager') == $manager->id || ($employee->manager->id ?? 0) == $manager->id)>{{$manager->first_name.' '.$manager->last_name}}</option>
                                    @endforeach
                                </select>                                
                                @error('manager')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-sm-12">
                                <label  class="form-label" for="address">العنوان</label>
                                <input class="form-control @error('address') is-invalid @else {{old('address') ? 'is-valid' : '';}} @enderror" type="text" name="address" id="address" value="{{old('address') ?? $employee->address}}" />
                                @error('address')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <label  class="form-label" for="city">المدينة</label>
                                <input class="form-control @error('city') is-invalid @else {{old('city') ? 'is-valid' : '';}} @enderror" type="text" name="city" id="city" value="{{old('city') ?? $employee->city}}" />
                                @error('city')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <label  class="form-label" for="state">المحافظة</label>
                                <input class="form-control @error('state') is-invalid @else {{old('state') ? 'is-valid' : '';}} @enderror" type="text" name="state" id="state" value="{{old('state') ?? $employee->state}}" />
                                @error('state')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <label  class="form-label" for="postal_code">الرمز البريدي</label>
                                <input class="form-control @error('postal_code') is-invalid @else {{old('postal_code') ? 'is-valid' : '';}} @enderror" type="text" name="postal_code" id="postal_code" value="{{old('postal_code') ?? $employee->postal_code}}" />
                                @error('postal_code')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <!-- <div class="col-sm-12">
                                <label  class="form-label" for="country">الدولة</label>
                                <input class="form-control @error('country') is-invalid @else {{old('country') ? 'is-valid' : '';}} @enderror" type="text" name="country" id="country" value="{{old('country')}}" />
                                @error('country')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div> -->
                            <div class="col-sm-12">
                                <label  class="form-label" for="country">الدولة</label>        
                                <select name="country" id="country" class="form-select @error('country') is-invalid @else {{old('country') ? 'is-valid' : '';}} @enderror">
                                    <option value="" disabled selected>إختر</option>
                                    @foreach ($countries as $country)
                                    <option value="{{$country->id}}" @selected($employee->country_id === $country->id || old('country') === $country->id )>
                                        {{$country->country_ar.' - '.$country->country_en}}
                                    </option>
                                    @endforeach
                                </select>
                                @error('country')
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