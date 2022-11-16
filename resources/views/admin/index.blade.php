@extends('layouts.main')

@section('content')
    <div>
        <h6 class="mt-2">
            {{ Breadcrumbs::render('admin') }}
        </h6>

        @if (session()->has('success'))
            <div class="alert alert-success col-lg-8" role="alert">
                {{  session('success') }}
            </div>
        @endif

        <div class="container p-1">
            <div class="card">
                <div class="card-header">
                    All Data
                </div>
                <div class="card-body">
                    <table id="qtytable" class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Model</th>
                                <th>Status</th>
                                <th>Image</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach ($qualities as $quality)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $quality->Model }}</td>
                                <td>{{ $quality->Status }}</td>
                                <td><img type="button" loading="lazy" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="popUp('{{ $quality->Image}}')" id="popUping" src="{{ asset('T:/Image/'.$quality->Model.'jpg')}}" alt="" style="max-height: 100px; max-width:100px;"></td>
                                <td><img src="{{ asset('img/'.$quality->Model.'.jpg') }}" alt="" style="max-height: 100px; max-width:100px;"></td>
                                <td><img src="https://source.unsplash.com/1200x400?2" alt="" style="max-height: 100px; max-width:100px;"></td>
                                <td>{{ $quality->value_a }}</td>
                                <td>{{ $quality->value_b }}</td>
                                <td>{{ $quality->value_c }}</td>
                                <td>{{ $quality->created_at }}</td>
                            </tr>
                            @endforeach --}}
                            <tr>
                                <td>aa</td>
                                <td>aa</td>
                                <td>aa</td>
                                <td>aa</td>
                            </tr>
                        </tbody>
                    </table>
                    
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-body d-flex justify-content-center">
                                    <img id="popup-img" src="" alt="" style="max-width:450px;">
                                </div>
                                {{-- <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @push('js')
                <script>
                    $(document).ready(function () {
                        var table = $('#qtytable').DataTable({
                            buttons:[
                                'excel','pdf','colvis'
                            ],
                            dom: "<'row'<'col-lg-2'l><'col-lg-5'B><'col-lg-5'f>>" +
                            "<'row'<'col-md-12'tr>>" + 
                            "<'row'<'col-md-5'i><'col-md-7'p>>"
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