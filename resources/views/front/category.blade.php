@extends('front.template')



@section('content')

<style>
    .page-heading {
        padding: 10px;

    }

    .side-second {
        box-shadow: 0 0 11px rgba(10,10,10,.8);
        height: 400px;
        margin-top: 65px;
        padding-top: 7px;
    }
</style>

 <!-- Page Category -->
 <div class="page-heading">

    <div class="container-fluid">

      <div class="row align-items-center">
        <div class="col-md-7 text-center">
          <h1><span class="text-info">{{ $category->title }}</span></h1>
          <img src="/images/categories/{{ $category->photo }}" alt="">
        </div>

        <div class="col-md-5 side-second">
            <h3 class="text-center text-info">{{ $category->meta_title }}</h3>
            <hr>
           <h2>Price: <span class="text-info mt-5 mb-5">${{ $category->subtitle }}</span></h2>
           <div class="mb-4 mt-3">
            <h3>Description</h3>
               {!! $category->excerpt !!}
           </div>

            <p> Views: <span class="text-info">{{ $category->views }}</span> </p>
        </div>

        <div class="col-md-12 mt-3">
            <a href="{{ route('home') }}" class="btn btn-dark" style="width: 140px;">Back</a>
        </div>
      </div>
    </div>
  </div>

@endsection

