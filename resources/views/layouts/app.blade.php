<!DOCTYPE html>
<html lang="en">
@include('dashboard/head')

<body>
    @include('layouts/topbar')
    <div class="container-scroller" style="margin-top: 3vh; margin-bottom: 20vh">

        @yield('content')

    </div>
      <br>
    @include('dashboard/footer')
    @include('dashboard/js')
</body>
</html>
