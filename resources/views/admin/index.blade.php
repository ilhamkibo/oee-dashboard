@extends('layouts.main')

@section('content')
    <div>
        <h6 class="mt-2">
            {{ Breadcrumbs::render('admin') }}
        </h6>
        <div class="container p-1">
            @if (session()->has('success'))
                <div class="alert alert-success col-lg-8" role="alert">
                    {{  session('success') }}
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    All Data
                </div>
                <div class="card-body">
                    <a href="/dashboard/admin/create" class="btn btn-primary mb-3">Create New User</a>

                    <table id="qtytable" class="table-responsive table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->is_admin ? 'admin' : 'not-admin' }}</td>
                                <td>
                                    <a href="/dashboard/admin/{{ $user->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                                    <form action="/dashboard/admin/{{ $user->id }}" method="post" class="d-inline">
                                      @method('delete')
                                      @csrf
                                      <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><span data-feather="x-circle"></span></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @push('js')
                <script>
                    $(document).ready(function () {
                        var table = $('#qtytable').DataTable({
                            // buttons:[
                            //     ''
                            // ],
                            // dom: "<'row'<'col-lg-2'l><'col-lg-5'B><'col-lg-5'f>>" +
                            // "<'row'<'col-md-12'tr>>" + 
                            // "<'row'<'col-md-5'i><'col-md-7'p>>",
                        responsive: true
                        });
                    });

                    function popUp(a) {
                        // alert(document.getElementById("popUping"))
                        console.log(a)
                        document.getElementById('popup-img').src = a;
                    }

                </script>
            @endpush
        </div>
    </div>
@endsection