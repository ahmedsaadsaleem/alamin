@extends('layouts.dashboard')
@section('content')
<div class="row">
    <div class="col">
        <div class="card tm-bg-main shadow">
            <div class="card-body">
                <h4 class="card-title mb-4">بيانات الصلاحية</h4>
                <div>
                    <form method="POST" action="{{route('roles.store')}}">
                        @csrf
                        <div class="row mb-3">
                            <label  class="col-lg-2 col-md-3 col-form-label" for="role_name">اسم الصلاحية</label>
                            <div class="col-lg-5 col-md-7">
                                <input class="form-control @error('role_name') is-invalid @else {{old('role_name') ? 'is-valid' : '';}} @enderror" type="text" name="role_name" id="role_name" value="{{old('role_name')}}" />
                                @error('role_name')
                                    <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label  class="col-lg-2 col-md-3 col-form-label" for="role">الصلاحية</label>
                            <div class="col-lg-5 col-md-7">
                                <input class="form-control @error('role') is-invalid @else {{old('role') ? 'is-valid' : '';}} @enderror" type="text" name="role" id="role" value="{{old('role')}}" />
                                @error('role')
                                    <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label  class="col-lg-2 col-md-3 col-form-label" for="target">الهدف</label>
                            <div class="col-lg-5 col-md-7">
                                <input class="form-control @error('target') is-invalid @else {{old('target') ? 'is-valid' : '';}} @enderror" type="text" name="target" id="target" value="{{old('target')}}" />
                                @error('target')
                                    <div class="text-danger">{{$message}}</div>
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