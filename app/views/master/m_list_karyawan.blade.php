@extends('template.master')

@section('title')
<title>ABSENSI - Master Karyawan</title>
@stop

@section('header')
<h1 class="page-header">Master Data
    <small>DAFTAR KARYAWAN</small>
</h1>
@stop

@section('main')
<div class="row">
    <div class="panel panel-default">
        <div class="panel-heading">
            <a id="tambah" href="{{ action('MasterKaryawanController@create') }}" class="btn btn-primary"><i class="fa fa-plus-square"></i> Tambah Karyawan</a>
        </div>
        <div class="panel-body">
            <div class="col-sm-12">
                <table class="table table-bordered table-hover" id="datatable">
                    <thead>
                        <tr>
                            <th class="text-left">No</th>
                            <th class="text-left">Gambar</th>
                            <th class="text-left">Nama</th>
                            <th class="text-left">Username</th>
                            <th class="text-left">Jabatan</th>
                            <th class="text-left">Tanggal Lahir</th>
                            <th class="text-left">Alamat</th>
                            <th class="text-left">Saldo</th>                            
                            <th class="text-left">Status</th>                            
                            <th class="text-left">Opsi</th>
                        </tr>
                    </thead>
                    <tbody class="text-left">
                        <?php $no = 1; ?>
                        @foreach($karyawans as $karyawan)
                        <tr>
                            <td>{{ $no }}</td>
                            <td>{{ $karyawan->pic }}</td>
                            <td>{{ $karyawan->nama }}</td>
                            <td>{{ $karyawan->usernm }}</td>
                            <td>{{ $karyawan->idjb }}</td>
                            <td>{{ $karyawan->ttl }}</td>
                            <td>{{ $karyawan->addr1 }}</td>
                            <td>{{ $karyawan->tbsld }} <br> {{ $karyawan->htsld }}</td>
                            <td>{{ $karyawan->status == 'N' ? 'Tidak Aktif' : 'Aktif'; $no++; }}</td>
                            <td class="text-center">
                                <a href="{{ action('MasterKaryawanController@edit', $karyawan->idjb) }}" class="btn btn-info" data-toggle="tooltip" data-placement="left" title="Edit Data?"><i class="fa fa-edit"></i></a>
                                <a href="{{ action('MasterKaryawanController@destroy', $karyawan->idjb) }}" class="btn btn-danger delete" data-toggle="tooltip" data-placement="right" title="Hapus Data?"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop

@section('script')
<script type="text/javascript">
    $(document).ready(function () {
        $('.clockpicker').clockpicker({
            placement: 'bottom',
            align: 'left',
            donetext: 'Done'
        });
        $('#datatable').DataTable();

        $("#ttl").datepicker({
            inline: true,
            dateFormat: "dd-mm-yy",
            changeYear: true,
            changeMonth: true
        });
    });
</script> 
@stop



