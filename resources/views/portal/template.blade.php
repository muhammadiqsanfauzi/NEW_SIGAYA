<!DOCTYPE html>
<html lang="en">

@include('portal.include.head')

<body>

  
  @include('portal.include.header')

  @yield('content')

  @include('portal.include.footer')

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  @include('portal.include.script')

</body>

</html>