<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-sm-flex align-items-baseline report-summary-header">
                                <h5 class="font-weight-semibold">Report Summary</h5> <span class="ml-auto">Updated
                                    Report</span> <button class="btn btn-icons border-0 p-2"><i
                                        class="icon-refresh"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="row report-inner-cards-wrapper">
                        <div class=" col-md -6 col-xl report-inner-card">
                            <div class="inner-card-text">
                                <span class="report-title">TIKET TERJUAL</span>
                                <h4>RP. 32.123.000.000,00 </h4>
                                <span class="report-count"> 300 Terjual Hari Ini</span>
                            </div>
                            <div class="inner-card-icon bg-success">
                                <i class="icon-rocket"></i>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl report-inner-card">
                            <div class="inner-card-text">
                                <span class="report-title">TIKET BELUM DI APPROVE</span>
                                <h4>100.000 Tiket</h4>
                                <span class="report-count"> dari total 700.000 tiket</span>
                            </div>
                            <div class="inner-card-icon bg-danger">
                                <i class="icon-pencil"></i>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-sm-flex align-items-baseline report-summary-header">
                                <h5 class="font-weight-semibold">Data Tiket
                                    Terjual</h5> <span class="ml-auto">Updated
                                    Report</span> <button class="btn btn-icons border-0 p-2"><i
                                        class="icon-refresh"></i></button>
                            </div>
                        </div>
                        <div class="container">
                            <canvas id="myChart"></canvas>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>




    {{--  TOTAL INCOME MASUK KE MENU REPORTING  --}}
    {{-- <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <div class="row income-expense-summary-chart-text">
                        <div class="col-xl-4">
                            <h5>Income And Expenses Summary</h5>
                            <p class="small text-muted">A comparison of people who mark themselves of their ineterest
                                from the date range given above. Learn more.</p>
                        </div>
                        <div class=" col-md-3 col-xl-2">
                            <p class="income-expense-summary-chart-legend"> <span style="border-color: #6469df"></span>
                                Total Income </p>
                            <h3>$ 1,766.00</h3>
                        </div>
                        <div class="col-md-3 col-xl-2">
                            <p class="income-expense-summary-chart-legend"> <span style="border-color: #37ca32"></span>
                                Total Expense </p>
                            <h3>$ 5,698.30</h3>
                        </div>
                        <div class="col-md-6 col-xl-4 d-flex align-items-center">
                            <div class="input-group" id="income-expense-summary-chart-daterange">
                                <div class="inpu-group-prepend input-group-text"><i class="icon-calendar"></i></div>
                                <input type="text" class="form-control form-control-sm">
                                <div class="input-group-prepend input-group-text"><i class="icon-arrow-down"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}


</div>

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const labels = [
            'January',
            'February',
            'March',
            'April',
            'May',
            'June',
        ];

        const data = {
            labels: labels,
            datasets: [{
                label: 'My First dataset',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: [0, 10, 5, 2, 20, 30, 45],
            }]
        };

        const config = {
            type: 'line',
            data: data,
            options: {}
        };

        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
    </script>
@endpush
