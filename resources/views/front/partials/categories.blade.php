<style>
     #header-content {
        position: absolute;
        bottom: 10px;
        width: 140px;

    }
</style>

<hr style="margin-top: 40px; height:2px;border-width:0;color:gray;background-color:gray">

<section class="services">
    <div class="container-fluid">
      <div class="row">

        @foreach($categories as $category)
            <div class="col-md-4" style="margin-bottom: 3px;">
            <div class="service-item first-item" style="height: 100%">
                <div class="d-flex justify-content-center" style="width: 100%; height: 190px;">
                    <img  src="images/categories/{{ $category->photo }}" alt="">
                </div>
                <h3>{{ $category->title }}</h3>
                <p >Price: ${{ $category->subtitle }}</p>
                <p>{{ $category->meta_title }}</p>

                <hr style="height:2px;border-width:0;color:gray;background-color:gray">
                <div class="d-flex justify-content-center">
                    <a id="header-content" href="{{ route('category', $category->slug) }}" class="btn btn-dark text-white mt-2">
                        Read More
                    </a>
                </div>
            </div>
            </div>
        @endforeach

      </div>
    </div>
  </section>
