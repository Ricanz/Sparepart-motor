<!DOCTYPE html>
<html lang="zxx">

@include('user.partials.head')

<body>
    

    <!-- Header Section Begin -->
    @include('user.partials.header')
    <!-- Header Section End -->

    {{ $slot }}

    <!-- Footer Section Begin -->
    @include('user.partials.footer')
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    @include('user.partials.scripts')
    



</body>

</html>