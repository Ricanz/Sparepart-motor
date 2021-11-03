<!DOCTYPE html>
<html lang="en">

@include('user.partials.head')

<body>

  <!-- ======= Header ======= -->
  @include('user.partials.header')


  <main id="main">

    <!-- ======= Cliens Section ======= -->
    {{$slot}}

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  @include('user.partials.footer')

  @include('user.partials.scripts')

</body>

</html>