<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        @yield('title')

        {{ HTML::style('css/bootstrap.min.css') }}
        {{ HTML::style('css/1-col-portfolio.css') }}
        {{ HTML::style('css/standalone.css') }}
        {{ HTML::style('css/clockpicker.css') }}
        {{ HTML::style('css/jquery.dataTables.min.css') }}
        {{ HTML::style('font-awesome/css/font-awesome.min.css') }}
        {{ HTML::style('alertifyjs/css/alertify.min.css') }}
        {{ HTML::style('jquery-ui/jquery-ui.min.css') }}
        {{ HTML::style('lightbox/css/lightbox.css') }}
        <style type="text/css">
            .ui-datepicker-year, .ui-datepicker-month{
                color: black;
            }
            #tambah:hover {
                background-color: none;
                color: white;
            }
            
            .red {
                color: red;
            }
            
            .green {
                color: green;
            }
            
            .blue {
                color: blue;
            }
            
            .marginTop08 {
                margin-top: 0.8%;
            }
            
            .marginTop25{
                margin-top: 2.5%;
            }
            
            #leftInfo img {
                text-align: center;
            }
        </style>
    </head>

    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    {{ HTML::link('/', 'ABSENSI', array('class' => 'navbar-brand'))}}
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Master Data <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li>
                                    {{ HTML::link('master/jamkerja', 'Master Jam Kerja')}}
                                </li>
                                <li>
                                    {{ HTML::link('master/jabatan', 'Master Jabatan')}}
                                </li>
                                <li>
                                    {{ HTML::link('master/jenisgaji', 'Master Jenis Gaji')}}
                                </li>
                                <li>
                                    {{ HTML::link('master/karyawan', 'Master Karyawan')}}
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Input Data <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li>{{ HTML::link('inputdata/hutang', 'Hutang')}}</li>
                                <li>{{ HTML::link('inputdata/tabungan', 'Tabungan')}}</li>
                                <li>{{ HTML::link('inputdata/gaji', 'Slip Gaji')}}</li>
                                <li>{{ HTML::link('inputdata/transfer', 'Transfer Gaji')}}</li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Daftar Jam <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li>
                                    {{ HTML::link('daftarmasuk', 'Daftar Masuk Karyawan')}}
                                </li>
                                <li>
                                    {{ HTML::link('daftarpulang', 'Daftar Pulang Karyawan')}}
                                </li>
                                <li>
                                    {{ HTML::link('daftarlembur', 'Daftar Lembur Karyawan')}}
                                </li>
                            </ul>
                        </li>
                        <li>
                            {{ HTML::link('myindografika', 'My Indografika')}}
                        </li>
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Fitur <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li>{{ HTML::link('myindografika/gajikaryawan', 'Histori Pembayaran Gaji')}}</li>
                                <li>{{ HTML::link('myindografika/tabungankaryawan', 'Tabungan Karyawan')}}</li>
                                <li>{{ HTML::link('myindografika/pinjamankaryawan', 'Laporan Pinjaman Karyawan')}}</li>
                            </ul>
                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->
                <!-- -->
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                @yield('header')
            </div>
        </div>
        @yield('main')
        <hr>

        <footer>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p>Copyright &copy; Indografika</p>
                </div>
            </div>
        </footer>

    </div>

    {{ HTML::script('js/jquery.js') }}
    {{ HTML::script('js/bootstrap.min.js') }}
    {{ HTML::script('js/clockpicker.js') }}
    {{ HTML::script('js/jquery.dataTables.min.js') }}
    {{ HTML::script('alertifyjs/alertify.min.js') }}
    {{ HTML::script('jquery-ui/jquery-ui.min.js') }}
    {{ HTML::script('lightbox/js/lightbox.js') }}

    <script>
        alertify.defaults.transition = "slide";
        alertify.defaults.theme.ok = "btn btn-primary";
        alertify.defaults.theme.cancel = "btn btn-danger";
        alertify.defaults.theme.input = "form-control";

        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        });
    </script>

    @yield('script')
</body>

</html>
