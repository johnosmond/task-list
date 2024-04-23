<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel Task List App</title>
    <script src="https://cdn.tailwindcss.com"></script>
    {{-- blade-formater-disable --}}
    <style type="text/tailwindcss">
        .btn {
            @apply rounded px-2 py-1 text-center text-slate-700 font-medium shadow-sm ring-1 ring-slate-700/10 hover:bg-slate-50;
        }

        .link {
            @apply text-lg text-gray-700 underline decoration-pink-500;
        }

        .label {
            @apply text-gray-700 font-bold;
        }

        .data {
            @apply text-slate-700;
        }

        label {
            @apply block uppercase text-gray-700 font-bold mb-1;
        }

        input,
        textarea,
        select {
            @apply shadow-sm appearance-none border w-full py-2 px-3 text-slate-700 leading-tight focus:outline-none;
        }

        .error {
            @apply text-red-500 text-sm;
        }
        .success {
            @apply mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative;
        }
    </style>
    {{-- blade-formater-enable --}}
    @yield('styles')
</head>

<body class="container mx-auto mt-10 mb-10 max-w-lg">
    <h1 class="text-2xl mb-4">@yield('title')</h1>
    @if (session('success'))
        <div class="success">
            <p>{{ session('success') }}</p>
        </div>
    @endif
    <div>
        @yield('content')
    </div>
</body>

</html>
