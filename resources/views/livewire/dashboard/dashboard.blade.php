<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <span class="ml-auto">Updated Report</span> 
            <a href="/" class="btn btn-icons border-0 p-2">
                <i class="icon-refresh"></i>
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-sm-flex align-items-baseline report-summary-header">
                                <h5 class="font-weight-semibold">Data Siswa Terdaftar</h5>
                            </div>
                        </div>
                        <div class="container">
                            <canvas id="allStudent"></canvas>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


</div>

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('allStudent').getContext("2d");

        var gradientStroke1 = ctx.createLinearGradient(500, 0,2100, 0);
        gradientStroke1.addColorStop(0, '#0a0a7a');
        gradientStroke1.addColorStop(1, '#f49080');

        var gradientStroke2 = ctx.createLinearGradient(500, 0,2100, 0);
        gradientStroke2.addColorStop(0, '#80b6f4');
        gradientStroke2.addColorStop(1, '#f49080');

        var gradientFill1 = ctx.createLinearGradient(500, 0, 100, 0);
        gradientFill1.addColorStop(0, "rgba(128, 182, 244, 0.6)");
        gradientFill1.addColorStop(1, "rgba(0, 212, 255, 1)");

        var gradientFill2 = ctx.createLinearGradient(500, 0, 100, 0);
        gradientFill2.addColorStop(0, "rgba(1, 10, 122, 1)");
        gradientFill2.addColorStop(1, "rgba(0, 212, 255, 1)");

        var allStudent = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ["JAN", "FEB", "MAR", "APR", "MAY", "JUN", "JUL", "AGS", "SEP", "OKT", "NOV", "DEC"],
                datasets: [
                    {
                        label: "Laki-laki",
                        borderColor: gradientStroke1,
                        pointBorderColor: gradientStroke1,
                        pointBackgroundColor: gradientStroke1,
                        pointHoverBackgroundColor: gradientStroke1,
                        pointHoverBorderColor: gradientStroke1,
                        pointBorderWidth: 10,
                        pointHoverRadius: 10,
                        pointHoverBorderWidth: 1,
                        pointRadius: 3,
                        fill: true,
                        backgroundColor: gradientFill1,
                        borderWidth: 1,
                        data: [100, 120, 150, 170, 180, 170, 160, 80, 30, 20, 129, 40]
                    },
                    {
                        label: "Perempuan",
                        borderColor: gradientStroke2,
                        pointBorderColor: gradientStroke2,
                        pointBackgroundColor: gradientStroke2,
                        pointHoverBackgroundColor: gradientStroke2,
                        pointHoverBorderColor: gradientStroke2,
                        pointBorderWidth: 10,
                        pointHoverRadius: 10,
                        pointHoverBorderWidth: 1,
                        pointRadius: 3,
                        fill: true,
                        backgroundColor: gradientFill2,
                        borderWidth: 1,
                        data: [120, 140, 170, 190, 210, 100, 120, 170, 160, 80, 30, 20]
                    },
            ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                animation: {
                    easing: 'easeInOutQuad',
                    duration: 520
                },
                scales: {
                    xAxes: [{
                        gridLines: {
                            color: 'rgba(200, 200, 200, 0.05)',
                            lineWidth: 1
                        }
                    }],
                    yAxes: [{
                        gridLines: {
                            color: 'rgba(200, 200, 200, 0.08)',
                            lineWidth: 1
                        }
                    }]
                },
                elements: {
                    line: {
                        tension: 0.4
                    }
                },
                legend: {
                    display: false
                },
                point: {
                    backgroundColor: 'white'
                },
                tooltips: {
                    titleFontFamily: 'Open Sans',
                    backgroundColor: 'rgba(0,0,0,0.3)',
                    titleFontColor: 'red',
                    caretSize: 5,
                    cornerRadius: 2,
                    xPadding: 10,
                    yPadding: 10
                },
            }
        });
    </script>
@endpush
