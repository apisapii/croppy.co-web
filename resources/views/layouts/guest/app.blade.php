<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Croppy.co</title>
    @include('layouts.guest.css')
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Header -->
    @include('layouts.guest.header')

    <!-- Hero Section -->
   @yield('content')

    <!-- Footer -->
    @include('layouts.guest.footer')
</body>
</html>