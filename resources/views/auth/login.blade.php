@extends('layouts.app')

@section('content')
<div class="flex min-h-full items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
  <div class="w-full max-w-md space-y-8">
    <div>
      <img class="mx-auto w-1/4" src="{{ asset('components/lower-prices.svg') }}" alt="Lower Prices">
       <h1 class="mt-6 text-center text-4xl font-bold tracking-tight text-greenIndigo-100">Lower Prices</h1>
      <h6 class="mt-6 text-center text-1xl font-bold tracking-tight text-gray-900">Sign in to your account or <a href="#" class="font-medium text-greenIndigo hover:text-indigo-500">Register</a></h6>
    </div>
    <form class="mt-8 space-y-6" action="{{ route('login') }}" method="POST">
        @csrf
      <input type="hidden" name="remember" value="true">
      <div class="-space-y-px rounded-md shadow-sm">
        <div>
          <label for="email-address" class="sr-only">Email address</label>
          <input id="email-address" name="email" type="email" autocomplete="email" required class="relative block w-full appearance-none rounded-none rounded-t-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-greenIndigo focus:outline-none focus:ring-indigo-500 sm:text-sm @error('email') is-invalid @enderror" placeholder="Email address">

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div>
          <label for="password" class="sr-only">Password</label>
          <input id="password" name="password" type="password" autocomplete="current-password" required class="relative block w-full appearance-none rounded-none rounded-b-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-greenIndigo focus:outline-none focus:ring-indigo-500 sm:text-sm @error('password') is-invalid @enderror" placeholder="Password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
      </div>

      <div class="flex items-center justify-between">
        <div class="flex items-center">
          <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 rounded border-gray-300 greenIndigo focus:greenIndigo-500" {{ old('remember') ? 'checked' : '' }}>
          <label for="remember-me" class="ml-2 block text-sm text-gray-900">Remember me</label>
        </div>

        @if (Route::has('password.request'))
            <div class="text-sm">
            <a href="{{ route('password.request') }}" class="font-medium greenIndigo hover:text-greenIndigo-500">Forgot your password?</a>
            </div>
        @endif
      </div>

      <div>
        <button type="submit" class="group relative flex w-full justify-center rounded-md border border-transparent bg-greenIndigo py-2 px-4 text-sm font-medium text-white hover:bg-greenIndigo-500 focus:outline-none focus:ring-2 focus:greenIndigo-500 focus:ring-offset-2">
          <span class="absolute inset-y-0 left-0 flex items-center pl-3">
            <!-- Heroicon name: mini/lock-closed -->
            <svg class="h-5 w-5 text-white-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
              <path fill-rule="evenodd" d="M10 1a4.5 4.5 0 00-4.5 4.5V9H5a2 2 0 00-2 2v6a2 2 0 002 2h10a2 2 0 002-2v-6a2 2 0 00-2-2h-.5V5.5A4.5 4.5 0 0010 1zm3 8V5.5a3 3 0 10-6 0V9h6z" clip-rule="evenodd" />
            </svg>
          </span>
          Sign in
        </button>
      </div>
    </form>
  </div>
</div>

@endsection
