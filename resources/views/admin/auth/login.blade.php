<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login | Toko Anyujin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Optional: Smooth transition for dark/light theme if needed */
        html {
            transition: background 0.3s ease, color 0.3s ease;
        }
    </style>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen px-4">
    <div class="bg-white rounded-2xl shadow-xl p-8 w-full max-w-md">
        <div class="flex flex-col items-center">
            <img src="{{ asset('storage/Yujin.jpeg') }}" alt="User Profile"
                class="w-24 h-24 rounded-full object-cover border-4 border-blue-500 shadow-md mb-4" />

            <h2 class="text-2xl font-bold text-gray-800 mb-1">Toko Anyujin</h2>
            <p class="text-gray-500 text-sm">Silakan login dulu ya~</p>
        </div>

        @if (session()->has('loginError'))
        <div class="bg-red-100 text-red-700 p-3 rounded mt-4 text-sm">
            {{ session('loginError') }}
        </div>
        @endif

        <form action="/login/do" method="POST" class="mt-6 space-y-5">
            @csrf
            <div>
                <label for="email" class="block text-gray-700 font-medium">Email</label>
                <input type="email" name="email" id="email" placeholder="Email kamu"
                    class="w-full mt-1 px-4 py-2 border rounded-lg bg-gray-50 text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('email') border-red-500 @enderror" />
                @error('email')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password" class="block text-gray-700 font-medium">Password</label>
                <div class="relative">
                    <input type="password" name="password" id="password" placeholder="Password kamu"
                        class="w-full mt-1 px-4 py-2 border rounded-lg bg-gray-50 text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('password') border-red-500 @enderror" />
                    <button type="button" onclick="togglePassword()" class="absolute right-3 top-3 text-gray-500">
                        <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2.458 12C3.732 7.943 7.522 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.478 0-8.268-2.943-9.542-7z" />
                        </svg>
                    </button>
                </div>
                @error('password')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit"
                class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition duration-300 font-semibold">
                Masuk
            </button>
        </form>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById("password");
            const eyeIcon = document.getElementById("eyeIcon");

            const isPasswordVisible = passwordInput.type === "text";
            passwordInput.type = isPasswordVisible ? "password" : "text";

            eyeIcon.innerHTML = isPasswordVisible
                ? `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                     d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                   <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                     d="M2.458 12C3.732 7.943 7.522 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.478 0-8.268-2.943-9.542-7z" />`
                : `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                     d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a9.982 9.982 0 012.147-3.568M21 21l-6-6m0 0a4.5 4.5 0 01-6-6m6 6l6 6" />`;
        }
    </script>
</body>

</html>
