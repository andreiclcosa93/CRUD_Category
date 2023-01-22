@include('admin.partials.head')

  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">

            @include('admin.partials.sidebar')

      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar p-0 fixed-top d-flex flex-row">

            @include('admin.partials.topbar')

        </nav>
        <!-- partial -->

        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">

            </div>

            {{-- CONTENT DINAMIC --}}
            @include('admin.partials.message')
                @yield('content')

          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          @include('admin.partials.footer')
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

@include('sweetalert::alert')
@include('admin.partials.scripts')
