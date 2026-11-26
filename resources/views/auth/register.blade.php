<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="w-full max-w-md bg-white p-8 rounded-xl shadow">
        <h1 class="text-2xl font-bold mb-6">Create Account</h1>

        @if ($errors->any())
            <p class="text-red-500 mb-4">{{ $errors->first() }}</p>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <input type="text" name="name" placeholder="Full Name"
                value="{{ old('name') }}"
                class="w-full border p-3 rounded mb-4" required>

            <input type="email" name="email" placeholder="Email"
                value="{{ old('email') }}"
                class="w-full border p-3 rounded mb-4" required>

            <input type="password" name="password" placeholder="Password"
                class="w-full border p-3 rounded mb-4" required>

            <input type="password" name="password_confirmation"
                placeholder="Confirm Password"
                class="w-full border p-3 rounded mb-4" required>

            <button class="w-full bg-black text-white p-3 rounded">
                Register
            </button>
        </form>

        <p class="mt-5 text-sm">
            Already have an account?
            <a href="{{ route('login') }}" class="underline">Login</a>
        </p>
    </div>
</body>
</html>
