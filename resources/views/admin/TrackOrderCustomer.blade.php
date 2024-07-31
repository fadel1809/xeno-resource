<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Xeno Resources</title>
</head>
<body>
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
</head>
<style>
    body {
        font-family: "Oswald", sans-serif;
    }
</style>
<body class="bg-[#380606] flex justify-center min-h-screen relative">
    <img src="/assets/image/bgdls.png" class="absolute top-6 left-11 z-1 opacity-70 rounded-2xl" alt="DLS">
    <div class="relative z-10 bg-black bg-opacity-50 p-6 shadow-lg rounded-md my-10 w-full max-w-5xl">
        <h1 class="text-2xl text-white text-center mb-2">
            Customer Name's Order        
        </h1>
        <a href={{route("admin.add.order",['id'=>'1','customer' => "hanz"])}} class="bg-green-600 hover:bg-green-500 text-white tracking-wider rounded-md px-2 py-1">
            Add Order 
        </a>
        <table class="min-w-full divide-y divide-gray-700 mt-3">
            <thead>
                <tr class="text-center text-lg">
                    <th class="px-6 py-3 bg-red-800 text-left  text-sm font-medium text-white uppercase tracking-widest text-center">Order ID</th>
                    <th class="px-6 py-3 bg-red-800 text-left text-sm   font-medium text-white uppercase tracking-widest  text-center">Order Date</th>
                    <th class="px-6 py-3 bg-red-800 text-left text-sm   font-medium text-white uppercase tracking-widest  text-center">Action</th>
                </tr>
            </thead>
            <tbody class="bg-red-700 divide-y divide-gray-800 text-white">
                <tr class="text-center">
                    <td class="px-6 py-4 whitespace-nowrap tracking-widest ">1</td>
                    <td class="px-6 py-4 whitespace-nowrap tracking-widest ">29/07/2024</td>
                    <td class="tracking-wider px-6 py-4 whitespace-nowrap ">
                         <a href={{route("admin.detail.order",['id'=>'1','customer' => "hanz",'orderId' => "2"])}} class=" mr-2 hover:text-red-500">
                            Detail Order
                        </a> 
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>

</body>
</html>