@extends('layouts.app')

@section('content')
<form  action="{{route('register')}}" method="POST" enctype="multipart/form-data">
 @csrf
    <div class="col col-12 col-xl-12 col-lg-6 col-md-12 col-sm-12">
        <div class="form-group ">
            <label for="name" class="control-label">عکس</label>
            <input id="name" type="file" class="form-control " name="image" required autocomplete="name" autocomplete="name" >
        </div>
     </div>
     <div class="col col-12 col-xl-12 col-lg-6 col-md-12 col-sm-12">
         <div class="form-group label-floating is-empty">
             <label for="name" class="control-label">نام</label>
             <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autocomplete="name" autofocus>
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
         </div>
     </div>
     <div class="col col-12 col-xl-12 col-lg-6 col-md-6 col-sm-12">
         <div class="form-group label-floating is-empty">
             <label class="control-label " for="email">ایمیل</label>
             <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
         </div>
     </div>
     <div class="col col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
         <div class="form-group label-floating is-empty">
             <label class="control-label" for="password">پسورد</label>
             <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
         </div>
     </div>
     <div style="width: 100%;" class="col col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
         <div class="form-group label-floating is-empty">
            <label class="control-label" for="re_pass">یبار دیگه پسورد وارد کنید</label>
            <input style="width: 100%;" id="re_pass" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

         </div>
     </div>
	</div>
     <div class="form-group ">
         <button style="border: none;" type="submit" class="btn btn-purple btn-lg full-width form-control btn btn-primary">{{ __('Register') }}</button>
	</div>
 </form>
@endsection
