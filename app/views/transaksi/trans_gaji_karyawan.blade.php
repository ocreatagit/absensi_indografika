@extends('template.master')

@section('title')
<title>ABSENSI - Input Data</title>
@stop

@section('header')
<h1 class="page-header">Input Data
    <small>Gaji</small>
</h1>
@stop

@section('main')
<div class="row">
    <div class="panel panel-default" id="infGaji">        
        <div class="panel-heading">
            <a href="{{ action('TransaksiGajiController@show') }}" class="btn btn-primary" data-toggle="tooltip" data-placement="left" title=""><i class="fa fa-backward"></i> Kembali</a>
        </div>
        <div class="panel-body">
            <form class="form-horizontal" action="{{ action("TransaksiGajiController@store") }}" method="POST">
                <div class="form-group">
                    <label class="col-sm-2 control-label">Nama Karyawan</label>
                    <div class="col-sm-3 input-group ">
                        <input type="text" class="form-control disabled" value="{{ $karyawan->nama }}" disabled=""/>
                        <input type="hidden" name="idkar" value="{{ $karyawan->idkar }}"/>
                    </div>
                </div>
                @foreach($gajis as $gaji)
                <div class="form-group">
                    <label class="col-sm-2 control-label">{{ $gaji->jenis }}</label>
                    <div class="col-sm-2 input-group ">
                        <input type="hidden" name="idgj[]" value="{{ $gaji->idgj }}" class="form-control"/>
                        <input type="text" name="nominalgaji[]" value="{{ $gaji->jmltglgj == null ? 0 : $gaji->jmltglgj }}" class="form-control"/>
                        <div class="input-group-addon">{{ $gaji->jntgh }}</div>
                    </div>
                </div>
                @endforeach
                <div class="form-group">
                    <label class="col-sm-2 control-label"></label>
                    <div class="col-sm-3">
                        <button type="submit" name="btn_submit" value="submit" class="btn btn-primary">Buat Gaji Karyawan</button>
                    </div>
                </div>
            </form>            
        </div>
    </div>
</div>
@stop

@section('script')
<script type="text/javascript">
</script> 
@stop



