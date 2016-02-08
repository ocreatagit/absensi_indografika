@extends('template.master')

@section('title')
<title>ABSENSI - Input Data</title>
@stop

@section('header')
<h1 class="page-header">Input Data
    <small>Tabungan</small>
</h1>
@stop

@section('main')
<div class="row">
    <div class="col-sm-12" style="">
        <div class="panel panel-default">
            <div class="panel-heading"></div>
            <div class="panel-body">
                <div class="row">
                    <form class="form-horizontal" action="#">
                        <div class="col-sm-8">
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Nama Karyawan</label>
                                <div class="col-sm-6">
                                    <select class="form-control" name="idkar">
                                        <option value="1">Karyawan 1</option>
                                        <option value="2">Karyawan 2</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Status</label>
                                <div class="col-sm-6">                                        
                                    <input type="text" class="form-control" id="disabledInput" name="abscd" value="0001" disabled=""/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Jenis Pinjaman</label>
                                <div class="col-sm-6">
                                    <select class="form-control" name="idhut">
                                        <option value="Hutang">Hutang</option>
                                        <option value="Kas Bon">Kas Bon</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Angsuran</label>
                                <div class="col-sm-4">                                        
                                    <input type="text" class="form-control" name="nilang" value=""/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Jumlah Pinjaman</label>
                                <div class="col-sm-6">                                        
                                    <input type="text" class="form-control" name="nilang" value=""/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label"></label>
                                <div class="col-sm-6">                                        
                                    <button class="btn btn-primary"><i class="fa fa-plus-square"></i> Tambah Data</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <img src="http://placehold.it/120x150">
                        </div>
                    </form>
                </div>
                <div>
                    <h3 class="page-header"><i class="fa fa-info-circle"></i> Status Pinjaman Karyawan</h3>
                    <table class="table table-bordered table-hover" id="datatable">
                        <thead>
                            <tr>
                                <th class="text-center">Tanggal</th>
                                <th class="text-center">Nama Karyawan</th>
                                <th class="text-center">Total Pinjaman</th>
                                <th class="text-center">Jenis Pinjaman</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Opsi</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <tr>
                                <td>01-01-2016</td>
                                <td>Karyawan 1</td>
                                <td>Rp.<?php echo number_format(3000000, 0, ',', '.') ?>,-</td>
                                <td>Hutang</td>
                                <td>Belum Lunas</td>
                                <td><a href="#" class="btn btn-danger"><i class="fa fa-trash"></i></a></td>
                            </tr>
                            <tr>
                                <td>01-02-2016</td>
                                <td>Karyawan 2</td>
                                <td>Rp.<?php echo number_format(3000000, 0, ',', '.') ?>,-</td>
                                <td>Kas Bon</td>
                                <td>Belum Lunas</td>
                                <td><a href="#" class="btn btn-danger"><i class="fa fa-trash"></i></a></td>
                            </tr>
                            <tr>
                                <td>01-03-2016</td>
                                <td>Karyawan 1</td>
                                <td>Rp.<?php echo number_format(3400000, 0, ',', '.') ?>,-</td>
                                <td>Kas Bon</td>
                                <td>Belum Lunas</td>
                                <td><a href="#" class="btn btn-danger"><i class="fa fa-trash"></i></a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
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



