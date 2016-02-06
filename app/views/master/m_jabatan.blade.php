@extends('template.master')

@section('title')
<title>ABSENSI - Jabatan</title>
@stop

@section('header')
<h1 class="page-header">Master Data
    <small>JABATAN</small>
</h1>
@stop

@section('main')
<div class="row">
    {{ Form::open(array('action' => 'MasterJamKerjaController@create', 'class' => 'form-horizontal')) }}
    @if(Session::has('mj02_success'))
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <i class="fa fa-info-circle"></i> {{ $mj02_success }}
    </div>    
    @endif
    <div class="form-group">
        <label class="col-sm-2 control-label">Nama Jabatan</label>
        <div class="col-sm-4 input-group ">
            <input type="text" class="form-control" value="" name="nama">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label"></label>
        <div class="col-sm-4 input-group">
            <span class="input-group-addon">
                <input type="checkbox">
            </span>
            <input readonly type="text" class="form-control" value="Memiliki omset" name="flgomzt">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label"></label>
        <div class="col-sm-4 input-group">
            <button class="btn btn-success" type="submit" value="btn_submit"> <i class=" glyphicon glyphicon-floppy-disk"></i> Simpan</button>
        </div>
    </div>

    {{ Form:close() }}
    <hr>
    <div class="col-sm-6">
        <table class="table" id="datatable">
            <thead>
                <tr>
                    <th class="text-left">Nama Jabatan</th>
                    <th class="text-left">Status</th>
                </tr>
            </thead>
            <tbody class="text-left">
                <tr>
                    <td>Helper</td>
                    <td>Tidak memiliki omset</td>
                </tr>
                <tr>
                    <td>Operator</td>
                    <td>Memiliki omset</td>
                </tr>
            </tbody>
        </table>
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
    });
</script> 
@stop



