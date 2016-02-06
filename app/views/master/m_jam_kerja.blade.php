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
    <!--<form class="form-horizontal" action="MasterJamKerjaController@save" method="POST">-->
    {{ Form::open(array('action' => 'MasterJamKerjaController@create', 'class' => 'form-horizontal')) }}
    @if(Session::has('mj02_success'))
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <i class="fa fa-info-circle"></i> {{ $mj02_success }}
    </div>    
    @endif

    @if(Session::has('mj02_failed'))
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <i class="fa fa-warning"></i> {{ $mj02_failed }}
    </div>    
    @endif

    <div class="form-group">
        <label class="col-sm-2 control-label">Jenis : </label>
        <div class="col-sm-4">
            <label class="radio-inline">
                <input type="radio" name="tipe" id="inlineRadio1" value="1" checked=""> Jam Kerja
            </label>
            <label class="radio-inline">
                <input type="radio" name="tipe" id="inlineRadio2" value="2"> Istirahat
            </label>
            <label class="radio-inline">
                <input type="radio" name="tipe" id="inlineRadio3" value="3"> Lembur
            </label>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">Jam Masuk</label>
        <div class="col-sm-4">
            <div class="col-sm-6 input-group clockpicker">
                <input type="text" class="form-control" value="" name="jmmsk">
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-time"></span>
                </span>
            </div>
            @if($errors->first('jmmsk'))
            <div class="col-sm-12 alert alert-danger" style="margin-top: 5px; margin-bottom: 0px;">{{ $errors->first('jmmsk') }}</div>
            @endif
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">Jam Keluar</label>
        <div class="col-sm-4">
            <div class="col-sm-6 input-group clockpicker">
                <input type="text" class="form-control" value="" name="jmklr">
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-time"></span>
                </span>
            </div>
            @if($errors->first('jmklr'))
            <div class="col-sm-12 alert alert-danger" style="margin-top: 5px; margin-bottom: 0px;">{{ $errors->first('jmklr') }}</div>
            @endif
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label"></label>
        <div class="col-sm-4 input-group">
            <button class="btn btn-success" type="submit" value="btn_submit"> <i class=" glyphicon glyphicon-floppy-disk"></i> Simpan</button>
        </div>
    </div>
    <hr>
    <div class="form-group">
        <div class="col-sm-6 control-label">
            <table class="table table-bordered" id="datatable">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Tipe</th>
                        <th class="text-center">Jam Masuk</th>
                        <th class="text-center">Jam Keluar</th>
                        <th class="text-center">Opsi</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php $no = 1; ?>
                    @foreach($jam_kerjas as $jam_kerja)
                    <tr>
                        <td>{{ $no }}</td>
                        <td>{{ $jam_kerja->tipe == 1 ? "Jam Kerja" : ($jam_kerja->tipe == 2 ? "Istirahat" : "Lembur") }}</td>
                        <td>{{ $jam_kerja->jmmsk }}</td>
                        <td>{{ $jam_kerja->jmklr; $no++; }}</td>
                        <td>
                            <a href="jamkerja/edit/{{ $jam_kerja->idjk }}" class="btn btn-info"><i class="fa fa-edit"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{ Form::close() }}
    <!--</form>-->
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

