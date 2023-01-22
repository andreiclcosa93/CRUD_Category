@extends('admin.template')

@section('title', 'Users')

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
                    <li class="breadcrumb-item"><a style="color: #000;">Users</a></li>
                </ul>
              </div>

            </div>
          </div>
        </div>
      </div>
</div>
{{-- ===== end of breadcrumb ===== --}}

{{-- <div class="container-fluid mb-3">
    <div style="background-color: #b71661" class="text-center">
        <h1 style="color: #fff;">Users Section</h1>
    </div>
</div> --}}

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="row d-flex justify-content-between">
            <h4 class="card-title">Users - {{ $users->count() }}</h4>
                <a href="{{ route('users.new') }}" class="btn btn-success" style="margin-right:160px;">Create User</a>
        </div>

        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr class="text-center">
                <th> Name </th>
                <th> Email </th>
                <th> Created </th>
                <th> Role </th>
                <th> Photo </th>
                <th> Phone </th>
                <th> Address </th>
                <th> Actions </th>
              </tr>
            </thead>
            <tbody style="color: #fff;">
                @foreach($users as $user)
                    <tr class="text-center">
                        <td >{{ $user->name }}</td>
                        <td> {{ $user->email }} </td>
                        <td>{{ $user->created_at->format('d-m-Y ') }}</td>
                        <td> {{ $user->role }} </td>
                        <td>
                            <img src="/images/users/{{ $user->photo }}" alt="">
                        </td>
                        <td> {{ $user->phone }} </td>
                        <td> {{ $user->address }} </td>
                        <td class="d-flex inline ">
                            <a href="{{ route('users.editForm', $user->id) }}" class="btn btn-warning">Edit</a>

                            <form action="{{ route('users.delete', $user->id) }}" method="POST" id="form-delete-{{ $user->id }}">
                                @csrf
                                @method('delete')
                            </form>
                            <button class="btn btn-danger" onclick="event.preventDefault();deleteConfirm('form-delete-{{ $user->id }}')"
                                style="color: #000;">Delete <i class="fas fa-trash-alt" title="Stergere"></i></button>

                        </td>
                    </tr>
                @endforeach
            </tbody>
          </table>

          <div class="d-flex justify-content-start mt-5">
            {{ $users->links() }}
            {{-- {!! $users->links() !!} --}}
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
