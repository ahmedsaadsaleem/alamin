@extends('layouts.dashboard')
@section('content')
<div class="row">
    <div class="col">
        <div class="card tm-bg-main shadow">
            <div class="card-body">
                <h4 class="card-title mb-4">بيانات المستحدم</h4>
                <div class="col-sm-6">
                    <form method="POST" action="{{route('users.update', $user->id)}}" class="needs-validation"  novalidate>
                        @method('PUT')
                        @csrf
                        <div class="row g-3">
                            <div class="col-6">
                                <label for="first_name" class="form-label">الاسم الأول</label>
                                <input type="text" id="first_name" class="form-control @error('first_name') is-invalid @else {{old('first_name') ? 'is-valid' : '';}} @enderror" name="first_name" value="{{old('first_name') ?? $user->first_name}}" required />
                                @error('first_name')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label for="last_name" class="form-label">الاسم الأخير</label>
                                <input type="text" id="last_name" class="form-control @error('last_name') is-invalid @else {{old('last_name') ? 'is-valid' : '';}} @enderror" name="last_name" value="{{old('last_name') ?? $user->last_name}}" required />
                                @error('last_name')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label for="username" class="form-label">اسم المستخدم</label>
                                <input type="text" id="username" class="form-control @error('username') is-invalid @else {{old('username') ? 'is-valid' : '';}} @enderror" name="username" value="{{old('username') ?? $user->username}}" required />
                                @error('username')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label for="email" class="form-label">البريد الإلكتروني</label>
                                <input type="email" id="email" class="form-control @error('email') is-invalid @else {{old('email') ? 'is-valid' : '';}} @enderror" name="email" value="{{old('email') ?? $user->email}}" required />
                                @error('email')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label for="phone" class="form-label">التليفون</label>
                                <input type="" id="phone" class="form-control @error('phone') is-invalid @else {{old('phone') ? 'is-valid' : '';}} @enderror" name="phone" value="{{old('phone') ?? $user->phone}}" required />
                                @error('phone')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label for="group" class="form-label">مجموعة المستخدم</label>
                                <select name="group" id="group" class="form-select @error('group') is-invalid @else {{old('group') ? 'is-valid' : '';}} @enderror">
                                    <option selected disabled>اختر مجموعة</option>
                                    @foreach ($groups as $group)
                                    <option value="{{$group->id}}" @selected((old('group') == $group->id) || $user->group_id == $group->id)>{{$group->group_name}}</option>
                                    @endforeach
                                </select>
                                @error('group')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <!-- <div class="col-12">
                                <label for="password" class="form-label">كلمة المرور</label>
                                <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" required />
                                @error('password')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label for="password_confirmation" class="form-label">تأكيد كلمة المرور</label>
                                <input type="password" id="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" required />
                                @error('password_confirmation')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div> -->
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">حفظ</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection