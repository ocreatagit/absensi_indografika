@extends('template.master')

@section('title')
<title>ABSENSI - Master Karyawan</title>
@stop

@section('header')
<h1 class="page-header">Master Data
    <small>KARYAWAN</small>
</h1>
@stop

@section('main')
<div class="row">
    <div class="panel panel-default">
        <div class="panel-heading">Informasi Pribadi</div>
        <div class="panel-body">
            <form class="form-horizontal" action="{{ $action }}" method="POST">
                <div class="form-group">
                    <label class="col-sm-2 control-label">Nama</label>
                    <div class="col-sm-4 input-group ">
                        <input type="text" class="form-control" value="{{ Input::old('nama', $karyawan["nama"]) }}" name="nama">
                    </div>
                    @if($errors->first('nama'))
                    <div class="col-sm-4 col-sm-offset-2 alert alert-danger" style="margin-top: 5px; margin-bottom: 0px;">{{ $errors->first('nama') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Username</label>
                    <div class="col-sm-3 input-group ">
                        <input type="text" class="form-control" value="{{ Input::old('usernm', $karyawan["usernm"]) }}" name="usernm">
                    </div>
                    @if($errors->first('usernm'))
                    <div class="col-sm-4 col-sm-offset-2 alert alert-danger" style="margin-top: 5px; margin-bottom: 0px;">{{ $errors->first('usernm') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Kode Absensi</label>
                    <div class="col-sm-1 input-group ">
                        <input type="text" class="form-control" value="{{ Input::old('abscd', $karyawan["abscd"]) }}" name="abscd">
                    </div>
                    @if($errors->first('abscd'))
                    <div class="col-sm-4 col-sm-offset-2 alert alert-danger" style="margin-top: 5px; margin-bottom: 0px;">{{ $errors->first('abscd') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-3 input-group ">
                        <input type="password" class="form-control" value="{{ Input::old('passwd', $karyawan["passwd"]) }}" name="passwd">
                    </div>
                    @if($errors->first('passwd'))
                    <div class="col-sm-4 col-sm-offset-2 alert alert-danger" style="margin-top: 5px; margin-bottom: 0px;">{{ $errors->first('passwd') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Ulangi Password</label>
                    <div class="col-sm-3 input-group ">
                        <input type="text" class="form-control" name="passwd2" value="{{ Input::old('passwd2', $karyawan["passwd2"]) }}">
                    </div>
                    @if($errors->first('passwd2'))
                    <div class="col-sm-4 col-sm-offset-2 alert alert-danger" style="margin-top: 5px; margin-bottom: 0px;">{{ $errors->first('passwd2') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Tanggal Lahir</label>
                    <div class="col-sm-2 input-group ">
                        <input id="ttl" type="text" class="form-control" value="{{ Input::old('ttl', $karyawan["ttl"]) }}" name="ttl">
                    </div>
                    @if($errors->first('ttl'))
                    <div class="col-sm-4 col-sm-offset-2 alert alert-danger" style="margin-top: 5px; margin-bottom: 0px;">{{ $errors->first('ttl') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Alamat</label>
                    <div class="col-sm-4 input-group ">
                        <textarea style="width: 83.333%" name="addr1">{{ Input::old('addr1', $karyawan["addr1"]) }}</textarea>
                    </div>
                    @if($errors->first('addr1'))
                    <div class="col-sm-4 col-sm-offset-2 alert alert-danger" style="margin-top: 5px; margin-bottom: 0px;">{{ $errors->first('addr1') }}</div>
                    @endif
                </div>

            </form>
        </div>
    </div>
</div>

<div class="row">
    <div class="panel panel-default">
        <div class="panel-heading">Informasi Karyawan</div>
        <div class="panel-body">
            <form class="form-horizontal" action="#">
                <div class="form-group">
                    <label class="col-sm-2 control-label">Jabatan</label>
                    <div class="col-sm-3 input-group ">
                        <select class="form-control" name="idjb">
                            @foreach($jabatans as $jabatan)
                            <option value="{{ $jabatan->idjb }}">{{ $jabatan->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Komisi Omset</label>
                    <div class="col-sm-3 input-group ">
                        <input type="text" class="form-control" value="">
                        <span class="input-group-addon">
                            <span>%</span>
                        </span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Jam Masuk</label>
                    <div class="col-sm-3 input-group ">
                        <select class="form-control" name="idjk1">
                            @foreach($jamkerjas as $jamkerja)
                            <option value="{{ $jamkerja->idjk }}"><?php echo strftime("%H:%M", strtotime($jamkerja->jmmsk)) ?> - <?php echo strftime("%H:%M", strtotime($jamkerja->jmklr)) ?></option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Jam Istirahat</label>
                    <div class="col-sm-3 input-group ">
                        <select class="form-control" name="idjk2">
                            @foreach($jamistirahats as $jamistirahat)
                            <option value="{{ $jamistirahat->idjk }}"><?php echo strftime("%H:%M", strtotime($jamistirahat->jmmsk)) ?> - <?php echo strftime("%H:%M", strtotime($jamistirahat->jmklr)) ?></option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="row">
    <div class="panel panel-default">
        <div class="panel-heading">Informasi Gaji</div>
        <div class="panel-body">
            <form class="form-horizontal" action="#">
                <div class="form-group">
                    <label class="col-sm-2 control-label">Jenis Gaji</label>
                    <div class="col-sm-3 input-group ">
                        <select class="form-control" name="idgj">
                            @foreach($gajis as $gaji)
                            <option value="{{ $gaji->idgj }}">{{ $gaji->jenis }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Nominal Gaji</label>
                    <div class="col-sm-3 input-group ">
                        <input type="text" class="form-control" value="">                                    
                    </div>
                </div>
            </form>
            <hr>
            <div class="col-sm-6">
                <table class="table table-bordered table-hover" id="datatable">
                    <thead>
                        <tr>
                            <th class="text-left">Jenis Gaji</th>
                            <th class="text-left">Nominal Gaji</th>
                        </tr>
                    </thead>
                    <tbody class="text-left">
<!--                        <tr>
                            <td>Gaji Pokok</td>
                            <td>Rp. <?php echo number_format(800000, 0, ',', '.') ?>,-</td>
                        </tr>
                        <tr>
                            <td>Gaji Harian</td>
                            <td>Rp. <?php echo number_format(75000, 0, ',', '.') ?>,-</td>
                        </tr>-->
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



