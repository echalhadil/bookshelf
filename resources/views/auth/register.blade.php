@extends('layouts.app')

@section('content')
<div id="register" class="container col-10">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-3 mb-5">

            <form method="POST" action="{{ route('register') }}">
                <span class="login100-form-title">
                    Register
                </span>
                @csrf



                <!-- FirstName -->
                <div :class="{'wrap-input100':!errors.has('firstname'),' invalid':errors.has('firstname')}">
                    <input v-model='firstname'  v-validate="'required|min:4'" :class="{'input100':true,' has-val':!emptyf()}" type="text" name="firstname">
                    <span class="focus-input100" data-placeholder="First Name"></span>
                </div>
                <small class=" text-danger text-small uk-text-bolder  " v-show="errors.has('firstname')" >@{{errors.first('firstname')}}</small>
                @error('firstname')
                <small class=" text-danger text-small uk-text-bolder  " >{{$message}}</small>
                @enderror

                <!-- LastName -->
                <div :class="{'wrap-input100':!errors.has('lastname'),' invalid':errors.has('lastname')}">
                    <input v-model='lastname'  v-validate="'required|min:4'" :class="{'input100':true,' has-val':!emptyl()}" type="text" name="lastname">
                    <span class="focus-input100" data-placeholder="Last Name"></span>
                </div>
                <small class=" text-danger text-small uk-text-bolder  " v-show="errors.has('lastname')" >@{{errors.first('lastname')}}</small>
                @error('lastname')
                <small class=" text-danger text-small uk-text-bolder  " >{{$message}}</small>
                @enderror



                <!-- UserName -->
                <div :class="{'wrap-input100':!errors.has('username'),' invalid':errors.has('username')}">
                    <input v-model='username'  v-validate="'required|min:4'" :class="{'input100':true,' has-val':!emptyu()}" type="text" name="username" autocomplete="email">
                    <span class="focus-input100" data-placeholder="UserName"></span>
                </div>
                <small class=" text-danger text-small uk-text-bolder  " v-show="errors.has('username')" >@{{errors.first('username')}}</small>
                @error('username')
                <small class=" text-danger text-small uk-text-bolder  " >{{$message}}</small>
                @enderror

                

                <!-- Email -->
                <div :class="{'wrap-input100':!errors.has('email'),' invalid':errors.has('email')}">
                    <input v-model='email'  v-validate="'required|email'" :class="{'input100':true,' has-val':!emptye()}" type="text" name="email" autocomplete="email">
                    <span class="focus-input100" data-placeholder="Email"></span>
                </div>
                <small class=" text-danger text-small uk-text-bolder  " v-show="errors.has('email')" >@{{errors.first('email')}}</small>
                @error('email')
                <small class=" text-danger text-small uk-text-bolder  " >{{$message}}</small>
                @enderror

                <!-- Password -->
                <div :class="{'wrap-input100':!errors.has('password'),' invalid':errors.has('password')}">
                    <span class="btn-show-pass">
                        <i class="mdi mdi-eye-off"></i>
                    </span>
                    <input v-model='password'  v-validate="'required|min:5|max:30'" :class="{'input100':true,' has-val':!emptyp()}" type="password" name="password" autocomplete="current-password">
                    <span class="focus-input100" data-placeholder="Password"></span>
                </div>
                <small class=" text-danger text-small uk-text-bolder " v-show="errors.has('password')" >@{{errors.first('password')}}</small>
                @error('password')
                <small class=" text-danger text-small uk-text-bolder " >{{$message}}</small>
                @enderror

                <!-- Password Confirm -->
                <div :class="{'wrap-input100':!errors.has('password_confirmation'),' invalid':errors.has('ppassword_confirmation')}">
                    
                    <input v-model='passwordconfirm'  v-validate="'required|same:password'" :class="{'input100':true,' has-val':!emptypc()}" type="password" name="password_confirmation" autocomplete="current-password">
                    <span class="focus-input100" data-placeholder="confirm password"></span>
                </div>
                <small class=" text-danger text-small uk-text-bolder " v-show="errors.has('password_confirmation')" >@{{errors.first('password_confirmation')}}</small>
                @error('password_confirmation')
                <small class=" text-danger text-small uk-text-bolder " >{{$message}}</small>
                @enderror
                

                <div class="container-login100-form-btn">
                    <div class="wrap-login100-form-btn">
                        <div class="login100-form-bgbtn"></div>
                        <button type="submit" :disabled="errors.any()" class="login100-form-btn">
                            Sign Up
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
        el:'#register',
        data:{
            email:'',
            password:'',
            username:'',
            lastname:'',
            firstname:'',
            passwordconfirm:'',
        },
        methods: {
            emptyp:function(){
                if(this.password =='')
                return true;
                else
                return false;

            },emptypc:function(){
                if(this.passwordconfirm =='')
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
            ,
            emptyu:function(){
                if(this.username =='')
                return true;
                else
                return false;

            },
            emptyl:function(){
                if(this.lastname =='')
                return true;
                else
                return false;

            },
            emptyf:function(){
                if(this.firstname =='')
                return true;
                else
                return false;

            }
            
        },
    });
</script>
@endsection
