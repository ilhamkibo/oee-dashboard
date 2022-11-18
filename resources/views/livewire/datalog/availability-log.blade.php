<div class="mb-5">
    <h6 class="mt-2">
        {{ Breadcrumbs::render('availability') }}
    </h6>
    <div class="container p-1">
        <div class="table-responsive card ">
            <div class="card-header">
                All Data
            </div>
            <div class="card-body">
                <form class="row g-3" action="/datalog-availability">
                    <div class="col-auto">
                        <input type="date" class="form-control" id="filterDate" name="filterDate">
                    </div>
                    <div class="col-auto">
                      <button style="width: 110px;" type="submit" class="btn btn-info mb-3">Filter</button>
                      </div>
                </form>
                <table id="qtytable" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Machine Id</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Message</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($availabilities as $availability)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $availability->mc_id }}</td>
                            <td>{{ $availability->name }}</td>
                            <td>{{ $availability->status }}</td>
                            <td>{{ $availability->message }}</td>
                            <td>{{ $availability->created_at }}</td>
                            <td>{{ $availability->updated_at }}</td>
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
                        buttons:[
                            'excel','pdf','colvis'
                        ],
                        dom: "<'row'<'col-lg-2'l><'col-lg-5'B><'col-lg-5'f>>" +
                        "<'row'<'col-md-12'tr>>" + 
                        "<'row'<'col-md-5'i><'col-md-7'p>>",
                        responsive: true
                    });
                });
            </script>
        @endpush
    </div>
</div>
