<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mail Lesson</title>

    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css">
</head>
<body class="bg-gray-100 flex items-center justify-center h-full">
<form
    method="post"
    action="/contact"
    class="bg-white mt-5 p-6 rounded shadow-md" style="width: 300px">
    @csrf

    <div class="mb-5">
        <label for="email" class="block text-xs uppercase font-semibold mb-1">
            Email Address
        </label>

        <input type="email"
               id="email"
               name="email"
               class="border px-2 py-1 text-sm w-full">

        @error('email')
        <div class="text-red-500 text-xs">{{ $message }}</div>
        @enderror
    </div>

    <button class="bg-blue-500 py-2 text-white rounded-full text-sm w-full">
        Email Me
    </button>

    @if (session('message'))
        <div class="text-green-500 text-xs mt-2">
            {{ session('message') }}
        </div>
    @endif
</form>
</body>
</html>
