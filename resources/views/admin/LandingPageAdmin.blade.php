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

<body class="bg-[#380606] flex justify-center min-h-screen relative">

    <!-- Gambar dihapus untuk responsivitas lebih baik di layar kecil -->
    <img src="/assets/image/bgdls.png" class="absolute top-6 left-11 z-1 opacity-70 rounded-2xl lg:block hidden" alt="DLS"> 

    <div class="relative z-10 bg-black bg-opacity-50 p-6 shadow-lg rounded-md my-10 w-full max-w-xl mx-4 sm:mx-auto">
        <h1 class="text-2xl text-white text-center mb-4">
            Customer List
        </h1>
        <a href={{ route("admin.register.customer", ['id' => '1']) }} class="block bg-green-600 hover:bg-green-500 text-white tracking-wider rounded-md px-4 py-2 text-center mb-4">
            Register Customer
        </a>
        <div class="overflow-x-auto lg:overflow-hidden">
            <table class="min-w-full divide-y divide-gray-700 mt-3">
                <thead>
                    <tr class="text-center text-lg">
                        <th class="px-4 py-3 bg-red-800 text-sm font-medium text-white uppercase tracking-widest text-center">Name</th>
                        <th class="px-4 py-3 bg-red-800 text-sm font-medium text-white uppercase tracking-widest text-center">Region</th>
                        <th class="px-4 py-3 bg-red-800 text-sm font-medium text-white uppercase tracking-widest text-center">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-red-700 divide-y divide-gray-800 text-white">
                    @foreach ($data as $item)
                    <tr class="text-center">
                        <td class="px-4 py-4 whitespace-nowrap tracking-widest"> {{$item->username}} </td>
                        <td class="px-4 py-4 whitespace-nowrap tracking-widest"> {{$item->region}} </td>
                        <td class="tracking-wider px-4 py-4 whitespace-nowrap">
                            <a href={{ route("admin.track.customer", ['id' => $admin, 'customer' => $item->username]) }} class="mr-2 hover:text-red-500">
                                Track Order
                            </a>
                            <a href={{ route("admin.edit.customer", ['id' => $admin, 'customer' => $item->username]) }} class="hover:text-red-500">
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
