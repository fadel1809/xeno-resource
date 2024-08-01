<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Xeno Resources</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: "Oswald", sans-serif;
        }
    </style>
</head>

<body class="bg-[#380606] flex justify-center min-h-screen relative tracking-wider">

    <!-- Gambar dihapus untuk responsivitas lebih baik di layar kecil -->
    <!-- <img src="/assets/image/bgdls.png" class="absolute top-6 left-11 z-1 opacity-70 rounded-2xl" alt="DLS"> -->

    <div class="relative z-10 bg-black bg-opacity-50 p-6 shadow-lg rounded-md my-10 w-full max-w-xl mx-4 sm:mx-auto">
        <h1 class="text-2xl text-white text-center mb-4">Edit Data Customer</h1>
        <form action="/register" method="POST" class="space-y-4">
            <!-- Username Field -->
            <div>
                <label for="username" class="block text-sm mb-1 text-white">Username</label>
                <input type="text" id="username" name="username" class="w-full px-3 py-2 bg-gray-800 rounded border border-gray-600 text-white" required>
            </div>
            <!-- Password Field -->
            <div>
                <label for="password" class="block text-sm mb-1 text-white">Password</label>
                <input type="password" id="password" name="password" class="w-full px-3 py-2 bg-gray-800 rounded border border-gray-600 text-white" required>
            </div>
            <!-- Region Field -->
            <div>
                <label for="region" class="block text-sm mb-1 text-white">Region</label>
                <input type="text" id="region" name="region" class="w-full px-3 py-2 bg-gray-800 rounded border border-gray-600 text-white" required>
            </div>
            <!-- Submit Button -->
            <div class="text-center">
                <button type="submit" class="bg-yellow-600 hover:bg-yellow-500 text-white tracking-wider rounded-md px-4 py-2">Edit</button>
            </div>
        </form>
    </div>
</body>

</html>
