@extends('admin.template')

@section('title', 'Edit Profile')

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
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" style="text-decoration: none; color:#fff;"> Back</a></li>
                    <li class="breadcrumb-item"><a style="color: #000;">Edit Profile - <span style="color: #fff;">{{ $user->name }}</span> </a></li>
                </ul>
              </div>

            </div>
          </div>
        </div>
      </div>
</div>

<div class="container-fluid ">

    <div class="row">

        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
            <div class="card-body">


                    <form id="edit" class="forms-sample" method="POST" action="{{ route('user.profile-update', $user->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label" for="Username">Name</label>
                                <div class="col-sm-9">
                                    <input name="name" type="text" class="form-control @error('name') is-invalid @enderror mb-3 text-white" id="Username" placeholder="Name" value="{{ $user->name }}" required>
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label" for="Email">Email</label>
                                <div class="col-sm-9">
                                    <input name="email" type="text" class="form-control @error('email') is-invalid @enderror mb-3 text-white" id="Email" placeholder="Email" value="{{ $user->email }}" required>
                                    @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label" for="Phone">Phone</label>
                                <div class="col-sm-9">
                                    <input name="phone" type="number" class="form-control @error('phone') is-invalid @enderror mb-3 text-white" id="Phone" placeholder="Phone" onKeyPress="if(this.value.length==10) return false;" maxlength="10" value="{{ $user->phone }}" required>
                                    @error('phone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label" for="Address">Address</label>
                                <div class="col-sm-9">
                                    <input name="address" type="text" class="form-control @error('address') is-invalid @enderror mb-3 text-white" id="Address" placeholder="Address" value="{{ $user->address }}" required>
                                    @error('address')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="formFile" class="col-sm-3 col-form-label">Upload Image</label>
                                <div class="col-sm-9">
                                    <div id="img-preview">
                                        <img id="photo-preview" src="{{ '/images/users/' . $user->photo  }}" alt="" style="max-width: 200px; max-height: 200px;">
                                    </div>
                                    <div class="custom-file">
                                        <input class="form-control text-white" accept="image/*" type="file" name="photo" id="photoFile">
                                    </div>
                                </div>
                                @error('photo') <span class="text-danger small">{{ $message }}</span>@enderror
                            </div>

                            <div class="d-flex justify-content-center mt-5 mb-3">
                                <button type="submit" class="btn btn-primary mr-2">Update Profile</button>
                            </div>
                    </form>


            </div>
            </div>
        </div>


        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="row">

                    <div class="col-md-6 text-center mb-5">
                        <h1 style="color: #b71661; ">Edit Password</h1>
                    </div>

                    <div class="col-md-6 text-center">
                        <div class="alert alert-info" role="alert" style="text-align: center;">
                            <p> <span style="color:red;">*</span> The password must contain at least:<br>
                                12 characters;<br>
                                1 figure;<br>
                                1 symbol;<br>
                                1 character uppercase;
                        </p>
                        </div>
                    </div>

                </div>


              <div class="card-body">


                    <form id="pass" class="forms-sample" method="POST" action="{{ route('user.editPass', $user->id) }}">
                        @csrf

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label" for="Password">Password</label>
                            <div class="col-sm-9">
                                <input name="password" type="password" class="form-control @error('password') is-invalid @enderror mb-3 text-white" id="Password" placeholder="Password" value="" minlength="8" required>
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label" for="Password_confirmation">Password Confirmation</label>
                            <div class="col-sm-9">
                                <input name="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror mb-3 text-white" value="" minlength="8" id="Password_confirmation" placeholder="Password Confirmation" required>
                                @error('Password_confirmation')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                            <div class="d-flex justify-content-center mt-5 mb-3">
                                <button type="submit" class="btn btn-primary mr-2">Reset Password</button>
                            </div>
                    </form>


              </div>
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

@endsection
