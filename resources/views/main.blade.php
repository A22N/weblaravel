<!DOCTYPE html>
<html lang="en">

<head>
    @include('head')

</head>

<body>
    <!--class="animsition"-->

    <!-- Header -->
    @include('header')

    <!-- Cart -->
    @include('cart')


    @yield('content')


    <!-- footer -->
    @include('footer')



</body>

</html>