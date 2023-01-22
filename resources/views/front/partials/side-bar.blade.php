<div id="sidebar">

    <div class="inner">

      <!-- Search Box -->
      {{-- <section id="search" class="alt">
        <form method="get" action="#">
          <input type="text" name="search" id="search" placeholder="Search..." />
        </form>
      </section> --}}

      <!-- Menu -->
      {{-- <nav id="menu">
        <ul>
          <li><a href="{{ route('home') }}">Homepage</a></li>
          <li><a href="simple_page.html">Simple Page</a></li>
          <li><a href="shortcodes.html">Shortcodes</a></li>
          <li>
            <span class="opener">Dropdown One</span>
            <ul>
              <li><a href="#">First Sub Menu</a></li>
              <li><a href="#">Second Sub Menu</a></li>
              <li><a href="#">Third Sub Menu</a></li>
            </ul>
          </li>
          <li>
            <span class="opener">Dropdown Two</span>
            <ul>
              <li><a href="#">Sub Menu #1</a></li>
              <li><a href="#">Sub Menu #2</a></li>
              <li><a href="#">Sub Menu #3</a></li>
            </ul>
          </li>
          <li><a href="https://www.google.com">External Link</a></li>
        </ul>
      </nav> --}}

      <!-- Featured Posts -->
      <div class="featured-posts">
        <div class="heading">
          <h2>Featured Posts</h2>
        </div>
        <div class="owl-carousel owl-theme">
          <a href="#">
            <div class="featured-item">
              <img src="{{ asset('front/assets/images/head.jpg') }}" alt="featured one">

            </div>
          </a>
          <a href="#">
            <div class="featured-item">
              <img src="{{ asset('front/assets/images/head1.jpg') }}" alt="featured two">

            </div>
          </a>
          <a href="#">
            <div class="featured-item">
              <img src="{{ asset('front/assets/images/head2.jpg') }}" alt="featured three">

            </div>
          </a>
        </div>
      </div>

      <!-- Footer -->
      {{-- <footer id="footer" style="bottom: 0">
        <p class="copyright">Copyright &copy; {{ date('Y') }}

      </footer> --}}

    </div>
  </div>
