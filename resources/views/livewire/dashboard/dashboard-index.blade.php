<div class="mb-5">
    {{-- header --}}
    @push('css')
        <link rel="stylesheet" href="{{ asset('css/datalog.css') }}">
    @endpush
    <div class="content-header">
        <div class="container-fluid mt-2 mb-1">
            <div class="row">
                <div class="col-sm-8">
                    <h2> {{ $header }} <button class="btn border-secondary" onclick="reset()">Reset Zoom</button>
                    </h2>
                </div>
                <div class="col-sm-4 d-flex justify-content-end">
                    <ol class="breadcrumb mt-1">
                        <li class="breadcrumb-item">{{ auth()->user()->name }}</li>
                        <li class="breadcrumb-item active">{{ auth()->user()->email }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    {{-- Chart --}}
    <div class="row">
        <div class="col-lg-3 mb-1" >
            <div class="card">
                <div class="card-header" style="background-color: #7189BF;"> 
                    <strong>Key Performance Indicator</strong>
                </div>
                <div class="card-body mt-4">
                    <canvas id="myChart" style="height: 373px;"></canvas>
                </div>
            </div>
        </div>
        <div class="col-lg-6 mb-1">
            <div class="row">
                <div class="col-sm-4 mb-1">
                    <div class="card text-center">
                        <div class="card-header" style="background-color: #DF7599;">
                            <strong>Performance</strong>
                        </div><br>
                            <span class="card-title text-muted">Target Quantity</span>
                            <h5 class="font-weight-bold" id="tarPrf">-</h5>
                            <span class="card-title text-muted">Actual Quantity</span>
                            <h5 class="font-weight-bold" id="actPrf">-</h5>
                            <span class="card-title text-muted">Persentase</span>
                            <h5 class="font-weight-bold" id="perPrf">-</h5>
                    </div>
                </div>
                <div class="col-sm-4 mb-1">
                    <div class="card text-center">
                        <div class="card-header" style="background-color: #FFC785;">
                            <strong>Quality</strong> 
                        </div><br>
                            <span class="card-title text-muted">Total Product</span>
                            <h5 class="font-weight-bold" id="totQty">-</h5>
                            <span class="card-title text-muted">OK Product</span>
                            <h5 class="font-weight-bold" id="okQty">-</h5>
                            <span class="card-title text-muted">NG Product</span>
                            <h5 class="font-weight-bold" id="ngQty">-</h5>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card text-center">
                        <div class="card-header" style="background-color: #72D6C9;">
                            <div class="row">
                                <div class="col-sm-6">
                                    <select class="form-select" id="mySelect" style="width:70px;">
                                        <option value="3">All</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                    </select>
                                </div>
                                <div class="col-sm-6 pt-2 text-start">
                                    <strong>Availability</strong> 
                                </div>
                            </div>
                        </div><br>
                            <span class="card-title text-muted">Total Operation Time</span>
                            <h5 class="font-weight-bold" id="totAvl">- mins</h5>
                            <span class="card-title text-muted">Runtime</span>
                            <h5 class="font-weight-bold" id="actAvl">- mins</h5>
                            <span class="card-title text-muted">Downtime</span>
                            <h5 class="font-weight-bold" id="donAvl">- mins</h5>
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-sm-4 mb-1">
                    <div class="card">
                        <canvas id="DonutPer" style="height:215px"></canvas>
                    </div>
                </div>
                <div class="col-sm-4 mb-1 mx-0">
                    <div class="card">
                        <canvas id="DonutQty" style="height:215px"></canvas>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card">
                        <canvas id="DonutAvl" style="height:215px"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="row">
                <div class="col">
                    <div class="card" style="height: 151px;">
                        <canvas id="barPer"></canvas>
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col">
                    <div class="card" style="height: 151px;">
                        <canvas id="barQty"></canvas>
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col">
                    <div class="card" style="height: 151px;">
                        <canvas id="barAvl"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card mt-1">
        <div class="row">
            <div class="col">
                  <canvas id="RunChart1" style="height:100px"></canvas>
            </div>
        </div>
        <div class="row">
            <div class="col">
                    <canvas id="RunChart2" style="height:60px"></canvas>
            </div>
        </div>
    </div>
    @push('js')
        @livewire('chart-config')
        @livewire('data-chart')
    @endpush
</div>
