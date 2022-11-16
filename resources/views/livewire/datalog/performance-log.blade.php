<div>
    <h6 class="mt-2">
        {{ Breadcrumbs::render('performance') }}
    </h6>
    <div class="container p-1">
        <div class="card">
            <div class="card-header">
                All Data
            </div>
            <div class="card-body">
                <form class="row g-3" action="/datalog-performance">
                    <div class="col-auto">
                        <input type="date" class="form-control" id="filterDate" name="filterDate">
                    </div>
                    <div class="col-auto">
                      <button style="width: 110px;" type="submit" class="btn btn-info mb-3">Filter</button>
                      </div>
                </form>

                <table id="pertable" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Model</th>
                            <th>Ydoi</th>
                            <th>Timestamp</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($performances as $performance)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $performance->model }}</td>
                            <td>{{ $performance->ydoi }}</td>
                            <td>{{ $performance->waktu }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @push('js')
            <script>
                $(document).ready(function () {
                    var table = $('#pertable').DataTable({
                        buttons:[
                            'excel','pdf','colvis'
                        ],
                        dom: "<'row'<'col-lg-2'l><'col-lg-5'B><'col-lg-5'f>>" +
                        "<'row'<'col-md-12'tr>>" + 
                        "<'row'<'col-md-5'i><'col-md-7'p>>"
                    });
                });
            </script>
        @endpush
    </div>
</div>
