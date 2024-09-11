{{-- <x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="block">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-jet-button>
                    {{ __('Reset Password') }}
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
                            Reset password
                        </div>
                        <hr>
                        <x-jet-validation-errors class="mb-4" />
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf
                            <input type="hidden" name="token" value="{{ $request->route('token') }}">
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control" name="email"
                                    placeholder="Enter your email here" value="{{$request->email}}" required autofocus>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <label for="password">Password<span style="color: #F31713;">*</span></label>
                                        <input type="password" class="form-control" name="password"
                                            placeholder="Enter password here" required autocomplete="new-password">
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <label for="password_confirmation">Confirm Password<span style="color: #F31713;">*</span></label>
                                        <input type="password" class="form-control"
                                            placeholder="Re-enter password here" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>   
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn login-btn btn-block">Reset Passoword</button>

                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </main>
</x-guest-layout>
