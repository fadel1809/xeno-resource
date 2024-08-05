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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<style>
    body {
        font-family: "Oswald", sans-serif;
    }
</style>
<body class="bg-[#380606] flex justify-center items-center min-h-screen relative">
    <img src="/assets/image/bgdls.png" class="absolute top-6 left-11 z-1 opacity-70 rounded-2xl hidden lg:block" alt="DLS">
    <div class="relative z-10 rounded-md bg-black bg-opacity-50 p-6 shadow-lg max-w-xs w-full">
        <img src="/assets/image/banner.png" class="w-full mb-4 rounded-md" alt="Banner">
        <form action={{route('user.login')}} method="POST" class="text-black space-y-4">
            @if ($errors->any())
                                    <div class="bg-red-800 py-2 px-2 rounded-md w-full block text-white">
                                        @foreach ($errors->all() as $error)
                                        <p>{{ $error."!" }}</p>
                                        @endforeach
                                    </div>
                                @endif
            @method("POST")

            @csrf
            <div>
                <label for="username" class="block mb-2 text-white">Username</label>
                <input type="text" id="username" name="username" class="w-full p-2 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-red-500">
            </div>
            <div>
                <label for="password" class="block mb-2 text-white">Password</label>
                <input type="password" id="password" name="password" class="w-full p-2 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-red-500">
            </div>
            <button type="submit" class="w-full bg-red-600 text-white py-2 rounded-md hover:bg-red-700 transition-colors">Login</button>
        </form>
    </div>
    <div class="fixed bottom-5 z-100 right-5">

        <a href="https://discordapp.com/users/1050097422593949808" class="">
            <div class="text-purple-800 text-center fixed bottom-5 right-2 z-100 bg-gray-300 rounded-full py-3  border-4 border-purple-700 px-2  hover:text-gray-300 hover:bg-purple-800 hover:border-purple-800">
                <i class="fa-brands fa-discord text-3xl text-center"></i>
                <p class="text-xs md:text-md text-center font-bold ">Contact us!</p>
            </div>
        </a>
    </div>
</body>
</html>
