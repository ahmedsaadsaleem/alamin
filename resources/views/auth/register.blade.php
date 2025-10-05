@extends('layouts.auth')
@section('content')
    <div class="register-page">
        <div class="inner d-flex flex-column">
            <div class="card m-4 shadow">
                <div class="card-body">
                    <h2 class="card-title mb-5 text-center">مستخدم جديد</h2>
                    <form method="POST" action="{{route('auth.store')}}" class="needs-validation"  novalidate>
                        @csrf
                        <div class="row g-3">
                            <div class="col-6">
                                <label for="first_name" class="form-label">الاسم الأول</label>
                                <input type="text" id="first_name" class="form-control @error('first_name') is-invalid @else {{old('first_name') ? 'is-valid' : '';}} @enderror" name="first_name" value="{{old('first_name')}}" required />
                                @error('first_name')
                                    <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label for="last_name" class="form-label">الاسم الأخير</label>
                                <input type="text" id="last_name" class="form-control @error('last_name') is-invalid @else {{old('last_name') ? 'is-valid' : '';}} @enderror" name="last_name" value="{{old('last_name')}}" required />
                                @error('last_name')
                                    <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label for="username" class="form-label">اسم المستخدم</label>
                                <input type="text" id="username" class="form-control @error('username') is-invalid @else {{old('username') ? 'is-valid' : '';}} @enderror" name="username" value="{{old('username')}}" required />
                                @error('username')
                                    <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label for="email" class="form-label">البريد الإلكتروني</label>
                                <input type="email" id="email" class="form-control @error('email') is-invalid @else {{old('email') ? 'is-valid' : '';}} @enderror" name="email" value="{{old('email')}}" required />
                                @error('email')
                                    <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label for="phone" class="form-label">التليفون</label>
                                <input type="" id="phone" class="form-control @error('phone') is-invalid @else {{old('phone') ? 'is-valid' : '';}} @enderror" name="phone" value="{{old('phone')}}" required />
                                @error('phone')
                                    <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label for="password" class="form-label">كلمة المرور</label>
                                <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" required />
                                @error('password')
                                    <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label for="password_confirmation" class="form-label">تأكيد كلمة المرور</label>
                                <input type="password" id="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" required />
                                @error('password_confirmation')
                                    <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <input type="hidden" name="group" value="{{$defaultUserGroup}}"/>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">تسجيل</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="text-center">
                <p>لديك حساب بالفعل؟ <span><a href="{{route('auth.login')}}">تسجيل الدخول</a></span></p>
            </div>
        </div>
    </div>
@endsection