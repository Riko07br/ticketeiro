<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="images/favicon.ico" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        laravel: "#213363",
                    },
                },
            },
        };
    </script>
    <title>Ticketeiro</title>
</head>

<body class="mb-48">
    <nav class="flex justify-between items-center bg-gray-500 px-3">
        <a href="/"><img class="w-20 py-2" src="{{ asset('images/logo.png') }}" alt=""
                class="logo" /></a>
        <div>
            Olá, <b>{{ auth()->user()->name }}</b>
        </div>
    </nav>

    <main class="flex flex-1">
        <x-sidebar />
        <div class="flex-1 pl-2 pt-2">
            {{ $slot }}
        </div>
    </main>
    <footer>
    </footer>
</body>

</html>
