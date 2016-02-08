@extends('template.master')

@section('title')
<title>ABSENSI - My Indografika</title>
@stop

@section('header')
<h1 class="page-header">My Indografika
    <small>Laporan Pinjaman</small>
</h1>
@stop

@section('main')
<div class="row">
    <div class="col-sm-2" style="margin-bottom: 10px;">
        <img src="http://placehold.it/200x250">
    </div>
    <div class="col-sm-10" style="padding-left: 35px;">
        <div class="panel panel-default">
            <div class="panel-heading">Laporan Pinjaman</div>
            <div class="panel-body">
                <form class="form-horizontal" action="#">
                    <div class="form-group">
                        <label class="col-sm-2 control-label"> Jenis Pinjaman</label>
                        <div class="col-sm-3">                                        
                            <select class="form-control" name="jenis">
                                <option value="Hutang">Hutang</option>
                                <option value="Kas Bon">Kas Bon</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Periode</label>
                        <div class="col-sm-6 input-group ">
                            <div class="col-sm-5">
                                <input type="text" class="form-control" value="">  
                            </div>
                            <label class="col-sm-2 control-label">s/d</label>
                            <div class="col-sm-4 input-group ">
                                <input type="text" class="form-control" value="">  
                            </div>
                        </div>
                    </div>                            
                    <div class="form-group">
                        <label class="col-sm-2 control-label"></label>
                        <div class="col-sm-3">                                        
                            <button class="btn btn-success"><i class="fa fa-search"></i> Filter</button>
                        </div>
                    </div>
                </form>    
                <hr>
                <table class="table table-bordered table-hover" id="datatable">
                    <thead>
                        <tr>
                            <th class="text-center">Tanggal</th>
                            <th class="text-center">Total Pinjaman</th>
                            <th class="text-center">Jenis Pinjaman</th>
                            <th class="text-center">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <tr>
                            <td>01-01-2016</td>
                            <td>Rp.<?php echo number_format(5000000, 0, ',', '.') ?>,-</td>
                            <td>Hutang</td>
                            <td>Lunas</td>
                        </tr>
                        <tr>
                            <td>01-02-2016</td>
                            <td>Rp.<?php echo number_format(200000, 0, ',', '.') ?>,-</td>
                            <td>Kas Bon</td>
                            <td>Lunas</td>
                        </tr>
                        <tr>
                            <td>04-03-2016</td>
                            <td>Rp.<?php echo number_format(600000, 0, ',', '.') ?>,-</td>
                            <td>Hutang</td>
                            <td>Belum Lunas</td>
                        </tr>
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
    });
</script> 
@stop



