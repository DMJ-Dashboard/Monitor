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
    .info-box {
        border-bottom-left-radius: 2rem !important;
        border-top-right-radius: 2rem !important;
        border-bottom-right-radius: 1rem !important;
        border-top-left-radius: 1rem !important;
    }

    .card-body i:hover {
        font-size: 2.4rem !important;
        transition: 0.5s;
        cursor: pointer !important;
    }

    .info-box-number {
        font-size: 0.8rem !important;
    }

    th {
        text-align: center !important;
    }

    .card,
    .card-header,
    .card-body {
        border-radius: 1rem !important;
    }

    X #container {
        height: 450px;
    }

    @media (min-width: 768px) {
        .col-md-2 {
            flex: 0 0 auto;
            width: 13%;
        }
    }

    @media only screen and (max-width: 600px) {
        #kolom__jcust {
            width: 120
        }

        /* .info-box{
                width: 12.5rem;
                font-size: 12px;
            } */
    }

    /* i{
            color: #3cd2a5 !important;
        } */
    #analytics-cards-dmj {
        background-color: #1e2936;
        color: white;
        min-height: 120vh !important;
    }

    #rincicardsaleslog {
        background-color: #1e2936;
        color: white;
    }

    #highcharts-data-table-2 {
        width: 35em !important;
    }


    #highcharts-data-table-2,
    tbody,
    td,
    tfoot,
    th,
    thead,
    tr {
        text-align: center;
    }

    body {
        background-color: #1e2936;
    }

    .nav-link,
    .navbar-brand {
        color: white !important;
    }

    .bg-light,
    .bg-light>a {
        color: #75bd3f !important;
    }

    .dropdown-item {
        color: white !important;
    }

    .dropdown-item:hover {
        color: rgb(0, 0, 0) !important;
        background: wheat !important;
    }

    .nav-link:hover {
        color: wheat !important;
    }

    .info-box {

        background: #98b4d7cf !important;
    }
</style>

<head>
    <meta charset="utf-8">
    <meta http-equiv="refresh" content="1800; url=/dashboard_IKA">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <title>DMJ DASHBOARD - 2022</title>
</head>
<nav class="navbar navbar-expand-lg navbar-light bg-light px-5"
    style="background-color: #324c5c !important; border: 0.2px rgba(255, 255, 255, 0.425);
    border-style: solid; color:aliceblue !important;">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03"
        aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand text-white" href="#">
        <b> INDOKARYA </b>
    </a>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Company
                </a>
                <ul class="dropdown-menu"
                    style="background-color: #233945; border: 1px #75bd3f; color: white; border-style: solid;">
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
            <li class="nav-item">
                <a class="nav-link" href="#">About</a>
            </li>
        </ul>
        {{-- <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form> --}}
    </div>
</nav>

<div class="wrapper">
    <div class="content" style="color:white">
        <div class="row">
            <div class="table-responsive">
                <?php
                $hari = date('l');
                /*$new = date('l, F d, Y', strtotime($Today));*/
                if ($hari == 'Sunday') {
                    $hariindo = 'Minggu';
                } elseif ($hari == 'Monday') {
                    $hariindo = 'SENIN';
                } elseif ($hari == 'Tuesday') {
                    $hariindo = 'SELASA';
                } elseif ($hari == 'Wednesday') {
                    $hariindo = 'RABU';
                } elseif ($hari == 'Thursday') {
                    $hariindo = 'KAMIS';
                } elseif ($hari == 'Friday') {
                    $hariindo = 'JUMAT';
                } elseif ($hari == 'Saturday') {
                    $hariindo = 'SABTU';
                }
                ?>
                <center>
                    <h4>DAILY PJP
                        {{ $salesmanpjpname[0]['NmSlm'] }}

                        <br class="text-uppercase" style="text-transform: uppercase !important;"> HARI
                        {{ $hariindo }} -
                        MINGGU {{ $mingguke[0]['minggukebrp'] }} - BULAN {{ date('M') }}
                    </h4>
                </center>
                <table class="table table-bordered" id="datatable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Customer ID</th>
                            <th>Nama Customer</th>
                            <th>Alamat</th>
                            <th>Tagihan</th>
                            <th>Bayar</th>
                            <th>Sisa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;

                        ?>
                        {{-- @foreach ($tagihandetail as $item2) --}}
                            @foreach ($showpjppersonildetail as $item1)
                                @if ($item1->weeks_of_monthd == '1')
                                    @if ($item1->M1 == '1')
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $item1->CustnoOfPJPd }}</td>
                                            <td>{{ $item1->NamaCustOfPJPd }}</td>
                                            <td>{{ $item1->Alamat1 }}</td>
                                        </tr>
                                    @endif
                                @endif
                                @if ($item1->weeks_of_monthd == '2')
                                    @if ($item1->M2 == '1')
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $item1->CustnoOfPJPd }}</td>
                                            <td>{{ $item1->NamaCustOfPJPd }}</td>
                                            <td>{{ $item1->Alamat1 }}</td>
                                        </tr>
                                    @endif
                                @endif
                                @if ($item1->weeks_of_monthd == '3')
                                    @if ($item1->M3 == '1')
                                        {{-- @if ($item2->M3 == '1') --}}
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $item1->CustnoOfPJPd }}</td>
                                            <td>{{ $item1->NamaCustOfPJPd }}</td>
                                            <td>{{ $item1->Alamat1 }}</td>
                                            {{-- @if ($item2->custno == $item1->CustnoOfPJPd) --}}
                                                {{-- <td>{{ $tagihandetail[0]['NilaiTagihan'] }}</td> --}}
                                                {{-- <td>{{ $item2->NilaiTagihan}}</td> --}}
                                                {{-- <td>{{ $item2->Bayaran }}</td> --}}
                                                {{-- <td>{{ $item2->sisa }}</td> --}}
                                            {{-- @endif --}}
                                        </tr>
                                        {{-- @endif --}}
                                    @endif
                                @endif
                                @if ($item1->weeks_of_monthd == '4')
                                    @if ($item1->M4 == '1')
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $item1->CustnoOfPJPd }}</td>
                                            <td>{{ $item1->NamaCustOfPJPd }}</td>
                                            <td>{{ $item1->Alamat1 }}</td>
                                        </tr>
                                    @endif
                                @endif
                                @if ($item1->weeks_of_monthd == '5')
                                    @if ($item1->M5 == '1')
                                        <tr>
                                            <td>{{ $mp++ }}</td>
                                            <td>{{ $item1->CustnoOfPJPd }}</td>
                                            <td>{{ $item1->NamaCustOfPJPd }}</td>
                                            <td>{{ $item1->Alamat1 }}</td>
                                        </tr>
                                    @endif
                                @endif
                            @endforeach
                        {{-- @endforeach --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
