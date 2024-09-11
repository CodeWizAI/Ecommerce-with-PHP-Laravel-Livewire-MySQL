{{-- <x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
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
                    <div class="register-form">
                        <div class="register-head">
                            Create An Account
                        </div>
                        <hr>
                        <x-jet-validation-errors class="mb-4" />
                        <form method="POST" action="{{route('register')}}">
                            @csrf
                            <div class="form-group">
                                <label for="name">Full Name<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="name"
                                    placeholder="enter your full name here" :value="name" required autofocus autocomplete="name">
                            </div>
                            <div class="form-group">
                                <label for="email">Email address<span class="text-danger">*</span></label>
                                <input type="email" class="form-control" name="email"
                                    placeholder="Enter your email here"  :value="email" required >
                            </div>


                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <label for="password">Password<span class="text-danger">*</span></label>
                                        <input type="password" class="form-control" name="password"
                                            placeholder="Enter password here" required autocomplete="new-password">
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <label for="password">Confirm Password<span class="text-danger">*</span></label>
                                        <input type="password" class="form-control"
                                            placeholder="Re-enter password here" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>   
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn register-btn btn-block">Register</button>
                                <small for="">Already have account? <a href="{{route('login')}}" style="color: #1a7055;">Login Here</a></small>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </main>
</x-guest-layout>