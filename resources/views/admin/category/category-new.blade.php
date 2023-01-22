@extends('admin.template')

@section('title', 'Create Category')

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
                    <li class="breadcrumb-item"><a href="{{ route('admin.categories') }}" style="text-decoration: none; color:#fff;"> Back</a></li>
                    <li class="breadcrumb-item"><a style="color: #000;">Create new Category</a></li>
                </ul>
              </div>

            </div>
          </div>
        </div>
      </div>
</div>
{{-- ===== end of breadcrumb ===== --}}

{{-- <div class="container-fluid mb-3">
    <div class="card text-center" style="background-color: #b71661">
        <div class="card-body">
            <div class="row">
                <div class="col-md-3 text-left">
                    <a href="{{ route('users') }}" class="btn btn-light " style="margin-right:160px;"><i class="fas fa-undo"></i> Back</a>
                </div>

                <div class="col-md-6 text-center">
                    <h1 style="color: #fff;">Users-new Section</h1>
                </div>

                <div class="col-md-3 text-center">

                </div>
            </div>
        </div>
    </div>
</div> --}}


<div class="container-fluid d-flex justify-content-center">

    <div class="col-md-8">
        <div class="card">
          <div class="card-body">


                <form class="forms-sample" method="POST" action="{{ route('admin.categories.add') }}" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label" for="title">Title</label>
                            <div class="col-sm-9">
                                <input name="title" type="text" class="form-control @error('title') is-invalid @enderror mb-3 text-white" id="title" placeholder="Title" value="{{ old('title') }}" required>
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label" for="slug">Slug</label>
                            <div class="col-sm-9">
                                <input name="slug" type="text" class="form-control @error('slug') is-invalid @enderror mb-3 text-white" id="slug" placeholder="Slug" value="{{ old('slug') }}" required>
                                @error('slug')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label" for="Subtitle">Price</label>
                            <div class="col-sm-9">
                                <input name="subtitle" type="text" class="form-control @error('subtitle') is-invalid @enderror mb-3 text-white" id="Subtitle" placeholder="Price" value="{{ old('subtitle') }}" required>
                                @error('subtitle')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label" for="excerpt">Description</label>
                            <div class="col-sm-9">
                                <textarea name="excerpt" type="text" class="form-control @error('excerpt') is-invalid @enderror mb-3 text-dark" id="excerpt" placeholder="Excerpt" value="{{ old('excerpt') }}" required rows="6"></textarea>
                                @error('excerpt')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label" for="Views">Views</label>
                            <div class="col-sm-9">
                                <input name="views" type="number" defaultValue="0" min="0" onKeyPress="if(this.value.length==10) return false;" class="form-control @error('views') is-invalid @enderror mb-3 text-white" maxlength="10" id="Views" placeholder="Views" maxlength="10" value="{{ old('views') ? old('views') : 0 }}" required>
                                @error('views')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label" for="Position">Position</label>
                            <div class="col-sm-9">
                                <input name="position" type="number" class="form-control @error('position') is-invalid @enderror mb-3 text-white"  id="Position" placeholder="Position" value="{{ old('position') }}" required>
                                @error('position')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-check-label" for="Publish">Status</label>
                            <div class="col-sm-7 px-5">
                            <input name="publish" class="form-check-input" type="checkbox" value="1" id="Publish" {{ old('publish')==1 ? 'checked' : '' }}>
                            </div>
                        </div>

                        <div class="form-group row mb-5">
                            <label for="formFile" class="col-sm-3 col-form-label">Upload Image</label>
                            <div class="col-sm-9">
                                <div id="img-preview">
                                    <img id="photo-preview" src="/images/categories/category.png" alt="" style="max-width: 200px; max-height: 200px;">
                                </div>
                                <div class="custom-file">
                                    <input class="form-control text-white" accept="image/*" type="file" name="photo" id="photoFile">
                                </div>
                            </div>
                            @error('photo') <span class="text-danger small">{{ $message }}</span>@enderror
                         </div>


                         <div class="form-group row mt-5">
                            <label class="col-sm-3 col-form-label" for="meta_title">Meta Title</label>
                            <div class="col-sm-9">
                                <input name="meta_title" type="text" class="form-control @error('meta_title') is-invalid @enderror mb-3 text-white" id="meta_title" placeholder="Meta Title" value="{{ old('meta_title') }}" required>
                                @error('meta_title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label" for="meta_title">Meta description</label>
                            <div class="col-sm-9">
                                <input name="meta_title" type="text" class="form-control @error('meta_title') is-invalid @enderror mb-3 text-white" id="meta_title" placeholder="Meta description" value="{{ old('meta_title') }}" required>
                                @error('meta_title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label" for="meta_keywords">Meta keywords</label>
                            <div class="col-sm-9">
                                <input name="meta_keywords" type="text" class="form-control @error('meta_keywords') is-invalid @enderror mb-3 text-white" id="meta_keywords" placeholder="Meta keywords" value="{{ old('meta_keywords') }}" required>
                                @error('meta_keywords')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="d-flex justify-content-center mt-5 mb-3">
                            <button type="submit" class="btn btn-primary mr-2">Create Category</button>
                        </div>
                </form>


          </div>
        </div>
    </div>

</div>

@endsection

@section('customJs')

<script src="https:cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script>
<script>
    const chooseFile = document.getElementById("photoFile");
    const imgPreview = document.getElementById("img-preview");

    chooseFile.addEventListener("change", function () {
        getImgData();
    });

    function getImgData() {
        const files = chooseFile.files[0];
        if (files) {
            const fileReader = new FileReader();
            fileReader.readAsDataURL(files);
            fileReader.addEventListener("load", function () {
            imgPreview.style.display = "block";
            imgPreview.innerHTML = '<img src="' + this.result + '" style="max-width: 200px; max-height: 200px;"/>';
            });
        }
    }
</script>

<script>

    $('#title').on('blur',function(){

    var theTitle=this.value.toLowerCase().trim(),
        slugInput=$('#slug'),
        theSlug=theTitle.replace(/&/g,'-and-')
            .replace(/[^a-z0-9-]+/g,'-')
            .replace(/\-\-+/g,'-')
            .replace(/^-+|-+$/g,'');

    slugInput.val(theSlug);
    });

</script>

<script src="//cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>

<script>
    CKEDITOR.replace('excerpt');
</script>


@endsection
