@extends('template.master')

@section('title')
<title>ABSENSI - Jabatan</title>
@stop

@section('header')
<h1 class="page-header">
    Daftar Pulang Kerja Karyawan
</h1>
@stop

@section('main')
<div class="row">
    <h3>18/01/2016 | 08:34:56</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <td>No Absen</td>
                <td>Nama Karyawan</td>
                <td>Jadwal jam pulang</td>
                <td>Login jam pulang</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>2345</td>
                <td>Tuti</td>
                <td>17:30</td>
                <td>17:32</td>
            </tr>
        </tbody>
    </table>
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
    });
</script> 
@stop



