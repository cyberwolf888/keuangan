@extends('layouts.backend')

@push('plugin_css')
<link href="{{ url('assets') }}/backend/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
<link href="{{ url('assets') }}/backend/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
@endpush

@push('page_css')
@endpush

@section('content')
    <!-- BEGIN PAGE HEAD-->
    <div class="page-head">
        <!-- BEGIN PAGE TITLE -->
        <div class="page-title">
            <h1>Dana Keluar
                <small>Add New Data</small>
            </h1>
        </div>
        <!-- END PAGE TITLE -->
    </div>
    <!-- END PAGE HEAD-->
    <!-- BEGIN PAGE BREADCRUMB -->
    <ul class="page-breadcrumb breadcrumb">
        <li>
            <a href="{{ route('bendahara.dashboard') }}">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="{{ route('bendahara.dana.manage') }}">Dana Keluar</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span class="active">Create</span>
        </li>
    </ul>
    <!-- END PAGE BREADCRUMB -->
    <!-- BEGIN PAGE BASE CONTENT -->
    <div class="row">
        <div class="col-md-6 ">

            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet light bordered">

                <div class="portlet-title">
                    <div class="caption font-red-sunglo">
                        <i class="icon-settings font-red-sunglo"></i>
                        <span class="caption-subject bold uppercase"> Add New Data</span>
                    </div>
                </div>

                <div class="portlet-body form">
                    {!! Form::open(['route' => isset($update) ? ['bendahara.dana.update', $model->id] : 'bendahara.dana.store', 'files' => true]) !!}
                    <div class="form-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-block alert-danger fade in">
                                <button type="button" class="close" data-dismiss="alert"></button>
                                <h4 class="alert-heading">Ooppss ada error.</h4>
                                @foreach ($errors->all() as $error)
                                    <p><i class="fa fa-close font-red-mint"></i>&nbsp;{{ $error }}</p>
                                @endforeach
                            </div>
                        @endif



                        @if(isset($update))
                        <div class="form-group form-md-line-input {{ $errors->has('status') ? ' has-error' : '' }}">
                            {!! Form::select('status', ['1'=>'Proses','2'=>'Selesai'], $model->status,['id'=>'status','placeholder'=>'','class'=>'form-control', 'required']) !!}
                            <label for="status">Status</label>
                        </div>

                        <div class="form-group form-md-line-input {{ $errors->has('sisa') ? ' has-error' : '' }}">
                            {!! Form::number('sisa', $model->sisa, ['id'=>'sisa','placeholder'=>'','class'=>'form-control', 'required','min'=>0]) !!}
                            <label for="harga">Sisa Dana</label>
                        </div>


                        <div class="form-group last">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                    <img src="{{ url('assets') }}/backend/global/img/no_image.png" alt="" /> </div>
                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                <div>
                                                        <span class="btn default btn-file">
                                                            <span class="fileinput-new"> Select image </span>
                                                            <span class="fileinput-exists"> Change </span>
                                                            <input type="file" name="image"> </span>
                                    <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="form-group form-md-line-input {{ $errors->has('tgl_keluar') ? ' has-error' : '' }}">
                            {!! Form::text('tgl_keluar', $model->tgl_keluar, ['id'=>'tgl_keluar','placeholder'=>'','class'=>'form-control date-picker', 'required', 'readonly']) !!}
                            <label for="tgl_keluar">Tanggal Keluar</label>
                        </div>

                        <div class="form-group form-md-line-input {{ $errors->has('jumlah') ? ' has-error' : '' }}">
                            {!! Form::number('jumlah', $model->jumlah, ['id'=>'jumlah','placeholder'=>'','class'=>'form-control', 'min'=>0, 'required']) !!}
                            <label for="jumlah">Jumlah</label>
                        </div>

                        <div class="form-group form-md-line-input {{ $errors->has('penerima') ? ' has-error' : '' }}">
                            {!! Form::text('penerima', $model->penerima, ['id'=>'penerima','placeholder'=>'','class'=>'form-control', 'required']) !!}
                            <label for="penerima">Penerima</label>
                        </div>

                        <div class="form-group form-md-line-input {{ $errors->has('keterangan') ? ' has-error' : '' }}">
                            {!! Form::textarea('keterangan', $model->keterangan, ['id'=>'keterangan','placeholder'=>'','class'=>'form-control']) !!}
                            <label for="keterangan">Keterangan</label>
                        </div>
                        @endif



                    </div>
                    <div class="form-actions noborder">
                        <button type="submit" class="btn blue">Submit</button>
                    </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
    <!-- END PAGE BASE CONTENT -->
@endsection

@push('plugin_scripts')
<script src="{{ url('assets') }}/backend/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
<script src="{{ url('assets') }}/backend/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
@endpush

@push('scripts')
<script>
    jQuery(document).ready(function(){
        jQuery().datepicker&&$(".date-picker").datepicker({
            format: 'dd-mm-yyyy',
            orientation:"left",
            autoclose:!0
        });
        $(document).scroll(function(){$(".date-picker").datepicker("place")});
    });

</script>
@endpush