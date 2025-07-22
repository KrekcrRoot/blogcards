<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles

</head>
<body class="bg-body-secondary">

    <div class="container py-lg-5 px-5 bg-white min-vh-100">
        <h1>Карточки</h1>

        <hr />

        <div class="container">
            <livewire:post-all :selectedPost="$selectedPost ?? null" />
        </div>

    </div>

    @livewireScripts
</body>
</html>
