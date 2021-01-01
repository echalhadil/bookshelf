@extends('layouts.app')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}

<div id="login" class="col-10 m-auto">
    <div class="col-12 ">
        <div class="col-8 w-100 m-auto">

            <form method="POST" action="{{ route('login') }}">
                <span class="login100-form-title">
                    Login
                </span>
                @csrf

                <div :class="{'wrap-input100':!errors.has('email'),' invalid':errors.has('email')}">
                    <input v-model='email'  v-validate="'required|email'" :class="{'input100':true,' has-val':!emptye()}" type="text" name="email" autocomplete="email">
                    <span class="focus-input100" data-placeholder="Email"></span>
                </div>
                <small class=" text-danger text-small uk-text-bolder  " v-show="errors.has('email')" >@{{errors.first('email')}}</small>

                <div :class="{'wrap-input100':!errors.has('password'),' invalid':errors.has('password')}">
                    <span class="btn-show-pass">
                        <i class="mdi mdi-eye-off"></i>
                    </span>
                    <input v-model='password'  v-validate="'required|min:5|max:30'" :class="{'input100':true,' has-val':!emptyp()}" type="password" name="password" autocomplete="current-password">
                    <span class="focus-input100" data-placeholder="Password"></span>
                </div>
                <small class=" text-danger text-small uk-text-bolder " v-show="errors.has('password')" >@{{errors.first('password')}}</small>

                <div class="container-login100-form-btn">
                    <div class="wrap-login100-form-btn">
                        <div class="login100-form-bgbtn"></div>
                        <button type="submit" :disabled="errors.any()" class="login100-form-btn">
                            Login
                        </button>
                    </div>
                </div>

                

            </form>
        </div>
    </div>
</div>
<script>
    Vue.use(VeeValidate);
    new Vue({
        el:'#login',
        data:{
            email:'',
            password:'',
        },
        methods: {
            emptyp:function(){
                if(this.password =='')
                return true;
                else
                return false;

            },
            emptye:function(){
                if(this.email =='')
                return true;
                else
                return false;

            }
            
        },
    });
</script>
@endsection
