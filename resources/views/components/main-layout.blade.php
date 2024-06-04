<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns"></script>
</head>

<body class="font-sans antialiased text-black h-[100dvh] w-full overflow-hidden flex flex-col">
    <!-- Include the header component -->
   <x-header></x-header>
    <!-- Main content area -->
    <div class="flex-1 px-8">
       {{$slot}}
    </div>
    <!-- Include the footer component -->
   <x-footer></x-footer>

</body>
</html>
