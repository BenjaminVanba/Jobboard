<!-- resources/views/layout.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>

 
        
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title', 'Default Title')</title>
        @vite('resources/css/app.css')
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">


       


        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.ico') }}">

    <!-- CSS ici -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/price_rangs.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slicknav.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
		
	
 








   
</head>

<body>
  
  <header>
    @include('header') <!-- En-tête -->
    </header>
    
    
    
   
    <main>
        @yield('content') <!-- Placeholder pour le contenu spécifique à chaque page -->



</main>
   

  

    <footer>
    @include('footer') <!-- En-tête -->
    </footer>

    @vite('resources/js/app.js') 
</body>

</html>