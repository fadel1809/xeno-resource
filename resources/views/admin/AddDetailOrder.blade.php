<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Amerta Resources</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" href="/assets/icons/favicon.ico" type="image/x-icon">

<style>
        body {
            font-family: "Oswald", sans-serif;
        }
    </style>
</head>
<body class="bg-[#380606] flex justify-center min-h-screen relative tracking-wider">
    <img src="/assets/image/bgdls.png" class="absolute top-6 left-11 z-1 opacity-70 rounded-2xl lg:block hidden " alt="DLS">
    <div class="relative z-10 bg-black bg-opacity-50 p-6 shadow-lg rounded-md my-10 w-full max-w-xl">
       <a href={{ route('admin.home',['id' => $admin->id]) }} class="bg-blue-700 hover:bg-blue-400 text-white px-4 py-1 rounded-md">
            <i class="fa-solid fa-arrow-left"></i>
            Back
        </a>
        <h1 class="text-2xl text-white text-center mb-2">Add Delivery </h1>
        <form action={{route('admin.add.detail.order.post',['id'=>$admin->id,'customer'=>$user->username,'orderId' =>Str($orders->id)  ])}} method="POST" class="space-y-4">
            @if ($errors->any())
                <div class="bg-red-800 py-2 px-2 rounded-md w-full block text-white">
                    @foreach ($errors->all() as $error)
                        {{ $error."!" }}
                    @endforeach
                </div>
            @endif

            @method('POST')
            @csrf
            <div>
                <label for="food" class="block text-sm mb-1 text-white">Food</label>
                <input value="0" type="text" id="food" name="food" class="w-full px-3 py-2 bg-gray-800 rounded border border-gray-600 text-white" >
            </div>
            <div>
                <label for="wood" class="block text-sm mb-1 text-white">Wood</label>
                <input value="0" type="text" id="wood" name="wood" class="w-full px-3 py-2 bg-gray-800 rounded border border-gray-600 text-white">
            </div>
            <div>
                <label for="wood" class="block text-sm mb-1 text-white">Steel</label>
                <input value="0" type="text" id="steel" name="steel" class="w-full px-3 py-2 bg-gray-800 rounded border border-gray-600 text-white">
            </div>
            <div>
                <label for="wood" class="block text-sm mb-1 text-white">Oil</label>
                <input value="0" type="text" id="oil" name="oil" class="w-full px-3 py-2 bg-gray-800 rounded border border-gray-600 text-white">
            </div>
             <div>
                <label for="delivery_time" class="block text-sm mb-1 text-white">Delivery Time</label>
                <input value={{now()->format("d-m-Y")}} type="text" id="delivery_time" name="delivery_time" class="w-full px-3 py-2 bg-gray-800 rounded border border-gray-600 text-white">
            </div>
            <div class="text-center">
                <button type="submit" class="bg-green-600 hover:bg-yellow-500 text-white tracking-wider rounded-md px-4 py-2">Add Order</button>
            </div>
        </form>
    </div>
</body>
</html>
