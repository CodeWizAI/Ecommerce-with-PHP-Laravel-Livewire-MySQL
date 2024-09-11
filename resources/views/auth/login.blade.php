{{-- <x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-jet-button class="ml-4">
                    {{ __('Log in') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout> --}}

<x-guest-layout>
    <main>
        <div class="container">
          <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
              <div class="login-form">
                <div class="login-head">
                  Log In To Your account     
                </div>
                <hr>
                <x-jet-validation-errors class="mb-4" />
               <form method="POST" action="{{route('login')}}">
                @csrf
                 <div class="form-group">
                   <label for="email">Email address<span class="text-danger">*</span></label>
                   <input type="email" class="form-control" name="email" placeholder="Enter your email here" :value="old('email')" required autofocus >
                 </div>
                 <div class="form-group">
                   <label for="password">Password<span class="text-danger">*</span></label>
                   <input type="password" class="form-control" name="password" placeholder="Enter password here" required autocomplete="current-password">
                 </div>
                 <div class="form-group">
                   <div class="row">
                     <div class="col">
                       <div class="form-check">
                         <input type="checkbox" class="form-check-input">
                         <label class="form-check-label" name="remember" >Remember Me</label>
                       </div>
                     </div>
                     <div class="col">
                         <label for=""  style="float:right;"><a href="{{route('password.request')}}" name="forget" style=" color: #1a7055;">Forget Password?</a></label>
                     </div>
                   </div>
                 </div>
                 <div class="form-group">
                     <button type="submit" class="btn login-btn btn-block">Login</button>
                     <small for="">New Member? <a href="{{route('register')}}" style="color: #1a7055;">Register Here</a></small>
                 </div>
               </form>
              </div>
            </div>
            <div class="col-md-3"></div>
          </div>
        </div>
     </main>
</x-guest-layout>
