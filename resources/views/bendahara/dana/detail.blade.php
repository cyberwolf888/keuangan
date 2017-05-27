@extends('layouts.backend')

@push('plugin_css')
@endpush

@push('page_css')
@endpush

@section('content')
    <!-- BEGIN PAGE HEAD-->
    <div class="page-head">
        <!-- BEGIN PAGE TITLE -->
        <div class="page-title">
            <h1>Dana Keluar
                <small>Detail</small>
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
            <span class="active">Detail</span>
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
                        <span class="caption-subject bold uppercase"> Detail</span>
                    </div>
                </div>

                <div class="portlet-body form">
                    <table class="table table-bordered m-n" cellspacing="0">
                        <tbody>
                        <tr>
                            <td>
                                <h4><small>Tanggal Keluar</small></h4>
                                <h4>{{ date('d/m/Y',strtotime($model->tgl_keluar)) }}</h4>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4><small>Jumlah</small></h4>
                                <h4>{{ number_format($model->jumlah,0,',','.') }}</h4>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4><small>Penerima</small></h4>
                                <h4>{{ $model->penerima }}</h4>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4><small>Status</small></h4>
                                <h4>{{ $model->getStatus() }}</h4>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4><small>Sisa</small></h4>
                                <h4>{{ number_format($model->sisa,0,',','.') }}</h4>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4><small>Keterangan</small></h4>
                                <h4>{{ $model->keterangan }}</h4>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4><small>Bukti</small></h4>
                                @if($model->bukti != "")
                                <h4><img src="{{ url('img/bukti/'.$model->bukti) }}" class="img-responsive"> </h4>
                                @endif
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
    <!-- END PAGE BASE CONTENT -->
@endsection

@push('plugin_scripts')
@endpush

@push('scripts')
@endpush