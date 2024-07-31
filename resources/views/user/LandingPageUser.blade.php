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
        <h1 class="text-xl md:text-2xl text-white text-center mb-2">
            My Order        
        </h1>
        <table class="min-w-full divide-y divide-gray-700 mt-3">
            <thead>
                <tr class="text-center text-sm md:text-lg">
                    <th class="px-2 py-3 md:px-6 bg-red-800 text-left text-xs md:text-sm font-medium text-white uppercase tracking-widest text-center">Order ID</th>
                    <th class="px-2 py-3 md:px-6 bg-red-800 text-left text-xs md:text-sm font-medium text-white uppercase tracking-widest text-center">Order Date</th>
                    <th class="px-2 py-3 md:px-6 bg-red-800 text-left text-xs md:text-sm font-medium text-white uppercase tracking-widest text-center">Action</th>
                </tr>
            </thead>
            <tbody class="bg-red-700 divide-y divide-gray-800 text-white">
                <tr class="text-center">
                    <td class="px-2 py-4 whitespace-nowrap tracking-widest text-xs md:text-sm">1</td>
                    <td class="px-2 py-4 whitespace-nowrap tracking-widest text-xs md:text-sm">29/07/2024</td>
                    <td class="tracking-wider px-2 py-4 whitespace-nowrap">
                        <a href={{route("user.detail.order",['id'=>'1','orderId' => "2"])}} class="text-xs md:text-sm mr-2 hover:text-red-500">
                            Detail Order
                        </a> 
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <a href="https://discordapp.com/users/1050097422593949808" class="">
        <div class="text-purple-800 text-center absolute top-3/4 right-4 md:right-10 z-10 bg-gray-300 rounded-full py-2 md:py-3 border-4 border-purple-800 px-4 md:px-5 hover:text-gray-300 hover:bg-purple-800 hover:border-purple-800">
            <i class="fa-brands fa-discord text-4xl md:text-6xl text-center"></i>
            <p class="text-xs md:text-md text-center font-bold tracking-wider">Contact us!</p>
        </div>
    </a>
</body>
</html>
