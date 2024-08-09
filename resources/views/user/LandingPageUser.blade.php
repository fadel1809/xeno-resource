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
<body class="bg-[#380606] flex justify-center min-h-screen relative">
    <img src="/assets/image/bgdls.png" class="absolute top-6 left-11 z-1 opacity-70 rounded-2xl hidden md:block" alt="DLS">
    <div class="relative z-10 bg-black bg-opacity-50 p-4 md:p-6 shadow-lg rounded-md my-10 w-full max-w-5xl">
        <div class="">
            <form action={{route('user.logout')}} method="POST">
                @method('POST')
                @csrf
                <button class="bg-red-600 hover:bg-red-400 text-white px-4 py-1 tracking-wider rounded-sm" type="submit">
                    Logout
                </button>
            </form>
        </div>
        <h1 class="text-xl md:text-2xl text-white text-center mb-2">
            My Order        
        </h1>
        <div class=" py-1 px-3 flex justify-center bg-[#D26F37] lg:w-2/12 text-white rounded-md tracking-wider">
            <p>
                Loyalty Points: {{$user->loyalty_point}} pts
            </p>
        </div>
        <div class="overflow-x-auto">

        <table class="min-w-full divide-y divide-gray-700 mt-3">
            <thead>
                <tr class="text-center text-sm md:text-lg">
                    <th class="px-2 py-3 md:px-6 bg-red-800 text-left text-xs md:text-sm font-medium text-white uppercase tracking-widest text-center">Order ID</th>
                    <th class="px-2 py-3 md:px-6 bg-red-800 text-left text-xs md:text-sm font-medium text-white uppercase tracking-widest text-center">Total Food</th>
                    <th class="px-2 py-3 md:px-6 bg-red-800 text-left text-xs md:text-sm font-medium text-white uppercase tracking-widest text-center">Total Wood</th>
                    <th class="px-2 py-3 md:px-6 bg-red-800 text-left text-xs md:text-sm font-medium text-white uppercase tracking-widest text-center">Total Steel</th>
                    <th class="px-2 py-3 md:px-6 bg-red-800 text-left text-xs md:text-sm font-medium text-white uppercase tracking-widest text-center">Total Oil</th>

                    <th class="px-2 py-3 md:px-6 bg-red-800 text-left text-xs md:text-sm font-medium text-white uppercase tracking-widest text-center">Order Date</th>
                    <th class="px-2 py-3 md:px-6 bg-red-800 text-left text-xs md:text-sm font-medium text-white uppercase tracking-widest text-center">Action</th>
                </tr>
            </thead>
            <tbody class="bg-red-700 divide-y divide-gray-800 text-white">
                @foreach ($data as $item)
                <tr class="text-center">
                    <td class="px-2 py-4 whitespace-nowrap tracking-widest text-xs md:text-sm">{{$item->id}}</td>
                    <td class="px-2 py-4 whitespace-nowrap tracking-widest text-xs md:text-sm">{{$item->total_food}}M</td>
                    <td class="px-2 py-4 whitespace-nowrap tracking-widest text-xs md:text-sm">{{$item->total_wood}}M</td>
                    <td class="px-2 py-4 whitespace-nowrap tracking-widest text-xs md:text-sm">{{$item->total_steel}}M</td>
                    <td class="px-2 py-4 whitespace-nowrap tracking-widest text-xs md:text-sm">{{$item->total_oil}}M</td>
                    <td class="px-2 py-4 whitespace-nowrap tracking-widest text-xs md:text-sm">{{$item->order_date}}</td>

                    <td class="tracking-wider px-2 py-4 whitespace-nowrap">
                        <a href={{route("user.detail.order",['id'=>$user->id,'orderId' => $item->id])}} class="text-xs md:text-sm mr-2  bg-blue-600 rounded-md px-3 py-1 hover:bg-blue-400 text-white text-center">
                            Detail Order
                        </a> 
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
                </div>

    </div>
    <a href="https://discordapp.com/users/1050097422593949808" class="">
        <div class="text-purple-800 text-center absolute top-3/4 right-4 md:right-10 z-10 bg-gray-300 rounded-full py-3 md:py-3 border-4 border-purple-700 px-3 md:px-2 hover:text-gray-300 hover:bg-purple-800 hover:border-purple-800">
            <i class="fa-brands fa-discord text-4xl md:text-6xl text-center"></i>
            <p class="text-xs md:text-md text-center font-bold lg:tracking-wider">Contact us!</p>
        </div>
    </a>
</body>
</html>
