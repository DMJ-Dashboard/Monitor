<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
    integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
<script src="https://kit.fontawesome.com/4c68d22cde.js" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
    integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('/dmj/style.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">

<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

<style>
    @media only screen and (min-device-width: 420px) {
        .kolom__jcust {
            font-size: 13px !important;
            padding: 0px !important;
        }
    }

    .kolom__jcust {
        font-size: 13px !important;
        padding: 0 !important;
    }

    .nav-pills {
        --bs-nav-pills-border-radius: 0.375rem;
        --bs-nav-pills-link-active-color: #fff;
        --bs-nav-pills-link-active-bg: #1f656b !important;
    }

    body {
        /* zoom: 0.9;
        -moz-transform: scale(0.9);
        -webkit-zoom: 0.9; */
    }
</style>

<head>
    <meta charset="utf-8">
    <meta http-equiv="refresh" content="1500; url=/dashboard_DMJ">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="{{ asset('/dmj/dist/css/style.css') }}">
    <link rel="icon" href="{{ url('') }}/dmj/dist/img/LOGO_DMJ.png" type="image/x-icon">
    <title>DMJ DASHBOARD - 2022</title>

</head>
<nav class="navbar navbar-expand-lg navbar-light bg-light px-5"
    style="background-color: #324c5c !important; border: 0.2px rgba(255, 255, 255, 0.425);
border-style: solid; color:aliceblue !important; padding-bottom: 0;">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03"
        aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand text-white" href="#">
        <img src="{{ url('') }}/dmj/dist/img/LOGO_DMJ.png" alt="logo dmj" id="logo__nav">
        <b>
            DISTRINDO
        </b>
    </a>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Companys
                </a>
                <ul class="dropdown-menu"
                    style="background-color: #233945; border: 1px #00ffbb; color: white; border-style: solid;">
                    <li><a class="dropdown-item" href="{{ route('DMJBTA') }}">DMJ Batu Raja</a></li>
                    <li><a class="dropdown-item" href="{{ route('DMJS') }}">DMJ Palembang</a></li>
                    <li><a class="dropdown-item" href="{{ route('IKA') }}">IKA Palembang</a></li>
                    <li><a class="dropdown-item" href="{{ route('IKABDG') }}">IKA Bandung</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="{{ route('IKA') }}">IKA All</a></li>
                    <li><a class="dropdown-item" href="{{ route('DMJS') }}">DMJ ALL</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Report
                </a>
                <ul class="dropdown-menu"
                    style="background-color: #233945; border: 1px #00ffbb; color: white; border-style: solid;">
                    <li><a class="dropdown-item" target="_blank" href="{{ route('Report') }}">Eging CustLog</a></li>
                    <li><a class="dropdown-item" target="_blank" href="{{ route('CustKartu') }}">Customer Kartu</a></li>

                </ul>
            </li>
        </ul>
    </div>
</nav>
<div class="wrapper">
    <div class="content">
        <section id="analytics-cards-dmj">
            <div class="dashboard px-3 pt-3">
                <div class="row">
                    <div class="col-sm-12 col-md-7 col-lg-7">
                        <div class="card"
                            style="background-color: #324c5c !important; border: 0.2px rgba(255, 255, 255, 0.425); border-style: solid;">
                            <div class="card-header"
                                style="background-color: #2e5266 !important; border: 0.2px rgba(255, 255, 255, 0.329);">
                                <h3 class="card-title">INFORMASI MONTHLY </h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-bs-target="#modalfilter"
                                        data-bs-toggle="modal">
                                        <i style="color: rgb(255, 255, 255) !important;" class="fa-solid fa-filter"></i>
                                    </button>
                                    {{-- <button type="button" class="btn btn-tool" data-card-widget="maximize">
                                        <i class="fas fa-expand" style="color: rgb(255, 255, 255) !important;"></i>
                                    </button> --}}
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i style="color: rgb(255, 255, 255) !important;" class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body" style="background-color: #243b47 !important;">
                                <div class="row">
                                    <div class="col-md-6 col-lg-3 col-sm-6 col-12">
                                        <div class="info-box shadow-lg"
                                            style="background-color: #29404d !important; border: 0.2px rgba(255, 255, 255, 0.329);
                                    border-style: solid;">
                                            <span class="info-box-icon" style="background: transparent !important;">
                                                <a href="#">
                                                    <i class="fa-solid fa-hand-holding-dollar"
                                                        style="color: #3cd2a5 !important;"></i>
                                                </a>
                                            </span>
                                            <div class="info-box-content">
                                                <?php

                                                setlocale(LC_TIME, 'id_ID.utf8');
                                                $hariIni = new DateTime();
                                                $curent_bln = strftime('%B %Y');

                                                ?>
                                                <span class="info-box-text">Faktur Penjualan </span>
                                                <hr style="padding: 0 !important; margin: 0 !important;">
                                                <span class="info-box-number">  {{ $penjaualndb22 }} Faktur
                                                    Jual</span>
                                                <span class="info-box-number">  Rp
                                                    {{ number_format($sumpenjualandb22, 0, '.' . '.') }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3 col-sm-6 col-12">
                                        <div class="info-box shadow-lg"
                                            style="background-color: #29404d !important; border: 0.2px rgba(255, 255, 255, 0.329);
                                    border-style: solid;">
                                            <span class="info-box-icon" style="background: transparent !important;">
                                                <a href="#">
                                                    <i class="fa-solid fa-right-left"
                                                        style="color: #3cd2a5 !important;"></i>
                                                </a>
                                            </span>
                                            <div class="info-box-content">
                                                <?php

                                                setlocale(LC_TIME, 'id_ID.utf8');
                                                $hariIni = new DateTime();
                                                $curent_bln = strftime('%B %Y');

                                                ?>
                                                <span class="info-box-text">Retur Penjualan </span>
                                                <hr style="padding: 0 !important; margin: 0 !important;">
                                                <span class="info-box-number">  {{ $countreturgeneral }} Retur
                                                    Jual
                                                </span>
                                                <span class="info-box-number">Rp {{ number_format($sumstretur, 0, '.' . '.') }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3 col-sm-6 col-12">
                                        <div class="info-box shadow-lg"
                                            style="background-color: #29404d !important; border: 0.2px rgba(255, 255, 255, 0.329);
                                    border-style: solid;">
                                            <span class="info-box-icon" style="background: transparent !important;">
                                                <a href="#">
                                                    <i class="fa-solid fa-money-bill-trend-up"
                                                        style="color: #3cd2a5 !important;"></i>
                                                </a>
                                            </span>
                                            <div class="info-box-content">
                                                <?php

                                                setlocale(LC_TIME, 'id_ID.utf8');
                                                $hariIni = new DateTime();
                                                $curent_bln = strftime('%B %Y');

                                                ?>
                                                <span class="info-box-text">Piutang </span>
                                                <hr style="padding: 0 !important; margin: 0 !important;">
                                                <span class="info-box-number">  {{ $countspiutang }} Faktur
                                                    Piutang
                                                </span>
                                                <span class="info-box-number">Rp
                                                    {{ number_format($sumspiutang, 0, '.' . '.') }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3 col-sm-6 col-12">
                                        <div class="info-box shadow-lg"
                                            style="background-color: #29404d !important; border: 0.2px rgba(255, 255, 255, 0.329);
                                    border-style: solid;">
                                            <span class="info-box-icon" style="background: transparent !important;">
                                                <a href="#" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal">
                                                    <i class="fa-brands fa-cc-mastercard"
                                                        style="color: #3cd2a5 !important;"></i>
                                                </a>
                                            </span>
                                            <div class="info-box-content">
                                                <?php

                                                setlocale(LC_TIME, 'id_ID.utf8');
                                                $hariIni = new DateTime();
                                                $curent_bln = strftime('%B %Y');

                                                ?>
                                                <span class="info-box-text">Hutang </span>
                                                <hr style="padding: 0 !important; margin: 0 !important;">
                                                <span class="info-box-number">  {{ $countshutang }} Faktur Hutang
                                                </span>
                                                <span class="info-box-number">Rp
                                                    {{ number_format($sumshutang, 0, '.' . '.') }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr class="mt-4">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h6>
                                            MONTHLY OA SALESMAN (Sales - Target) <i alt="Info_warna"
                                                data-bs-target="#modalinfowarna" data-bs-toggle="modal"
                                                class="fa-solid fa-circle-info fa-beat-fade fa-lg"
                                                style="cursor: pointer !important;"></i>
                                        </h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <a href="#">
                                            <button data-bs-target="#modaltarget" data-bs-toggle="modal"
                                                class="btn btn-outline-info float-right m-2 top-1">Make Target</button>
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <center>
                                            <div class="row">
                                                @foreach ($targets as $datas)
                                                    <div id="kolom__jcust" style="padding: 0 !important;"
                                                        class="col-lg-2 col-sm-2 col-md-3 text-center mt-2">
                                                        @foreach ($countsales as $datac)
                                                            @if ($datac->Kdslm == $datas->salesmans->KdSlm)
                                                                @if ($datac->csales >= $datas->jcust || $datac->csales == $datas->jcust)
                                                                    <input data-readonly="true" type="text"
                                                                        class="knob" value="{{ $datac->csales }}"
                                                                        data-width="90" data-height="90"
                                                                        data-fgColor="#80d1d0" data-min="0"
                                                                        data-max={{$datas->jcust}}>
                                                                    <div class="knob-label"
                                                                        style="padding-top: 1rem !important;">
                                                                        {{ $datas->salesmans->NmSlm }} -
                                                                        {{ $datas->jcust }}
                                                                    </div>
                                                                @elseif($datac->csales < '100')
                                                                    <input data-readonly="true" type="text"
                                                                        class="knob" value="{{ $datac->csales }}"
                                                                        data-width="90" data-height="90"
                                                                        data-fgColor="#ff3333" data-min="0"
                                                                        data-max={{$datas->jcust}}>
                                                                    <div class="knob-label"
                                                                        style="padding-top: 1rem !important;">
                                                                        {{ $datas->salesmans->NmSlm }} -
                                                                        {{ $datas->jcust }}
                                                                    </div>
                                                                @elseif($datac->csales < '125')
                                                                    <input data-readonly="true" type="text"
                                                                        class="knob" value="{{ $datac->csales }}"
                                                                        data-width="90" data-height="90"
                                                                        {{-- data-fgColor="#91e32d" data-min="0" --}} data-fgColor="#fff873"
                                                                        data-min="0" data-max={{$datas->jcust}}>
                                                                    <div class="knob-label"
                                                                        style="padding-top: 1rem !important;">
                                                                        {{ $datas->salesmans->NmSlm }} -
                                                                        {{ $datas->jcust }}
                                                                    </div>
                                                                @elseif($datac->csales >= '125')
                                                                    <input data-readonly="true" type="text"
                                                                        class="knob" value="{{ $datac->csales }}"
                                                                        data-width="90" data-height="90"
                                                                        data-fgColor="#a6f04d" data-min="0"
                                                                        data-max={{$datas->jcust}}>
                                                                    <div class="knob-label"
                                                                        style="padding-top: 1rem !important;">
                                                                        {{ $datas->salesmans->NmSlm }} -
                                                                        {{ $datas->jcust }}
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                @endforeach
                                            </div>
                                        </center>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-5 col-lg-5">
                        <div class="card" style="background-color: #29404d !important;">
                            <div class="card-header" style="background-color: #2e5266 !important;">
                                <h3 class="card-title">
                                    <i class="fas fa-chart-pie mr-1"></i>
                                    Perfomance
                                </h3>
                                <div class="card-tools">
                                    <ul class="nav nav-pills ml-auto">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="#sales-call" data-toggle="tab"> <b> Call
                                                    Daily </b>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#sales-sum" data-toggle="tab">
                                                <b>Monthly Salesman</b></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#revenue-chart" data-toggle="tab">
                                                <b>Monthly Sales Out</b></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="tab-content p-0">
                                    <div class="chart tab-pane active" id="sales-call"
                                        style="position: relative;">
                                        <div class="card card-secondary">
                                            <div class="card-header">
                                                <div class="row">
                                                    <div class="col-sm-9">
                                                        {{-- <h3 class="card-title">Daily Effective Call OA</h3> --}}
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <button data-bs-target="#rincicardsaleslog"
                                                            data-bs-toggle="modal"
                                                            class="btn btn-outline-info float-right m-2 top-1">DETAIL</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div id="containercall" style="overflow: hidden;">
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="chart tab-pane" id="sales-sum"
                                        style="position: relative;height: 556px;">
                                        <div class="card card-secondary">
                                            <div class="card-header">
                                                {{-- <div class="row">
                                                    <div class="col-sm-9">
                                                        <h3 class="card-title">Sales Out Salesman</h3>
                                                    </div>
                                                </div> --}}
                                            </div>
                                            <div class="card-body">
                                                <div id="containersum"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="chart tab-pane" id="revenue-chart"
                                        style="position: relative; height: 600px;">
                                        <div id="containercolumn"></div>
                                    </div>

                                    <div class="chart tab-pane" id="sales-chart"
                                        style="position: relative;height: 556px;">
                                        <div class="card card-secondary">
                                            <div class="card-header">
                                                <div class="row">
                                                    <div class="col-sm-9">
                                                        <h3 class="card-title">Grafik Delivery</h3>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <button data-bs-target="#modallog" data-bs-toggle="modal"
                                                            class="btn btn-outline-info float-right m-2 top-1"
                                                            style="
                                                        padding-top: 3;
                                                        padding-bottom: 3;">Analys
                                                            Log</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div id="containerareaspline"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center align-items-center">
                    {{-- <div class="col-sm-4 col-md-3 col-lg-3"> --}}
                    <div class="col-sm-4 col-md-2 col-lg-2 info-box mb-3 bg-white mx-2">
                        <span class="info-box-icon text-success">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#modaldelivery">
                                <i class="fa-solid fa-truck fa-beat-fade" style="--fa-secondary-color: #4b6eaa;"></i>
                                {{-- <i class="fa-solid fa-warehouse"></i> --}}
                            </a>
                        </span>
                        <div class="info-box-content">
                            <span class="info-box-text">Delivery Daily </span>
                            <span class="info-box-number">
                                <p class="text-success"> {{ $deliverydraft }} - - {{ $deliverydatbatal }}</p>
                            </span>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-2 col-lg-2 info-box mb-3 bg-white mx-2">
                        <span class="info-box-icon text-success">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#modalsaldostok">
                                <i class="fa-solid fa-warehouse"></i>
                            </a>
                        </span>

                        <div class="info-box-content">
                            <span class="info-box-text">Warehouse Balance</span>
                            <span class="info-box-number">
                                Rp {{ number_format($totalsaldostok, 0, '.' . '.') }}
                            </span>
                        </div>

                    </div>
                    <div class="col-sm-4 col-md-2 col-lg-2 info-box mb-3 bg-white mx-2">
                        <span class="info-box-icon text-warning"><i
                                class="fa-solid fa-spin fa-arrows-rotate"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Monthly Retur Beli</span>
                            <span class="info-box-number">
                                Rp {{ number_format($sumreturbeli, 0, '.' . '.') }}
                            </span>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-2 col-lg-2 info-box mb-3 bg-white mx-2">
                        <span class="info-box-icon text-info"><i
                                class="fas fa-cloud-download-alt fa-bounce"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Total SO Daily</span>
                            <span class="info-box-number" style="font-size: 1.3rem">
                                Rp {{ number_format($sumsodaily, 0, '.' . '.') }}
                            </span>
                        </div>

                    </div>
                    <div class="col-sm-4 col-md-2 col-lg-2 info-box mb-3 bg-white mx-2">
                        <span class="info-box-icon text-red"><i class="fa-solid fa-circle-xmark fa-flip"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Monthly Faktur Batal</span>
                            <span class="info-box-number">
                                Rp {{ number_format($fakturbatal, 0, '.' . '.') }}
                            </span>
                        </div>

                    </div>

                </div>
            </div>
        </section>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">RINCIAN HUTANG PRINCIPAL</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-9 col-sm-12">
                        <div id="containerpie"></div>
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <div class="col-md">
                            <ul class="chart-legend clearfix">
                                @foreach ($sumshutangperprincipal as $datak)
                                    @foreach ($supplier as $datas)
                                        @if ($datak->KdSupplier == $datas->KdSupplier)
                                            <li style="font-size: 12px">{{ $datak->KdSupplier }} :
                                                {{ $datas->NamaSupplier }}</li>
                                        @endif
                                    @endforeach
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-hover" id="datatable">
                        <thead>
                            <tr>
                                <th>Supplier</th>
                                <th>Netto</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sumshutangperprincipal as $data)
                                <tr>
                                    <td>{{ $data->KdSupplier }}</td>
                                    <td>Rp {{ number_format($data->sumprincipal, 0, '.' . '.') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">Lihat
                    Detail JTempo</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modaldelivery" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">RINCIAN DELIVERY ORDER</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-9 col-sm-12">
                        <div id="containerpie"></div>
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <div class="col-md">
                            <ul class="chart-legend clearfix">
                                {{-- @foreach ($deliverydata as $datak)
                                        @if ($datak->KdSupplier == $datas->KdSupplier)
                                            <li style="font-size: 12px">{{ $datak->KdSupplier }} :
                                                {{ $datas->NamaSupplier }}</li>
                                        @endif
                                    @endforeach
                                @endforeach --}}
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-hover" id="datatables">
                        <thead>
                            <tr>
                                <th>Draft</th>
                                <th>Jadwal</th>
                                <th>Tglkirim</th>
                                <th>Keterangan</th>
                                <th>Waktu Kirim</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($deliverydata as $data)
                                <tr>
                                    <td>{{ $data->Nodraft }}</td>
                                    <td>{{ $data->Tgl }}</td>
                                    <td>{{ $data->Tglkirim }}</td>
                                    <td>{{ $data->Keterangan }}</td>
                                    <td>
                                        @if ($data->Waktu_kirim > 3)
                                            <p class="" style="color: #ff0101 !important;">
                                                {{ $data->Waktu_kirim }} Hari </p>
                                        @else
                                            <p class="" style="color: #000000 !important;">
                                                {{ $data->Waktu_kirim }} Hari </p>
                                        @endif
                                    </td>
                                    <td>{{ $data->Status_Kirim }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                {{-- <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">Lihat
                    Detail JTempo</button> --}}
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modallog" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2"
    tabindex="-1">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">LOG SALES DAILY {{ date('Y-m-d') }}
                </h1>
                <button type="button" class="btn-close" data-bs-target="#rincicardsaleslog"
                    data-bs-toggle="modal"></button>
            </div>
            <div class="card">
                <div class="card-header" style="background-color: #243b47">
                    <div class="card-tools">
                        <ul class="nav nav-pills ml-auto text-black">
                            <li class="nav-item">
                                <a class="nav-link active" href="#cust-log" data-toggle="tab"> <b> Cust Log </b>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#tagihan-log" data-toggle="tab">
                                    <b>Tagihan Log</b></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    {{-- MAINTANCE --}}
                    {{-- <div class="tab-content p-0">
                        <div class="chart tab-pane active" id="cust-log">
                            <center>
                                <b>SALESMAN CHECKIN DAILY</b>
                            </center>
                            <div class="modal-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover text-dark" id="tblAkun">
                                        <thead style="text-align: center !important;">
                                            <tr class="text-dark">
                                                <th text-align="center">No</th>
                                                <th align="center">Nama Salesman</th>
                                                <th align="center">Nama Customer</th>
                                                <th align="center">Cek In</th>
                                                <th align="center">Cek Out</th>
                                                <th align="center">Waktu Digunakan</th>
                                                <th align="center">Status Call</th>
                                                <th align="center">Sales Order</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-dark">
                                            <?php $no = 1;
                                            ?>
                                            @foreach ($custlogs1 as $data)
                                                <tr>
                                                    <td align="center" width="1%">{{ $no++ }}</td>
                                                    <td width="2%">{{ $data->Nmslm }}</td>
                                                    <td width="5%">( {{ $data->custno }} ) -
                                                        {{ $data->custname }}
                                                    </td>
                                                    <td width="2%">{{ $data->cekin }}</td>
                                                    <td width="2%">{{ $data->cekout }}</td>
                                                    @if ($data->used_time <= '00:05:00')
                                                        <td width="2%" class="text-danger"> <b>
                                                                {{ $data->used_time }} </b>
                                                        </td>
                                                    @else
                                                        <td width="2%">{{ $data->used_time }}</td>
                                                    @endif
                                                    @if ($data->status == 'Gagal')
                                                        <td width="10%">{{ $data->status }} (
                                                            {{ $data->alasangagal }}
                                                            )</td>
                                                    @elseif ($data->status == 'Sukses')
                                                        <td width="10%">{{ $data->status }}</td>
                                                    @endif
                                                    <td width="7%">Rp
                                                        {{ number_format($data->salesorder, 0, '.' . '.') }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="chart tab-pane" id="tagihan-log">
                            <center>
                                <b> TAGIHAN SALES DAILY</b>

                            </center>
                            <div class="modal-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover text-dark" id="tblAkun">
                                        <thead style="text-align: center !important;">
                                            <tr class="text-dark">
                                                <th text-align="center">No</th>
                                                <th align="center">Customer</th>
                                                <th align="center">Salesman</th>
                                                <th align="center">LPH</th>
                                                <th align="center">Tanggal LPH</th>
                                                <th align="center">Nilai Tagihan</th>
                                                <th align="center">Nilai Bayar</th>
                                                <th align="center">Sisa Bayar</th>
                                                <th align="center">Order</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-dark">
                                            <?php $no = 1;

                                            ?>
                                            @foreach ($tagihancustlogsales as $data)
                                                <tr>
                                                    <td align="center" width="1%">{{ $no++ }}</td>
                                                    <td width="1%">{{ $data->custno }}</td>
                                                    <td width="3%">{{ $data->Nmslm }}</td>
                                                    <td width="2%">{{ $data->nolph }}</td>
                                                    <td width="7%">{{ $data->tgl }}</td>
                                                    <td width="7%">Rp
                                                        {{ number_format($data->netto, 0, '.' . '.') }}</td>
                                                    <td width="7%">Rp
                                                        {{ number_format($data->nilaibayar, 0, '.' . '.') }}</td>
                                                    @if ($data->sisa_bayar <= '0')
                                                        <td width="7%">

                                                            <i class="fa-solid fa-circle-check fa-xl fa-fade"
                                                                style="color: #34c595;"></i>
                                                        </td>
                                                    @else
                                                        <td width="7%">Rp
                                                            {{ number_format($data->sisa_bayar, 0, '.' . '.') }}
                                                        </td>
                                                    @endif
                                                    <td width="5%"></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="rincicardsaleslog" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2"
    tabindex="-1">
    <div class="modal-dialog modal-fullscreen modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header"
                style="background-color: #3e789c !important; border: 0.2px rgba(255, 255, 255, 0.993);">
                <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">DAILY ACTIVITY LOG DMJ
                    {{ date('Y-m-d') }}</h1> <i alt="Info_warna_anylog" data-bs-target="#modalinfowarnaanylog"
                    data-bs-toggle="modal" class="fa-solid fa-circle-info fa-beat-fade fa-lg"
                    style="cursor: pointer !important;"></i>
                <a href="{{ route('Report') }}" target="_blank" class="btn btn-outline-info ml-2">Detail
                    Analysis</a>
                {{-- <a href="" target="__blank" class="btn btn-outline-info ml-2" data-bs-target="#modallog"
                    data-bs-toggle="modal">Detail Analysis</a> --}}
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body"
                style="background-color: #1d4157 !important; border: 0.2px rgba(255, 255, 255, 0.979);"">
                <div class="table-responsive" style="font-size: 0.8rem">
                    <div class="row" style="margin: 0 !important;">
                        {{-- @foreach ($suksescard as $data2) --}}
                        @foreach ($custlogs2 as $data)
                            <div class="col-sm-6 col-md-4">
                                <div class="card"
                                    style="background-color: #3448728c; !important; border: 0.2px rgba(255, 255, 255, 0.925);">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-7">
                                                <div class="grid-container1">
                                                    <div class="" style="font-weight: 550; cursor: pointer;">
                                                        Cabang : PALEMBANG DMJ
                                                    </div>
                                                    <div class="" style="font-weight: 550; cursor: pointer;">
                                                        <i class="fas fa-user mr-4 ml-1"
                                                            style="color: #3cd2a5 !important;"></i>Call/EC :
                                                        {{ $data->callinputcard }} / {{ $data->jumlah_ec_sombhead }}
                                                    </div>
                                                </div>
                                                <div class="grid-container1">
                                                    @if ($data->firstcekin >= '11:00:00')
                                                        <div class=""
                                                            style="font-weight: 550; cursor: pointer;">
                                                            <i class="fa-solid fa-hourglass-half mr-4 ml-1"
                                                                style="color: #ff0101 !important;"></i>First/Last :
                                                            <i></i> {{ $data->firstcekin }} - {{ $data->lastcekin }}
                                                        </div>
                                                    @else
                                                        <div class=""
                                                            style="font-weight: 550; cursor: pointer;">
                                                            <i class="fa-solid fa-hourglass-half mr-4 ml-1"
                                                                style="color: #3cd2a5 !important;"></i>First/Last :
                                                            {{ $data->firstcekin }} - {{ $data->lastcekin }}
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="grid-container1">
                                                    <div class="" style="font-weight: 550; cursor: pointer;">
                                                        <i class="fas fa-clock mr-3 ml-1"
                                                            style="color: #3cd2a5 !important;"></i>Used/Remaining :
                                                        {{ $data->used_time }} / {{ $data->remaining_time }}
                                                    </div>
                                                </div>
                                                <div class="grid-container1">
                                                    <div class="" style="font-weight: 550; cursor: pointer;">
                                                        <i class="fa-solid fa-dollar-sign mr-4 ml-1"
                                                            style="color: #3cd2a5 !important;"></i>SO : Rp
                                                        {{ number_format($data->penjualan, 0, '.' . '.') }}
                                                    </div>
                                                </div>
                                                <div class="grid-container1">
                                                    <div class="" style="font-weight: 550; cursor: pointer;">
                                                        <i class="fa-solid fa-credit-card mr-3 ml-1"
                                                            style="color: #3cd2a5 !important;"></i>LPH :
                                                        ({{ $data->countlph }})
                                                        Rp {{ number_format($data->totallph, 0, '.' . '.') }}

                                                    </div>
                                                </div>
                                                <div class="grid-container1">
                                                    <div class="" style="font-weight: 550; cursor: pointer;">
                                                        <i class="fa-solid fa-cash-register fa-beat mr-3 ml-1"
                                                            style="color: #3cd2a5 !important;"></i>Tagih :
                                                        {{ $data->countbayartagihan }} /
                                                        Rp {{ number_format($data->bayartagihan, 0, '.' . '.') }} -
                                                        ( {{ number_format($data->Sisacount, 0, '.' . '.') }} /
                                                        Rp {{ number_format($data->SisaTotalTagihan, 0, '.' . '.') }} )
                                                    </div>
                                                </div>
                                                <div class="grid-container1">
                                                    <div class="" style="font-weight: 550; cursor: pointer;">
                                                        <i class="fa-solid fa-shop mr-3 ml-1"
                                                            style="color: #3cd2a5 !important;"></i>PJP/Visit :
                                                        @if ($data->weeks_of_monthd == '1')
                                                            @if ($data->M1 == '1')
                                                                {{ $data->count_pjp }} / {{ $data->callinputcard }}
                                                                ({{ number_format($data->pjp_percentage, 0, '.' . '.') }}%)
                                                            @endif
                                                        @endif
                                                        @if ($data->weeks_of_monthd == '2')
                                                            @if ($data->M2 == '1')
                                                                {{ $data->count_pjp }} / {{ $data->callinputcard }}
                                                                ({{ number_format($data->pjp_percentage, 0, '.' . '.') }}%)
                                                            @endif
                                                        @endif
                                                        @if ($data->weeks_of_monthd == '3')
                                                            @if ($data->M3 == '1')
                                                                {{ $data->count_pjp }} / {{ $data->callinputcard }}
                                                                ({{ number_format($data->pjp_percentage, 0, '.' . '.') }}%)
                                                            @endif
                                                        @endif
                                                        @if ($data->weeks_of_monthd == '4')
                                                            @if ($data->M4 == '1')
                                                                {{ $data->count_pjp }} / {{ $data->callinputcard }}
                                                                ({{ number_format($data->pjp_percentage, 0, '.' . '.') }}%)
                                                            @endif
                                                        @endif
                                                        @if ($data->weeks_of_monthd == '5')
                                                            @if ($data->M5 == '1')
                                                                {{ $data->count_pjp }} / {{ $data->callinputcard }}
                                                                ({{ number_format($data->pjp_percentage, 0, '.' . '.') }}%)
                                                            @endif
                                                        @endif

                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-sm-12 col-md-5">
                                                <center>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="col-sm-6 col-md-12 text-center">
                                                                @if ($data->used_sec < '65')
                                                                    <input data-skin="tron" data-thickness="0.2"
                                                                        data-readonly="true" type="text"
                                                                        class="knob"
                                                                        value="{{ number_format($data->used_sec) }}%"
                                                                        data-width="120" data-height="120"
                                                                        data-fgColor="#ff4a4a" data-min="0"
                                                                        data-max="100">
                                                                    <div class="knob-label"
                                                                        style="padding-top: 1rem !important;">
                                                                        <p>
                                                                            <b> {{ $data->salesmans }} </b>
                                                                        </p>
                                                                    </div>
                                                                @elseif ($data->used_sec <= '79')
                                                                    <input data-skin="tron" data-thickness="0.2"
                                                                        data-readonly="true" type="text"
                                                                        class="knob"
                                                                        value="{{ number_format($data->used_sec) }}%"
                                                                        data-width="120" data-height="120"
                                                                        data-fgColor="#fff873" data-min="0"
                                                                        data-max="100">
                                                                    <div class="knob-label"
                                                                        style="padding-top: 1rem !important;">
                                                                        <p>
                                                                            <b> {{ $data->salesmans }} </b>
                                                                        </p>
                                                                    </div>
                                                                @elseif ($data->used_sec <= '89')
                                                                    <input data-skin="tron" data-thickness="0.2"
                                                                        data-readonly="true" type="text"
                                                                        class="knob"
                                                                        value="{{ number_format($data->used_sec) }}%"
                                                                        data-width="120" data-height="120"
                                                                        data-fgColor="#a6f04d" data-min="0"
                                                                        data-max="100">
                                                                    <div class="knob-label"
                                                                        style="padding-top: 1rem !important;">
                                                                        <p>
                                                                            <b> {{ $data->salesmans }} </b>
                                                                        </p>
                                                                    </div>
                                                                @elseif ($data->used_sec <= '99')
                                                                    <input data-skin="tron" data-thickness="0.2"
                                                                        data-readonly="true" type="text"
                                                                        class="knob"
                                                                        value="{{ number_format($data->used_sec) }}%"
                                                                        data-width="120" data-height="120"
                                                                        data-fgColor="#80d1d0" data-min="0"
                                                                        data-max="100">
                                                                    <div class="knob-label"
                                                                        style="padding-top: 1rem !important;">
                                                                        <p>
                                                                            <b> {{ $data->salesmans }} </b>
                                                                        </p>
                                                                    </div>
                                                                @elseif ($data->used_sec >= '100')
                                                                    <input data-skin="tron" data-thickness="0.2"
                                                                        data-readonly="true" type="text"
                                                                        class="knob" value="100"
                                                                        data-width="120" data-height="120"
                                                                        data-fgColor="#80d1d0" data-min="0"
                                                                        data-max="100">
                                                                    <div class="knob-label"
                                                                        style="padding-top: 1rem !important;">
                                                                        <p>
                                                                            <b> {{ $data->salesmans }} </b>
                                                                        </p>
                                                                    </div>
                                                                    {{-- @else
                                                                <input data-skin="tron" data-thickness="0.2"
                                                                    data-readonly="true" type="text"
                                                                    class="knob" type="text" value="100"
                                                                    data-width="120" data-height="120"
                                                                    data-fgColor="#80d1d0" data-min="0"
                                                                    data-max="100">
                                                                <div class="knob-label"
                                                                    style="padding-top: 1rem !important;">
                                                                    *{{ $data->salesmans }}
                                                                </div>
                                                            @endif --}}
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </center>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                        {{-- @endforeach --}}

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalinfowarna" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2"
    tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">INFO TARGET WARNA EC</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="content">
                    <div class="container">
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th>
                                        <input data-readonly="true" type="text" class="knob" value="99"
                                            data-width="90" data-height="90" data-fgColor="#ff3333" data-min="0"
                                            data-max="300">

                                        {{-- <i class="fa-solid fa-tag fa-bounce fa-2xl" style="color: #ff3333;"></i> --}}
                                    </th>
                                    <th>
                                        <input data-readonly="true" type="text" class="knob" value="119"
                                            data-width="90" data-height="90" data-fgColor="#fff873" data-min="0"
                                            data-max="300">

                                        {{-- <i class="fa-solid fa-tag fa-bounce fa-2xl" style="color: #fff873;"></i> --}}
                                    </th>
                                    <th>
                                        <input data-readonly="true" type="text" class="knob" value="125"
                                            data-width="90" data-height="90" data-fgColor="#a6f04d" data-min="0"
                                            data-max="300">

                                        {{-- <i class="fa-solid fa-tag fa-bounce fa-2xl" style="color: #a6f04d;"></i> --}}
                                    </th>
                                    <th>
                                        <input data-readonly="true" type="text" class="knob" value="300"
                                            data-width="90" data-height="90" data-fgColor="#80d1d0" data-min="0"
                                            data-max="300">

                                        {{-- <i class="fa-solid fa-tag fa-bounce fa-2xl" style="color: #80d1d0;"></i> --}}
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1-99</td>
                                    <td>100 - 119</td>
                                    <td>125+</td>
                                    <td>Target Hit</td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th>
                                        <input id="color__target" data-readonly="false" type="text"
                                            class="knob" value="1" data-width="90" data-height="90"
                                            data-fgColor="#ff3333" data-min="0" data-max="300">
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Input Available</td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalinfowarnaanylog" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2"
    tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 mr-2" id="exampleModalToggleLabel2">INFO TARGET WARNA CUST LOG</h1>
                <i class="fa-solid fa-close fa-lg " data-bs-target="#rincicardsaleslog" data-bs-toggle="modal"></i>
            </div>
            <div class="modal-body">
                <div class="content">
                    <div class="container">
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th>
                                        <input data-readonly="true" type="text" class="knob" value="64"
                                            data-width="90" data-height="90" data-fgColor="#ff3333" data-min="0"
                                            data-max="100">
                                    </th>
                                    <th>
                                        <input data-readonly="true" type="text" class="knob" value="79"
                                            data-width="90" data-height="90" data-fgColor="#fff873" data-min="0"
                                            data-max="100">
                                    </th>
                                    <th>
                                        <input data-readonly="true" type="text" class="knob" value="89"
                                            data-width="90" data-height="90" data-fgColor="#a6f04d" data-min="0"
                                            data-max="100">
                                    </th>
                                    <th>
                                        <input data-readonly="true" type="text" class="knob" value="90"
                                            data-width="90" data-height="90" data-fgColor="#80d1d0" data-min="0"
                                            data-max="100">
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1-64</td>
                                    <td>65 - 79</td>
                                    <td>80 - 89</td>
                                    <td>90+</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modaltarget" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2"
    tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">CREATED TARGET SALESMAN</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <form action="{{ route('Tambah Target') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="salesmans_id">Salesman</label>
                                    <select name="salesmans_id" id="salesmans_id"
                                        class="form-control select2 select2-purple"
                                        data-dropdown-css-class="select2-purple" style="width: 100%;" required>
                                        <option value="" hidden>
                                            Silahkan Pilih Salesman
                                        </option>
                                        @foreach ($salesmanall as $data)
                                            <option value="{{ $data->Id }}">
                                                {{ $data->NmSlm }} - {{ $data->KdSlm }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="jcust">Target Jumlah Cust</label>
                                    <input type="number" name="jcust" id="jcust" class="form-control"
                                        placeholder="Masukkan Target Customer" value="{{ old('jcust') }}" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="jnilai">Target Penjualan</label>
                                    <input type="number" name="jnilai" id="jnilai" class="form-control"
                                        placeholder="Masukkan Target Penjualan" value="{{ old('jnilai') }}" required>
                                </div>
                            </div>
                            <button type='submit' class="btn btn-success">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalfilter" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalfilter">FILTER DATA MONTHLY</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('filltermonthly') }}" method="POST" class="mb-3">
                    @csrf
                    <div class="d-flex justify-content-center mt-3">
                        <div class="form-inline">
                            <div class="form">
                                <label>Filter Month :</label><br>
                                <div class="form-group">
                                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                        <select name="monthfilter" id="monthfilter"
                                            class="form-control select2 select2-purple"
                                            data-dropdown-css-class="select2-purple" style="width: 100%;" required>
                                            <option value="" hidden>
                                                Pilih Filter Bulan
                                            </option>
                                            {{-- @foreach ($monthnamcontroller as $data23) --}}
                                            @foreach ($bullanfilterNname as $data)
                                                <option value="{{ $data->bulan }}">
                                                    {{ $data->bulan }}
                                                </option>
                                            @endforeach
                                            {{-- @endforeach --}}
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form ml-3">
                                <label>Filter Year :</label><br>
                                <div class="form-group">
                                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                        <select name="yearfilter" id="yearfilter"
                                            class="form-control input-group select2 select2-purple"
                                            data-dropdown-css-class="select2-purple" style="width: 100%;" required>
                                            <option value="" hidden>
                                                Pilih Filter Tahun
                                            </option>
                                            @foreach ($yearfilter as $data)
                                                <option value="{{ $data->tahun }}">
                                                    {{ $data->tahun }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form ml-3">
                                <label></label>
                                <div class="form-group pt-5 mt-1">
                                    <button id="filter" type="submit"
                                        class="btn btn-outline-success btn-sm mr-2 mb-2" name="search"
                                        title="cari"
                                        style="
                                width: 52px;
                                height: 33px;">
                                        <i class="fas fa-search fa-lg"></i>
                                    </button>
                                    <a href="{{ route('DMJS') }}" class="btn btn-outline-warning btn-sm mr-2 mb-2"
                                        style="
                                width: 70px;
                                height: 32px;">
                                        Refresh
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2"
    tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">DETAIL PRINCIPAL JATUH TEMPO</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover" id="tblAkun">
                        <thead>
                            <tr>
                                <th>Kode Supplier</th>
                                <th>No Bukti</th>
                                <th>Tanggal Tempo</th>
                                <th>Netto Huttang</th>
                                <th>Sisa Hari</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sumshutangperprincipaltgl as $data)
                                <tr>
                                    <td>{{ $data->KdSupplier }}</td>
                                    <td>{{ $data->Nobukti }}</td>
                                    <td>{{ $data->TglJTempo }}</td>
                                    <td>Rp {{ number_format($data->sumprincipaltgl, 0, '.' . '.') }}</td>
                                    <td>{{ $data->Jumlah_Haritgl }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" data-bs-target="#exampleModal" data-bs-toggle="modal">Back
                    to first</button>
            </div>
        </div>
    </div>
</div>

<script>
    $("#color__target").on("input", function() {
        canChangeColor();
    });

    function canChangeColor() {
        var can = true;
        $("#color__target").each(function() {
            if ($(this).val() >= 100) {
                $('#color__target').css({
                    background: 'green'
                })
            }
        });
        // if (can) {
        //     $('.btn').css({
        //         background: 'green'
        //     })
        // } else {
        //     $('.btn').css({
        //         background: 'red'
        //     })
        // }
    }
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
</script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
<!-- JavaScript Bundle with Popper -->
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script src="https://code.highcharts.com/modules/drilldown.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/plugins/chart.js/Chart.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-Knob/1.2.13/jquery.knob.min.js"></script>

<script>
    $(function() {
        $('.table-hover').DataTable()
    })
    $(function() {
        /* jQueryKnob */

        $('.knob').knob({
            /*change : function (value) {
            //console.log("change : " + value);
            },
            release : function (value) {
            console.log("release : " + value);
            },
            cancel : function () {
            console.log("cancel : " + this.value);
            },*/
            draw: function() {

                // "tron" case
                if (this.$.data('skin') == 'tron') {

                    var a = this.angle(this.cv) // Angle
                        ,
                        sa = this.startAngle // Previous start angle
                        ,
                        sat = this.startAngle // Start angle
                        ,
                        ea // Previous end angle
                        ,
                        eat = sat + a // End angle
                        ,
                        r = true

                    this.g.lineWidth = this.lineWidth

                    this.o.cursor &&
                        (sat = eat - 0.3) &&
                        (eat = eat + 0.3)

                    if (this.o.displayPrevious) {
                        ea = this.startAngle + this.angle(this.value)
                        this.o.cursor &&
                            (sa = ea - 0.3) &&
                            (ea = ea + 0.3)
                        this.g.beginPath()
                        this.g.strokeStyle = this.previousColor
                        this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sa, ea, false)
                        this.g.stroke()
                    }

                    this.g.beginPath()
                    this.g.strokeStyle = r ? this.o.fgColor : this.fgColor
                    this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sat, eat, false)
                    this.g.stroke()

                    this.g.lineWidth = 2
                    this.g.beginPath()
                    this.g.strokeStyle = this.o.fgColor
                    this.g.arc(this.xy, this.xy, this.radius - this.lineWidth + 1 + this.lineWidth *
                        2 / 3, 0, 2 * Math.PI, false)
                    this.g.stroke()

                    return false
                }
            }
        })
    })
    $(function() {
        /* jQueryKnob */

        $('.knob2').knob({
            /*change : function (value) {
            //console.log("change : " + value);
            },
            release : function (value) {
            console.log("release : " + value);
            },
            cancel : function () {
            console.log("cancel : " + this.value);
            },*/
            draw: function() {

                // "tron" case
                if (this.$.data('skin') == 'tron') {

                    var a = this.angle(this.cv) // Angle
                        ,
                        sa = this.startAngle // Previous start angle
                        ,
                        sat = this.startAngle // Start angle
                        ,
                        ea // Previous end angle
                        ,
                        eat = sat + a // End angle
                        ,
                        r = true

                    this.g.lineWidth = this.lineWidth

                    // this.o.cursor &&
                    //     (sat = eat - 0.3) &&
                    //     (eat = eat + 0.3)

                    // if (this.o.displayPrevious) {
                    //     ea = this.startAngle + this.angle(this.value)
                    //     this.o.cursor &&
                    //         (sa = ea - 0.3) &&
                    //         (ea = ea + 0.3)
                    //     this.g.beginPath()
                    //     this.g.strokeStyle = this.previousColor
                    //     this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sa, ea, false)
                    //     this.g.stroke()
                    // }

                    // this.g.beginPath()
                    // this.g.strokeStyle = r ? this.o.fgColor : this.fgColor
                    // this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sat, eat, false)
                    // this.g.stroke()

                    // this.g.lineWidth = 2
                    // this.g.beginPath()
                    // this.g.strokeStyle = this.o.fgColor
                    // this.g.arc(this.xy, this.xy, this.radius - this.lineWidth + 1 + this.lineWidth *
                    //     2 / 3, 0, 2 * Math.PI, false)
                    // this.g.stroke()

                    return false
                }
            }
        })
    })
</script>
<script>
    $(function() {

        $('.select2').select2()
    });
</script>
<script>
    const salestime = {!! json_encode($salesmans) !!}
    const used = {!! json_encode($detikused) !!}

    Highcharts.chart('containerareaspline', {
        chart: {
            type: 'areaspline'
        },
        title: {
            text: 'Monitoring Delivery Daily',
            align: 'center'
        },
        subtitle: {
            text: 'DMJ SourceCode',
            align: 'center'
        },
        xAxis: {
            categories: salestime
        },
        yAxis: {
            title: {
                text: 'Total Time'
            }
        },
        credits: {
            enabled: false
        },
        series: [
            //     {
            //     name: 'KUOTA',
            //     data: [420, 420]
            // }, {
            //     name: 'SISA',
            //     data: [160, 264]
            // },
            {
                name: 'USED',
                data: used
            }
        ]
    });
</script>

<script>
    const month = {!! json_encode($bulan) !!}
    const pencapaian = {!! json_encode($nilai) !!}
    Highcharts.chart('containercolumn', {
        title: {
            text: 'Sales of Performance Monthly',
            align: 'center'
        },
        subtitle: {
            text: 'DMJ Source Code - 2022',
            align: 'center'
        },
        xAxis: {
            categories: month
        },
        yAxis: {
            allowDecimals: false,
            min: 0,
            labels: {
                format: 'Rp {value}',
                style: {
                    color: Highcharts.getOptions().colors[3]
                }
            },
            title: {
                text: 'Pencapaian',
                style: {
                    color: Highcharts.getOptions().colors[3]
                }
            }
        },
        series: [{
            type: 'column',
            name: 'Pencapaian',
            data: pencapaian
        }]
    });
</script>
<script>
    const sales = {!! json_encode($salesmans) !!}
    // const gagal = {!! json_encode($gagal) !!}
    const sukses = {!! json_encode($sukses) !!}
    const callperfom = {!! json_encode($callinput) !!}

    var currentDate = new Date();
    var yeard = currentDate.getFullYear();
    var monthd = currentDate.getMonth() + 1; // Ditambahkan 1 karena indeks bulan dimulai dari 0
    var dayd = currentDate.getDate();

    Highcharts.chart('containercall', {
        title: {
            text: ' DAILY CALL OA SALESMAN ' + yeard + '-' + monthd + '-' + dayd,
            align: 'center'
        },
        subtitle: {
            text: 'DMJ SourceCode - 2022',
            align: 'center'
        },
        yAxis: {
            title: {
                text: 'Number of Count'
            }
        },

        xAxis: {
            categories: sales
        },

        legend: {
            layout: 'horizontal',
            align: 'center',
            verticalAlign: 'bottom'
        },

        plotOptions: {

        },

        series: [
            //     {
            //     name: 'Target Call',
            //     data: [0, 0, 0, 0, 0, 0,
            //         0, 0, 0, 0
            //     ]
            // },
            {
                name: 'Input Call OA',
                data: callperfom,
                type: 'column'
            },
            {
                name: 'Efectice Call OA',
                data: sukses,
                zones: [{
                    value: 7,
                    color: '#f1014a'
                }, {
                    value: 15,
                    color: '#ff8f1c'
                }, {
                    color: '#7ccc6c'
                }]
            }
        ],
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }
    });
</script>
<script>
    const salessum = {!! json_encode($sumsalesman) !!}
    const salesoutman = {!! json_encode($salesoutsalesman) !!}
    // console.log(sales);
    // const month = {!! json_encode($bulan) !!}
    // const pencapaian = {!! json_encode($nilai) !!}
    Highcharts.chart('containersum', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'SALES OUT SALESMAN MONTHLY',
            align: 'center'
        },
        subtitle: {
            text: 'DMJ Source Code - 2022',
            align: 'center'
        },
        xAxis: {
            categories: salessum
        },
        yAxis: {
            allowDecimals: false,
            min: 0,
            labels: {
                format: 'Rp {value}',
                style: {
                    color: Highcharts.getOptions().colors[3]
                }
            },
            title: {
                text: 'Sales Out',
                style: {
                    color: Highcharts.getOptions().colors[3]
                }
            }
        },
        series: [{
            name: 'Sales Out Salesman',
            data: salesoutman,
            zones: [{
                value: 100000000,
                color: '#f1014a'
            }, {
                value: 450000000,
                color: '#ff8f1c'
            }, {
                color: '#7ccc6c'
            }],
        }]
    });
</script>

<script>
    $(document).ready(function() {
        const principal = {!! json_encode($pieprincipal) !!}
        const principaldetailtgl = {!! json_encode($sumshutangperprincipaltgl) !!}
        var options = {
            chart: {
                renderTo: 'containerpie',
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
            },
            title: {
                text: 'Percentage of principal courses'
            },
            subtitle: {
                text: 'DMJ Source Code - 2022',
                align: 'center'
            },
            // tooltip: {
            //     pointFormat: '{series.name}: <b> {point.y}</b>',
            //     percentageDecimals: 1,
            // },
            tooltip: {
                headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b> of total<br/>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        color: '#000000',
                        connectColor: '#000000',
                        formatter: function() {
                            return '<b>' + this.point.name + '</b>: ' + this.point.y;
                        }
                    }
                }
            },
            series: [{
                type: 'pie',
                name: 'Nilai Hutang',
            }]
        }
        myarray = [];
        myarray2 = [];
        $.each(principal, function(index, val) {
            myarray[index] = [val.KdSupplier, val.NettoPrincipal];
            myarray2[index] = [val.KdSupplier];
        });

        options.series[0].data = myarray;
        options.series[0].drilldown = myarray2;
        chart = new Highcharts.Chart(options);
    });
</script>
