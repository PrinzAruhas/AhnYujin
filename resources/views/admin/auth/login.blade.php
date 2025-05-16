<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Login | Toko Anyujin</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;700&display=swap');

    body {
      font-family: 'Nanum Gothic', sans-serif;
      background: linear-gradient(135deg, #f0e9f4, #d8e7f6);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 2rem;
      color: #4a4a4a;
    }

    .card {
      background: #ffffffee;
      border-radius: 1.5rem;
      box-shadow: 0 12px 25px rgba(180, 180, 180, 0.2);
      width: 100%;
      max-width: 400px;
      padding: 2.5rem 2rem;
      backdrop-filter: blur(8px);
      transition: box-shadow 0.3s ease;
    }

    .card:hover {
      box-shadow: 0 18px 30px rgba(170, 170, 170, 0.35);
    }

    .btn-primary {
      background: #a07cdb;
      background: linear-gradient(90deg, #a07cdb 0%, #8a6cd1 100%);
      color: #fff;
      transition: background 0.3s ease;
    }

    .btn-primary:hover {
      background: linear-gradient(90deg, #8a6cd1 0%, #a07cdb 100%);
    }

    .input-field:focus {
      outline: none;
      border-color: #a07cdb;
      box-shadow: 0 0 8px rgba(160, 124, 219, 0.6);
    }

    .text-gradient {
      background: linear-gradient(90deg, #a07cdb, #8a6cd1);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }

    /* Password toggle button style */
    .toggle-btn {
      cursor: pointer;
      color: #8a6cd1;
      transition: color 0.3s ease;
    }

    .toggle-btn:hover {
      color: #a07cdb;
    }
  </style>
</head>

<body>
  <div class="card">
    <div class="flex flex-col items-center mb-6">
      <img src="{{ asset('storage/Yujin.jpeg') }}" alt="User Profile"
        class="w-24 h-24 rounded-full object-cover border-4 border-purple-300 shadow-md mb-4" />
      <h1 class="text-4xl font-extrabold text-gradient mb-1">Toko Anyujin</h1>
      <p class="text-gray-600 text-sm">Silakan login dulu ya~</p>
    </div>

    @if (session()->has('loginError'))
      <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4 text-sm">
        {{ session('loginError') }}
      </div>
    @endif

    <form action="/login/do" method="POST" class="space-y-6">
      @csrf
      <div>
        <label for="email" class="block mb-2 font-semibold text-gray-700">Email</label>
        <input type="email" name="email" id="email" placeholder="Email kamu"
          class="input-field w-full px-4 py-2 border rounded-lg bg-gray-50 text-gray-800 focus:ring-2 focus:ring-purple-300 @error('email') border-red-400 @enderror" />
        @error('email')
          <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>

      <div>
        <label for="password" class="block mb-2 font-semibold text-gray-700">Password</label>
        <div class="relative">
          <input type="password" name="password" id="password" placeholder="Password kamu"
            class="input-field w-full px-4 py-2 pr-10 border rounded-lg bg-gray-50 text-gray-800 focus:ring-2 focus:ring-purple-300 @error('password') border-red-400 @enderror" />
          <button type="button" onclick="togglePassword()" aria-label="Toggle password visibility"
            class="absolute inset-y-0 right-3 flex items-center text-xl toggle-btn">
            <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
              viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path id="eyePath" stroke-linecap="round" stroke-linejoin="round"
                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z
                   M2.458 12C3.732 7.943 7.522 5 12 5c4.478 0 8.268 2.943 
                   9.542 7-1.274 4.057-5.064 7-9.542 7-4.478 
                   0-8.268-2.943-9.542-7z" />
            </svg>
          </button>
        </div>
        @error('password')
          <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>

      <button type="submit"
        class="btn-primary w-full font-semibold py-2 rounded-lg shadow-lg hover:shadow-xl transition duration-300">
        Masuk
      </button>
    </form>

    <p class="mt-6 text-center text-gray-600 text-sm">
      Belum punya akun?
      <a href="/register" class="font-semibold text-purple-600 hover:text-purple-800 underline">Daftar akun baru</a>
    </p>
  </div>

  <script>
    function togglePassword() {
      const input = document.getElementById("password");
      const eyePath = document.getElementById("eyePath");

      if (input.type === "password") {
        input.type = "text";
        eyePath.setAttribute("d",
          "M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a9.982 9.982 0 012.147-3.568M21 21l-6-6");
      } else {
        input.type = "password";
        eyePath.setAttribute("d",
          "M15 12a3 3 0 11-6 0 3 3 0 016 0z M2.458 12C3.732 7.943 7.522 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.478 0-8.268-2.943-9.542-7z");
      }
    }
  </script>
</body>

</html>
