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
    body{
          font-family: "Oswald", sans-serif;
    }
</style>
<body class="bg-[#380606] flex justify-center">
    <div class="lg:block hidden container justify-center items-center h-screen">
            <img src="/assets/image/bgdls.png" class="absolute top-6 left-11 z-1 opacity-70 block rounded-2xl" alt="DLS">
            <div class="absolute z-10 rounded-md top-32 left-[3.7em]  opacity-90">
                <div class="flex">
                    <div class="bg-[#D26F37] flex py-5 flex-col justify-center items-center rounded-l-md" >
                        <h2 class="text-white text-3xl underline font-semibold" >PRICE</h2>
                        <table>
                            <tbody>
                                <td class="flex justify-center items-center mt-2">
                                    <img src="/assets/image/food.png" class="w-2/12 rounded-full" alt="">
                                    <p class="text-white text-lg ml-2">FOOD : 1.000 M/25$</p>
                                </td>
                                <td class="flex justify-center items-center my-2">
                                    <img src="/assets/image/wood.png" class="w-2/12 rounded-full" alt="">
                                    <p class="text-white text-lg ml-2">WOOD : 1.000 M/25$</p>
                                </td>
                                <td class="flex justify-center items-center">
                                    <img src="/assets/image/steel.png" class="w-2/12 rounded-full mr-4 tracking-wide" alt="">
                                    <p class="text-white text-lg ml-2">STEEL : 500 M/25$</p>
                                </td>
                                <td class="flex justify-center items-center mt-2">
                                    <img src="/assets/image/oil.png" class="w-2/12 rounded-full mr-7" alt="">
                                    <p class="text-white text-lg tracking-wide">  OIL : 500 M/25$</p>
                                </td>
                            </tbody>
                        </table>
                    </div>
                    <div class="bg-[#D26F37] flex py-3 flex-col  items-center rounded-r-md  " >
                        <div class="text-white px-5 flex py-1 flex-col  items-center tracking-wide">
                            <h1 class="text-3xl font-semibold underline" >RULES</h1>
                            <p class="text-lg mt-5">you can request type of rss per day but you must confirm to us 1 day before the day </p>
                            <p class="text-lg">if you want to order more than 400m Oil you must confirm to us a few days cause we need to prepare it first </p>
                            <p class="text-lg">Payment by Paypal or bank central asia, don't forget to send funds with description with your game name like "XenoVian"</p>
                            <p class="text-lg mt-10">My Paypal (XenoVian)</p>
                            <p class="text-lg">amirfahluzi123@gmail.com</p>
                        </div>
                        <div class="mt-4">
                            <a href="{{route("user.login")}}" class="text-md opacity-100 hover:bg-red-700 text-white bg-[#380606] px-5 rounded-md py-1">Login Member</a>
                        </div>    
                    </div>
                    
                </div>
            </div>
    </div>
    <div class="lg:hidden">
        <h1 class="text-6xl" >Fadel</h1>
    </div>
</body>

</html>