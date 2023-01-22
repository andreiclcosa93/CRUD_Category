@extends('admin.template')

@section('title', 'Categories')

@section('content')

{{-- ===== breadcrumb ===== --}}
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card corona-gradient-card">
          <div class="card-body py-0 px-0 px-sm-3">
            <div class="row align-items-center">
              <div class="col-5 col-sm-7 col-xl-8 p-0 mx-auto">
                <div class="page-header-title mt-3">
                    <h5 class="m-b-10">Control Panel</h5>
                </div>
                <ul class="breadcrumb" style="font-size: 20px;">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" style="text-decoration: none; color:#fff;"><i class="fas fa-home"></i> Home</a></li>
                    <li class="breadcrumb-item"><a style="color: #000;">Categories</a></li>
                </ul>
              </div>

            </div>
          </div>
        </div>
      </div>
</div>


<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="row d-flex justify-content-between mb-3">
            <h4 class="card-title">Categories - {{ $categories->count() }}</h4>
                @can('author-rights')
                    <a href="{{ route('admin.categories.new') }}" class="btn btn-success" style="margin-right:160px;">Create Category</a>
                @endcan
        </div>

        {{-- <div class="table-responsive mt-5"> --}}
        <div style="overflow-x:auto;">

            <table class="table table-dark table-striped table-hover">
                <thead>
                <tr class="text-center" >
                    <th> Position </th>
                    <th> Title </th>
                    <th> Price $ </th>
                    <th> Photo </th>
                    <th> Meta Titile </th>
                    <th> Views </th>
                    <th > Status </th>
                    <th> Actions </th>
                </tr>
                </thead>
                <tbody style="color: #fff;">
                    @foreach($categories as $category)
                        <tr class="text-center {{ $category->publish == 1 ? '' : 'bg-warning' }}" >
                            <td >{{ $category->position }}</td>
                            <td >{{ $category->title }}</td>
                            <td> {{ $category->subtitle }} </td>
                            <td>
                                <img src="/images/categories/{{ $category->photo }}" alt="" style="width: 70px; height: 50px;">
                            </td>
                            <td>{{ $category->meta_title }}</td> <!--description-->
                            <td>{{ $category->views }}</td>
                            <td > {{ $category->publish }} </td>
                            <td class="d-flex justify-content-around" style="align-items: center; padding: 30px 5px ">
                                <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-warning" style="color: #000; width: 70px;">Edit <i class="fas fa-edit" title="Stergere"></i></a>

                                @can('author-rights')
                                    <form action="{{ route('admin.categories.delete', $category->id) }}" method="POST" id="form-delete-{{ $category->id }}">
                                        @csrf
                                        @method('delete')
                                    </form>
                                    <button class="btn btn-danger" onclick="event.preventDefault();deleteConfirm('form-delete-{{ $category->id }}')" style="color: #000;">Delete <i class="fas fa-trash-alt" title="Stergere"></i></button>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="d-flex justify-content-start mt-5">
                {{-- {{ $categories->links() }} --}}
            </div>

        </div>
      </div>
    </div>
  </div>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    window.deleteConfirm = function(formId) {
        Swal.fire({
            icon: 'question',
            text: 'Confirm the deletion of the selected row?',
            showCancelButton: true,
            confirmButtonText: 'Delete',
            confirmButtonColor: '#e3342f',
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById(formId).submit();
            }
        });
    }
</script>

@endsection
