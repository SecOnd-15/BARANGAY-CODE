<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barangay Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="h-screen bg-cover bg-center"
      style="background-image: url('{{ asset('Barangay_background.jpg') }}');">

    <!-- Container with flex -->
    <div class="flex items-center justify-end h-full pr-40"> <!-- adjust pr to move left -->
        <!-- Login box -->
        <div class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-md bg-opacity-100 relative">
            
            <!-- Logo -->
            <div class="flex justify-center mb-6 -mt-6">
                <div class="w-35 h-40 rounded-full overflow-hidden shadow-xl">
                    <img src="{{ asset('LOGO.png') }}" 
                         alt="Barangay Logo" 
                         class="w-full h-full object-cover scale-125">
                </div>
            </div>

            <!-- Title -->
            <h2 class="text-2xl font-bold text-center text-blue-900 mb-6">LOGIN</h2>

            <!-- Form -->
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email -->
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 font-semibold">Email:</label>
                    <input type="email" name="email" id="email" required
                           class="w-full border px-3 py-2 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <label for="password" class="block text-gray-700 font-semibold">Password:</label>
                    <input type="password" name="password" id="password" required
                           class="w-full border px-3 py-2 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <!-- Remember & Forgot -->
                <div class="flex items-center justify-between mb-6 text-sm">
                    <label class="flex items-center space-x-2 text-gray-600">
                        <input type="checkbox" name="remember" class="rounded">
                        <span>Remember me</span>
                    </label>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-blue-600 hover:underline">
                            Forgot password?
                        </a>
                    @endif
                </div>

                <!-- Button -->
                <div>
                    <button type="submit" 
                            class="w-full bg-blue-600 text-white py-2 rounded-full font-bold hover:bg-blue-700 transition">
                        LOGIN
                    </button>
                </div>

                <!-- Register link -->
                <div class="mt-4 text-center">
                    <span class="text-gray-600">Don’t have an account?</span>
                    <a href="{{ route('register') }}" class="text-blue-600 font-semibold hover:underline">
                        Register
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
