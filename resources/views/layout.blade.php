{{-- {{ dd($events) }} --}}
{{-- {{ dd($menuItems) }} --}}



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Castello di Fossadalbero</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href={{ asset("assets/img/favicon.png") }} rel="icon">
    {{-- <link href={{ asset("assets/img/apple-touch-icon.png") }} rel="apple-touch-icon"> --}}

    <!-- Google Fonts -->
    <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href={{ asset("assets/vendor/animate.css/animate.min.css") }} rel="stylesheet">
    <link href={{ asset("assets/vendor/aos/aos.css") }} rel="stylesheet">
    <link href={{ asset("assets/vendor/bootstrap/css/bootstrap.min.css") }} rel="stylesheet">
    <link href={{ asset("assets/vendor/bootstrap-icons/bootstrap-icons.css") }} rel="stylesheet">
    <link href={{ asset("assets/vendor/boxicons/css/boxicons.min.css") }} rel="stylesheet">
    <link href={{ asset("assets/vendor/glightbox/css/glightbox.min.css") }} rel="stylesheet">
    <link href={{ asset("assets/vendor/swiper/swiper-bundle.min.css") }} rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href={{ asset("assets/css/style.css") }} rel="stylesheet">

    <script id="Cookiebot" src="https://consent.cookiebot.com/uc.js" data-cbid="81a22814-56e4-4f12-be51-bf0be6ed0923" data-blockingmode="auto" type="text/javascript"></script>
</head>

<body>

    @include('topbar')

    @include('navbar')

    @include('hero')

    <main id="main">

        @include('main.about')

        @include('main.gallery')

        @include('main.why-us')

        @include('main.swimming-pool')

        {{-- @include('main.summer-camp') --}}

        @include('main.specials')

        @if ($events->count() > 0)
            @include('main.events')
        @endif

        @if ($menuItems->count() > 0)
            @include('main.menu')
        @endif

        <hr class="solid">

        @if ($reviews->count() > 0)
            @include('main.reviews')
        @endif

        @include('main.contact-us')

    </main>


    @include('footer')

    @include('scripts')

</body>

</html>
