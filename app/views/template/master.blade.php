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

    </head>

    <body>

        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    {{ HTML::link('/', 'ABSENSI', array('class' => 'navbar-brand'))}}
                </div>

                <!-- -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Master Data <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li>
                                    {{ HTML::link('jamkerja', 'Master Jam Kerja')}}
                                </li>
                                <li>
                                    {{ HTML::link('jabatan', 'Master Jabatan')}}
                                </li>
                                <li>
                                    {{ HTML::link('jenisgaji', 'Master Jenis Gaji')}}
                                </li>
                                <li>
                                    {{ HTML::link('karyawan', 'Master Karyawan')}}
                                </li>
                            </ul>
                        </li>
                        <li>
                            {{ HTML::link('myindografika', 'My Indografika')}}
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

                    </ul>
                </div><!-- /.navbar-collapse -->
                <!-- -->


            </div>
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
                    <div class="col-lg-12">
                        <p>Copyright &copy; Indografika</p>
                    </div>
                </div>
            </footer>

        </div>

        {{ HTML::script('js/jquery.js') }}
        {{ HTML::script('js/bootstrap.min.js') }}
        {{ HTML::script('js/clockpicker.js') }}
        {{ HTML::script('js/jquery.dataTables.min.js') }}

        @yield('script')
    </body>

</html>
