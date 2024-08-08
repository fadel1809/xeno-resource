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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body class="bg-[#380606] flex justify-center min-h-screen relative">

    <!-- Gambar dihapus untuk responsivitas lebih baik di layar kecil -->
 <img src="/assets/image/bgdls.png" class="absolute top-6 left-11 z-1 opacity-70 rounded-2xl lg:block hidden" alt="DLS"> 
    <div class="relative z-10 bg-black bg-opacity-50 p-6 shadow-lg rounded-md my-10 w-full max-w-5xl mx-4 sm:mx-auto">
        <a href={{ route('admin.home',['id' => $admin->id]) }} class="bg-blue-700 hover:bg-blue-400 text-white px-4 py-1 rounded-md">
            <i class="fa-solid fa-arrow-left"></i>
            Back
        </a>
        <h1 class="text-2xl text-white text-center mb-4">
            {{$user->username}}'s Order
        </h1>
        <a href={{ route("admin.add.order", ['id' => $admin->id, 'customer' => $user->username]) }} class="block bg-green-600 hover:bg-green-500 text-white tracking-wider rounded-md px-4 py-2 text-center mb-4">
            Add Order
        </a>
        <div class="overflow-x-auto lg:overflow-hidden">
            <table class="min-w-full divide-y divide-gray-700 mt-3">
                <thead>
                    <tr class="text-center text-lg">
                        <th class="px-6 py-3 bg-red-800 text-left text-sm font-medium text-white uppercase tracking-widest text-center">Order ID</th>
                        <th class="px-6 py-3 bg-red-800 text-left text-sm font-medium text-white uppercase tracking-widest text-center">Total Food</th>
                        <th class="px-6 py-3 bg-red-800 text-left text-sm font-medium text-white uppercase tracking-widest text-center">Total Wood</th>
                        <th class="px-6 py-3 bg-red-800 text-left text-sm font-medium text-white uppercase tracking-widest text-center">Total Steel</th>
                        <th class="px-6 py-3 bg-red-800 text-left text-sm font-medium text-white uppercase tracking-widest text-center">Total Oil</th>
                        <th class="px-6 py-3 bg-red-800 text-left text-sm font-medium text-white uppercase tracking-widest text-center">Order Date</th>
                        <th class="px-6 py-3 bg-red-800 text-left text-sm font-medium text-white uppercase tracking-widest text-center">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-red-700 divide-y divide-gray-800 text-white">
                    @foreach ($data as $item)
                    <tr class="text-center">
                        <td class="px-6 py-4 whitespace-nowrap tracking-widest"> {{$item->id}}  </td>
                        <td class="px-6 py-4 whitespace-nowrap tracking-widest"> {{$item->total_food}}M </td>
                        <td class="px-6 py-4 whitespace-nowrap tracking-widest"> {{$item->total_wood}}M </td>
                        <td class="px-6 py-4 whitespace-nowrap tracking-widest">{{$item->total_steel}}M</td>
                        <td class="px-6 py-4 whitespace-nowrap tracking-widest">{{$item->total_oil}}M</td>
                        <td class="px-6 py-4 whitespace-nowrap tracking-widest">{{$item->order_date}}</td>
                        
                        <td class="tracking-wider px-6 py-4 whitespace-nowrap">
                            <a class="bg-blue-600 rounded-md px-3 py-1 hover:bg-blue-400 text-white text-center mr-1" href={{ route("admin.detail.order", ['id' => $admin->id, 'customer' => $user->username, 'orderId' => $item->id]) }}>
                                Detail Order
                            </a>
                            <a class="bg-yellow-600 rounded-md px-3 py-1 hover:bg-yellow-400 text-white text-center ml-1" href={{ route("admin.edit.order", ['id' => $admin->id, 'customer' => $user->username, 'orderId' => $item->id]) }}>
                                Edit
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
