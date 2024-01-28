@extends('theme::layouts.app')

@section('content')

<div class="sm:mx-auto sm:w-full sm:max-w-md sm:pt-10 register-blade">
    <h2 class="text-3xl font-md leading-9 text-center text-gray-900 dark:text-white sm:mt-6 lg:text-5xl">
        Register
    </h2>
    <p class="mt-4 text-sm leading-5 text-center text-gray-600 dark:text-gray-400 max-w">
        or, you can
        <a href="{{ route('login') }}" class="font-medium transition duration-150 ease-in-out text-wave-600 hover:text-wave-500 focus:outline-none focus:underline">
            login here
        </a>
    </p>
</div>

<div class="flex flex-col justify-center pb-10 sm:pb-20 sm:px-6 lg:px-8">


    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="px-4 py-8 bg-white dark:bg-brand-800 border shadow border-wave-50 dark:border-wave-700 sm:rounded-lg sm:px-10">
            <form role="form" method="POST" action="@if(setting('billing.card_upfront')){{ route('wave.register-subscribe') }}@else{{ route('register') }}@endif">
                @csrf
                <!-- If we want the user to purchase before they can create an account -->

                <!--<div class="pb-3 sm:border-b sm:border-gray-200">
                        <h3 class="text-lg font-medium leading-6 text-gray-900 dark:text-white">
                            Profile
                        </h3>
                        <p class="max-w-2xl mt-1 text-sm leading-5 text-gray-500 dark:text-gray-400">
                            Information about your account.
                        </p>
                    </div>-->

                @csrf

                <div class="mt-6">
                    <label for="name" class="block text-sm font-medium leading-5 text-gray-700 dark:text-white">
                        Name
                    </label>
                    <div class="mt-1 rounded-md shadow-sm">
                        <input id="name" type="text" name="name" required class="w-full form-input dark:text-white dark:bg-gray-900" value="{{ old('name') }}" @if(!setting('billing.card_upfront')){{ 'autofocus' }}@endif>
                    </div>
                    @if ($errors->has('name'))
                    <div class="mt-1 text-red-500">
                        {{ $errors->first('name') }}
                    </div>
                    @endif
                </div>

                @if(setting('auth.username_in_registration') && setting('auth.username_in_registration') == 'yes')
                <div class="mt-6">
                    <label for="username" class="block text-sm font-medium leading-5 text-gray-700 dark:text-white">
                        Username
                    </label>
                    <div class="mt-1 rounded-md shadow-sm">
                        <input id="username" type="text" name="username" value="{{ old('username') }}" required class="w-full form-input dark:text-white dark:bg-gray-900">
                    </div>
                    @if ($errors->has('username'))
                    <div class="mt-1 text-red-500">
                        {{ $errors->first('username') }}
                    </div>
                    @endif
                </div>
                @endif

                <div class="mt-6">
                    <label for="email" class="block text-sm font-medium leading-5 text-gray-700 dark:text-white">
                        Email Address
                    </label>
                    <div class="mt-1 rounded-md shadow-sm">
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required class="w-full form-input dark:text-white dark:bg-gray-900">
                    </div>
                    @if ($errors->has('email'))
                    <div class="mt-1 text-red-500">
                        {{ $errors->first('email') }}
                    </div>
                    @endif
                </div>

                <div class="mt-6">
                    <label for="password" class="block text-sm font-medium leading-5 text-gray-700 dark:text-white">
                        Password
                    </label>
                    <div class="mt-1 rounded-md shadow-sm">
                        <input id="password" type="password" name="password" required class="w-full form-input dark:text-white dark:bg-gray-900">
                    </div>
                    @if ($errors->has('password'))
                    <div class="mt-1 text-red-500">
                        {{ $errors->first('password') }}
                    </div>
                    @endif
                </div>

                <div class="mt-6">
                    <label for="password_confirmation" class="block text-sm font-medium leading-5 text-gray-700 dark:text-white">
                        Confirm Password
                    </label>
                    <div class="mt-1 rounded-md shadow-sm">
                        <input id="password_confirmation" type="password" name="password_confirmation" required class="w-full form-input dark:text-white dark:bg-gray-900">
                    </div>
                    @if ($errors->has('password_confirmation'))
                    <div class="mt-1 text-red-500">
                        {{ $errors->first('password_confirmation') }}
                    </div>
                    @endif
                </div>

                @if(setting('admin.terms_checkbox_on_checkout'))
                <div class="mt-6 text-white">
                    <p>
                        <input type="checkbox" id="terms_checkbox" class="terms_checkbox" name="terms_checkbox" value="">
                        <label for="terms_checkbox" aria-describedby="label"><span class="ui"></span>By signing up you also accept all listed Terms and the Non-Disclosure-Agreement (NDA) found here: <a href="{{setting('admin.terms_checkbox_on_checkout_url')}}" target="_blank">NDA</a> and <a href="https://brandbuildr.ai/terms-conditions" target="_blank">Terms</a></label>
                    </p>
                </div>
                @endif

                <div class="flex flex-col items-center justify-center text-sm leading-5">
                    <span class="block w-full mt-5 rounded-md shadow-sm">
                        <!-- bg-indigo-600 hover:bg-wave-500 focus:border-wave-700  active:bg-indigo-700-->
                        <button type="submit" class="flex justify-center w-full px-4 py-2 text-sm font-medium text-white transition duration-150 ease-in-out border border-transparent rounded-md bg-wave-500  focus:outline-none focus:shadow-outline-wave" @if(setting('admin.terms_checkbox_on_checkout')) disabled="" @endif>
                            Sign Up
                        </button>
                    </span>
                    <a href="{{ route('login') }}" class="mt-3 font-medium transition duration-150 ease-in-out text-wave-600 hover:text-wave-500 focus:outline-none focus:underline">
                        Already have an account? Login here
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('javascript')
@if(setting('admin.terms_checkbox_on_checkout'))
<script type="text/javascript">
    document.getElementById('terms_checkbox').addEventListener('change', function() {
        var submitButton = document.querySelector('[type="submit"]');

        if (this.checked) {
            submitButton.disabled = false;
            submitButton.classList.add('bg-indigo-600', 'hover:bg-wave-500', 'focus:border-wave-700', 'active:bg-indigo-700');
        } else {
            submitButton.disabled = true;
            submitButton.classList.remove('bg-indigo-600', 'hover:bg-wave-500', 'focus:border-wave-700', 'active:bg-indigo-700');
        }
    });
</script>
@endif
@endsection