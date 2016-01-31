@extends('template.master')

@section('title')
<title>ABSENSI - Jam Kerja</title>
@stop

@section('header')
<h1 class="page-header">Master Data
    <small>JAM KERJA</small>
</h1>
@stop

@section('main')
<div class="row">
    <form class="form-horizontal" action="#">
        <div class="form-group">
            <label class="col-sm-2 control-label">Jam Masuk</label>
            <div class="col-sm-2 input-group clockpicker">
                <input type="text" class="form-control" value="8:00">
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-time"></span>
                </span>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Jam Keluar</label>
            <div class="col-sm-2 input-group clockpicker">
                <input type="text" class="form-control" value="17:00">
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-time"></span>
                </span>
            </div>
        </div>
        <hr>
        <div class="form-group">
            <div class="col-sm-6 control-label">
                <table class="table" id="datatable">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Jam Masuk</th>
                            <th class="text-center">Jam Keluar</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <tr>
                            <td>1</td>
                            <td>08.00</td>
                            <td>17.00</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>09.00</td>
                            <td>18.00</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <hr>
        <div class="form-group">
            <label class="col-sm-2 control-label">Jam Istirahat</label>
            <div class="col-sm-3 input-group clockpicker">
                <span class="input-group-addon">Dari</span>
                <input type="text" class="form-control" value="17:00">
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-time"></span>
                </span>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label"></label>
            <div class="col-sm-3 input-group clockpicker">
                <span class="input-group-addon">Sampai</span>
                <input type="text" class="form-control" value="17:00">
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-time"></span>
                </span>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label"></label>
            <div class="col-sm-4 input-group">
                <button class="btn btn-success"> <i class=" glyphicon glyphicon-floppy-disk"></i> Simpan</button>
            </div>
        </div>
    </form>
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

