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
        <link rel="shortcut icon" href="/assets/icons/favicon.ico" type="image/x-icon">

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
    <div class="relative justify-center z-10 bg-black bg-opacity-50 p-6 shadow-lg rounded-md my-10 w-full max-w-5xl mx-4 sm:mx-auto">
        <a href={{ route('user.home',['id' => $user->id]) }} class="bg-blue-700 hover:bg-blue-400 text-white px-4 py-1 rounded-md">
            <i class="fa-solid fa-arrow-left"></i>
            Back
        </a>
        <h1 class="text-2xl text-white text-center mb-4">
            {{$user->username}}'s Order
        </h1>
        <div class="flex justify-center">
            <div class="bg-[#D26F37] flex py-5 flex-col justify-center items-center w-full lg:w-4/12 px-5 rounded-md" >
                <h2 class="text-white text-3xl font-semibold" >Total</h2>
                        <table>
                            <tbody>
                                <td class="flex items-center mt-2">
                                    <img src="/assets/image/food.png" class="w-2/12 rounded-full mr-2" alt="">
                                    <p class="text-white text-lg">FOOD : {{$foodSum}}M/{{$orders->total_food}}M</p>
                                </td>
                                <td class="flex items-center my-2">
                                    <img src="/assets/image/wood.png" class="w-2/12 rounded-full mr-2" alt="">
                                    <p class="text-white text-lg ">WOOD : {{$woodSum}}M/{{$orders->total_wood}}M</p>
                                </td>
                                <td class="flex items-center">
                                    <img src="/assets/image/steel.png" class="w-2/12 rounded-full tracking-wide mr-2" alt="">
                                    <p class="text-white text-lg ">STEEL : {{$steelSum}}M/{{$orders->total_steel}}M</p>
                                </td>
                                <td class="flex  items-center mt-2">
                                    <img src="/assets/image/oil.png" class="w-2/12 rounded-full mr-2" alt="">
                                    <p class="text-white text-lg tracking-wide">  OIL : {{$oilSum}}M/{{$orders->total_oil}}M</p>
                                </td>
                            </tbody>
                        </table>
                    </div>
                </div>
                    <div class="overflow-x-auto lg:overflow-hidden">
            <table class="min-w-full divide-y divide-gray-700 mt-3">
                <thead>
                    <tr class="text-center text-lg">
                        <th class="px-6 py-3 bg-red-800 text-left text-sm font-medium text-white uppercase tracking-widest text-center">No</th>
                        <th class="px-6 py-3 bg-red-800 text-left text-sm font-medium text-white uppercase tracking-widest text-center">Food</th>
                        <th class="px-6 py-3 bg-red-800 text-left text-sm font-medium text-white uppercase tracking-widest text-center">Wood</th>
                        <th class="px-6 py-3 bg-red-800 text-left text-sm font-medium text-white uppercase tracking-widest text-center">Steel</th>
                        <th class="px-6 py-3 bg-red-800 text-left text-sm font-medium text-white uppercase tracking-widest text-center">Oil</th>
                        <th class="px-6 py-3 bg-red-800 text-left text-sm font-medium text-white uppercase tracking-widest text-center">Delivery Date</th>
                    </tr>
                </thead>
                @php
                    $no=1;            
                @endphp
                <tbody class="bg-red-700 divide-y divide-gray-800 text-white">
                    @foreach ($data as $item)
                    <tr class="text-center">
                        <td class="px-6 py-4 whitespace-nowrap tracking-widest"> {{$no++}}  </td>
                        <td class="px-6 py-4 whitespace-nowrap tracking-widest"> {{$item->food}}M </td>
                        <td class="px-6 py-4 whitespace-nowrap tracking-widest"> {{$item->wood}}M </td>
                        <td class="px-6 py-4 whitespace-nowrap tracking-widest">{{$item->steel}}M</td>
                        <td class="px-6 py-4 whitespace-nowrap tracking-widest">{{$item->oil}}M</td>
                        <td class="px-6 py-4 whitespace-nowrap tracking-widest">{{$item->delivery_time}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
