<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barangay Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="h-screen bg-cover bg-center"
      style="background-image: url('{{ asset('Barangay_background.jpg') }}');">

      <!-- Container with flex -->
    <div class="flex items-center justify-end h-full pr-40"> <!-- adjust pr to move left -->
        <!-- register box -->
        <div class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-md bg-opacity-100 relative">

           <!-- Logo -->
<div class="flex justify-center mb-4 -mt-4">
    <div class="w-28 h-28 rounded-full overflow-hidden shadow-xl">
        <img src="{{ asset('LOGO.png') }}" 
             alt="Barangay Logo" 
             class="w-full h-full object-cover scale-125">
    </div>
</div>


            <!-- Title -->
            <h2 class="text-xl font-bold text-center text-blue-900 mb-4">REGISTER</h2>

            <!-- Form -->
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div class="mb-3">
                    <label class="block mb-1 font-semibold text-gray-700" for="name">Name</label>
                    <input type="text" name="name" id="name" 
                           class="w-full border px-3 py-2 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label class="block mb-1 font-semibold text-gray-700" for="email">Email</label>
                    <input type="email" name="email" id="email" 
                           class="w-full border px-3 py-2 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <label class="block mb-1 font-semibold text-gray-700" for="password">Password</label>
                    <input type="password" name="password" id="password" 
                           class="w-full border px-3 py-2 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>

                <!-- Confirm Password -->
                <div class="mb-4">
                    <label class="block mb-1 font-semibold text-gray-700" for="password_confirmation">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" 
                           class="w-full border px-3 py-2 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>

                <!-- Button -->
                <div>
                    <button type="submit" 
                            class="w-full bg-blue-600 text-white py-2 rounded-full font-bold hover:bg-blue-700 transition">
                        REGISTER
                    </button>
                </div>
            </form>

            <p class="mt-3 text-center text-sm">Already have an account? 
                <a href="{{ route('login.form') }}" class="text-blue-600 hover:underline font-semibold">Login</a>
            </p>
        </div>
    </div>
</body>
</html>
