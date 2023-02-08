<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4 class="m-0">Dashboard</h4>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            @if (Session::has('success'))
                <div class="alert alert-success" id="success-alert">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    <strong>Success! </strong> {{ Session::get('success') }}
                </div>
            @endif

            <!-- Main row -->
            <div class="row">
                <!-- right col (We are only adding the ID to make the widgets sortable)-->
                <section class="col-lg-12 connectedSortable">
                    <div class="card ">
                        <div class="card-header border-0">
                            <h3 class="card-title">
                                COLD-AISLE
                            </h3>
                        </div>
                        <div class="card-body card-gauge">
                            <div class="row" id="temphumid">
                                <div class="col-lg-6 col-6 flex-center">
                                    <input data-unit="°C" id="temp" type="text" data-width="80%" class="knob"
                                        data-thickness="0.125" data-angleArc="250" data-angleOffset="-125"
                                        value="0" data-fgColor="#3596EB" data-bgColor="rgba(0,0,0,0.2)" disabled
                                        readonly>
                                    <p>TEMP</p>

                                </div>
                                <div class="col-lg-6 col-6 flex-center">
                                    <input data-unit="%" id="humid" type="text" data-width="80%" class="knob"
                                        data-thickness="0.125" data-angleArc="250" data-angleOffset="-125"
                                        value="0"data-fgColor="#41E2BE" data-bgColor="rgba(0,0,0,0.2)" disabled
                                        readonly>
                                    <p>HUMID</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- right col -->
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <script>
        $(document).ready(function() {
            $("#success-alert").hide();
            $("#myWish").click(function showAlert() {
                $("#success-alert").fadeTo(2000, 500).slideUp(500, function() {
                    $("#success-alert").slideUp(500);
                });
            });
        });
    </script>
</div>
