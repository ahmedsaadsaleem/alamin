@extends('layouts.dashboard')
@section('content')
<div class="row">
    <div class="col">
        <div class="card tm-bg-main shadow">
            <div class="card-body">
                <h4 class="card-title mb-4">بيانات المجموعة</h4>
                <div>
                    <form method="POST" action="{{route('groups.store')}}">
                        @csrf
                        <div class="row mb-3">
                            <label  class="col-lg-2 col-md-3 col-form-label" for="group_name">اسم المجموعة</label>
                            <div class="col-lg-5 col-md-7">
                                <input class="form-control @error('group_name') is-invalid @else {{old('group_name') ? 'is-valid' : '';}} @enderror" type="text" name="group_name" id="group_name" value="{{old('group_name')}}" />
                                @error('group_name')
                                    <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <p class="col-lg-2 col-md-3" for="roles">الصلاحيات</p>
                            <div class="col-lg-5 col-md-7">
                                <div class="row">
                                    @foreach ($roles as $role)
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" name="roles[]" id="{{$role->role_name}}" value="{{$role->id}}" />
                                        <label class="form-check-label" for="{{$role->role_name}}">{{$role->role_name}}</label>
                                    </div>
                                    @endforeach
                                </div>
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