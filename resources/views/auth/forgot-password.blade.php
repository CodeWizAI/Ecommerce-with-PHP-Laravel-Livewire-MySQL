{{-- <x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="block">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-jet-button>
                    {{ __('Email Password Reset Link') }}
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
                            Forgot password
                        </div>
                        <hr>
                        @if (session('status'))
                            <div class="mb-4 font-medium text-sm text-green-600">
                                {{ session('status') }}
                            </div>
                        @endif

                        
                        <x-jet-validation-errors class="mb-4" />
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control" name="email"
                                    placeholder="Enter your email here" :value="old('email')" required autofocus>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn login-btn btn-block">Email Password Reset Link</button>

                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </main>
</x-guest-layout>
