@include('front.partials.head')

<body class="is-preload">

    <!-- Wrapper -->
    <div id="wrapper">

      <!-- Main -->
        <div id="main">
          <div class="inner">

               <!-- Header -->
              @include('front.partials.top-bar')
              @include('admin.partials.message')

                @yield('content')

                @include('front.partials.footer')
          </div>
        </div>

      <!-- Sidebar -->
        @include('front.partials.side-bar')

    </div>


    @include('front.partials.scripts')


