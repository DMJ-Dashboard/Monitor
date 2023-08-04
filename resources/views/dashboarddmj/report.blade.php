<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
    integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
<script src="https://kit.fontawesome.com/4c68d22cde.js" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css" />



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
    <meta http-equiv="refresh" content="1500; url=/reportadmin">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="{{ asset('/dmj/dist/css/style.css') }}">
    <title>DMJ ReportCustLog</title>

</head>
<nav class="navbar navbar-expand-lg navbar-light bg-light px-5"
    style="background-color: #324c5c !important; border: 0.2px rgba(255, 255, 255, 0.425); border-style: solid; color:aliceblue !important; padding-bottom: 0;">
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

        </ul>

    </div>
</nav>
<div class="content px-3 pt-3">

    <div class="card">

        {{-- <div class="card-header" style="background-color: #243b47">
        <div class="card-tools">
            <ul class="nav nav-pills ml-auto text-black">

                <li class="nav-item">
                    <a class="nav-link active" href="#tagihan-log" data-toggle="tab">
                        <b>Eging Log</b></a>
                </li>
            </ul>
        </div>
    </div> --}}
        <div class="card-body">
            {{-- MAINTANCE --}}
            <div class="tab-content p-0">
                {{-- <div class="chart tab-pane active" id="cust-log">
                <center>
                    <b>SALESMAN CHECKIN DAILY</b>
                </center>
                <div class="row justify-content-center align-items-center g-2">
                    <div class="col-2" style="width: 12% !important;">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="far fa-calendar-alt"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control float-right" id="reportrange"
                                    placeholder="FILTER DATE_RANGE">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover text-dark" id="tblchekin">
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
                            <tbody class="text-dark" id="data-body">
                                <?php $no = 1;
                                ?>

                                @foreach ($custlogs1 as $data)
                                    <tr>
                                        <td width="2%">{{ $no++ }}</td>
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
                                            <td width="5%">{{ $data->status }} (
                                                {{ $data->alasangagal }}
                                                )</td>
                                        @elseif ($data->status == 'Sukses')
                                            <td width="5%">{{ $data->status }}</td>
                                        @endif
                                        <td width="5%">Rp
                                            {{ number_format($data->salesorder, 0, '.' . '.') }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> --}}
                <div class="chart tab-pane active" id="tagihan-log">
                    <center>
                        <b>SALESMAN EGING LOG {{$tgllog[0]['tgl']}}</b>
                    </center>
                    <div class="row justify-content-center align-items-center g-2">
                        <div class="col-4" style="width: 10% !important;">
                            <form action="{{ route('reportfilter') }}" method="POST" class="mb-3">
                                @csrf
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="far fa-calendar-alt"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control float-right" id="reportrange2"
                                            placeholder="FILTER DATE_RANGE">
                                        <input type="date" class="form-control" id="startdatereport"
                                            placeholder="FILTER DATE_RANGE" name="startfilterreport" style="display: none;">
                                        <input type="date" class="form-control" id="enddatereport"
                                            placeholder="FILTER DATE_RANGE" name="endfilterreport" style="display: none;">
                                        <button class="btn btn-info"><i class="fas fa-search fa-sm"></i></button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover text-dark" id="tbltagihancustlog">
                                <thead style="text-align: center !important;">
                                    <tr class="text-dark">
                                        <th text-align="center">No</th>
                                        <th align="center">Salesmans</th>
                                        <th align="center">Customer</th>
                                        {{-- <th align="center">Tgl_LOG</th> --}}
                                        <th align="center">Check-IN</th>
                                        <th align="center">Check-OUT</th>
                                        <th align="center">Used Time</th>
                                        <th align="center">Piutang</th>
                                        <th align="center">Total Piutang</th>
                                        <th align="center">Total Bayar</th>
                                        <th align="center">SalesOrder</th>
                                        <th align="center">Alasan Gagal Call</th>
                                    </tr>
                                </thead>
                                <tbody class="text-dark">
                                    <?php
                                    $no = 1;

                                    ?>
                                    @foreach ($pjpreport as $data)
                                        @if ($data->weeks_of_monthd == '1')
                                            @if ($data->M1 == '1')
                                                <tr>
                                                    <td align="center" width="1%">{{ $no++ }}</td>
                                                    <td align="center" width="1%">{{ $data->NmSlm }}</td>
                                                    @if ($data->cekin != '00:00:00' && $data->nilaibayar == 0 && $data->total > 0)
                                                        <td width="2%" class="text-danger">{{ $data->custno }}-
                                                            <b>
                                                                {{ $data->CustName }} </b>
                                                        </td>
                                                    @else
                                                        <td width="2%">{{ $data->custno }} -
                                                            {{ $data->CustName }}</td>
                                                    @endif
                                                    {{-- <td align="center" width="1%">{{ $data->tgl }}</td> --}}
                                                    <td align="center" width="1%">{{ $data->cekin }}</td>
                                                    <td align="center" width="1%">{{ $data->cekout }}</td>
                                                    @if ($data->used_time <= '00:05:00')
                                                        <td width="2%" class="text-danger"> <b>
                                                                {{ $data->used_time }} </b>
                                                        </td>
                                                    @else
                                                        <td width="2%">{{ $data->used_time }}</td>
                                                    @endif
                                                    <td align="center" width="5%">{{ $data->datafakturs }}</td>
                                                    <td align="center" width="1%">
                                                        {{ number_format($data->total, 0, '.' . '.') }}</td>
                                                    <td align="center" width="1%">
                                                        {{ number_format($data->nilaibayar, 0, '.' . '.') }}</td>
                                                    <td align="center" width="1%">
                                                        {{ number_format($data->totalsalesorder, 0, '.' . '.') }}</td>
                                                    <td width="1%">{{ $data->alasangagal }}</td>

                                                </tr>
                                            @endif
                                        @elseif ($data->weeks_of_monthd == '2')
                                            @if ($data->M2 == '1')
                                                <tr>
                                                    <td align="center" width="1%">{{ $no++ }}</td>
                                                    <td align="center" width="1%">{{ $data->NmSlm }}</td>
                                                    @if ($data->cekin != '00:00:00' && $data->nilaibayar == 0 && $data->total > 0)
                                                        <td width="2%" class="text-danger">{{ $data->custno }}-
                                                            <b>
                                                                {{ $data->CustName }} </b>
                                                        </td>
                                                    @else
                                                        <td width="2%">{{ $data->custno }} -
                                                            {{ $data->CustName }}</td>
                                                    @endif
                                                    <td align="center" width="1%">{{ $data->cekin }}</td>
                                                    <td align="center" width="1%">{{ $data->cekout }}</td>
                                                    @if ($data->used_time <= '00:05:00')
                                                        <td width="2%" class="text-danger"> <b>
                                                                {{ $data->used_time }} </b>
                                                        </td>
                                                    @else
                                                        <td width="2%">{{ $data->used_time }}</td>
                                                    @endif
                                                    <td align="center" width="5%">{{ $data->datafakturs }}</td>
                                                    <td align="center" width="1%">
                                                        {{ number_format($data->total, 0, '.' . '.') }}</td>
                                                    <td align="center" width="1%">
                                                        {{ number_format($data->nilaibayar, 0, '.' . '.') }}</td>
                                                    <td align="center" width="1%">
                                                        {{ number_format($data->totalsalesorder, 0, '.' . '.') }}</td>
                                                    <td width="1%">{{ $data->alasangagal }}</td>

                                                </tr>
                                            @endif
                                        @elseif ($data->weeks_of_monthd == '3')
                                            @if ($data->M3 == '1')
                                                <tr>
                                                    <td align="center" width="1%">{{ $no++ }}</td>
                                                    <td align="center" width="1%">{{ $data->NmSlm }}</td>
                                                    @if ($data->cekin != '00:00:00' && $data->nilaibayar == 0 && $data->total > 0)
                                                        <td width="2%" class="text-danger">{{ $data->custno }}-
                                                            <b>
                                                                {{ $data->CustName }} </b>
                                                        </td>
                                                    @else
                                                        <td width="2%">{{ $data->custno }} -
                                                            {{ $data->CustName }}</td>
                                                    @endif
                                                    <td align="center" width="1%">{{ $data->cekin }}</td>
                                                    <td align="center" width="1%">{{ $data->cekout }}</td>
                                                    @if ($data->used_time <= '00:05:00')
                                                        <td width="2%" class="text-danger"> <b>
                                                                {{ $data->used_time }} </b>
                                                        </td>
                                                    @else
                                                        <td width="2%">{{ $data->used_time }}</td>
                                                    @endif
                                                    <td align="center" width="5%">{{ $data->datafakturs }}</td>
                                                    <td align="center" width="1%">
                                                        {{ number_format($data->total, 0, '.' . '.') }}</td>
                                                    <td align="center" width="1%">
                                                        {{ number_format($data->nilaibayar, 0, '.' . '.') }}</td>
                                                    <td align="center" width="1%">
                                                        {{ number_format($data->totalsalesorder, 0, '.' . '.') }}</td>
                                                    <td width="1%">{{ $data->alasangagal }}</td>

                                                </tr>
                                            @endif
                                        @elseif ($data->weeks_of_monthd == '4')
                                            @if ($data->M4 == '1')
                                                <tr>
                                                    <td align="center" width="1%">{{ $no++ }}</td>
                                                    <td align="center" width="1%">{{ $data->NmSlm }}</td>
                                                    @if ($data->cekin != '00:00:00' && $data->nilaibayar == 0 && $data->total > 0)
                                                        <td width="2%" class="text-danger">{{ $data->custno }}-
                                                            <b>
                                                                {{ $data->CustName }} </b>
                                                        </td>
                                                    @else
                                                        <td width="2%">{{ $data->custno }} -
                                                            {{ $data->CustName }}</td>
                                                    @endif
                                                    <td align="center" width="1%">{{ $data->cekin }}</td>
                                                    <td align="center" width="1%">{{ $data->cekout }}</td>
                                                    @if ($data->used_time <= '00:05:00')
                                                        <td width="2%" class="text-danger"> <b>
                                                                {{ $data->used_time }} </b>
                                                        </td>
                                                    @else
                                                        <td width="2%">{{ $data->used_time }}</td>
                                                    @endif
                                                    <td align="center" width="5%">{{ $data->datafakturs }}</td>
                                                    <td align="center" width="1%">
                                                        {{ number_format($data->total, 0, '.' . '.') }}</td>
                                                    <td align="center" width="1%">
                                                        {{ number_format($data->nilaibayar, 0, '.' . '.') }}</td>
                                                    <td align="center" width="1%">
                                                        {{ number_format($data->totalsalesorder, 0, '.' . '.') }}</td>
                                                    <td width="1%">{{ $data->alasangagal }}</td>

                                                </tr>
                                            @endif
                                        @elseif ($data->weeks_of_monthd == '5')
                                            @if ($data->M5 == '1')
                                                <tr>
                                                    <td align="center" width="1%">{{ $no++ }}</td>
                                                    <td align="center" width="1%">{{ $data->NmSlm }}</td>
                                                    @if ($data->cekin != '00:00:00' && $data->nilaibayar == 0 && $data->total > 0)
                                                        <td width="2%" class="text-danger">{{ $data->custno }}-
                                                            <b>
                                                                {{ $data->CustName }} </b>
                                                        </td>
                                                    @else
                                                        <td width="2%">{{ $data->custno }} -
                                                            {{ $data->CustName }}</td>
                                                    @endif
                                                    {{-- <td align="center" width="1%">(
                                                    {{ $data->custno }}-{{ $data->CustName }} )</td> --}}
                                                    <td align="center" width="1%">{{ $data->cekin }}</td>
                                                    <td align="center" width="1%">{{ $data->cekout }}</td>
                                                    @if ($data->used_time <= '00:05:00')
                                                        <td width="2%" class="text-danger"> <b>
                                                                {{ $data->used_time }} </b>
                                                        </td>
                                                    @else
                                                        <td width="2%">{{ $data->used_time }}</td>
                                                    @endif
                                                    <td align="center" width="5%">{{ $data->datafakturs }}</td>
                                                    <td align="center" width="1%">
                                                        {{ number_format($data->total, 0, '.' . '.') }}</td>
                                                    <td align="center" width="1%">
                                                        {{ number_format($data->nilaibayar, 0, '.' . '.') }}</td>
                                                    <td align="center" width="1%">
                                                        {{ number_format($data->totalsalesorder, 0, '.' . '.') }}</td>
                                                    <td width="1%">{{ $data->alasangagal }}</td>

                                                </tr>
                                            @endif
                                        @elseif ($data->weeks_of_monthd == '6')
                                            @if ($data->M1 == '1')
                                                <tr>
                                                    <td align="center" width="1%">{{ $no++ }}</td>
                                                    <td align="center" width="1%">{{ $data->NmSlm }}</td>
                                                    @if ($data->cekin != '00:00:00' && $data->nilaibayar == 0 && $data->total > 0)
                                                        <td width="2%" class="text-danger">{{ $data->custno }}-
                                                            <b>
                                                                {{ $data->CustName }} </b>
                                                        </td>
                                                    @else
                                                        <td width="2%">{{ $data->custno }} -
                                                            {{ $data->CustName }}</td>
                                                    @endif
                                                    {{-- <td align="center" width="1%">(
                                                    {{ $data->custno }}-{{ $data->CustName }} )</td> --}}
                                                    <td align="center" width="1%">{{ $data->cekin }}</td>
                                                    <td align="center" width="1%">{{ $data->cekout }}</td>
                                                    @if ($data->used_time <= '00:05:00')
                                                        <td width="2%" class="text-danger"> <b>
                                                                {{ $data->used_time }} </b>
                                                        </td>
                                                    @else
                                                        <td width="2%">{{ $data->used_time }}</td>
                                                    @endif
                                                    <td align="center" width="5%">{{ $data->datafakturs }}</td>
                                                    <td align="center" width="1%">
                                                        {{ number_format($data->total, 0, '.' . '.') }}</td>
                                                    <td align="center" width="1%">
                                                        {{ number_format($data->nilaibayar, 0, '.' . '.') }}</td>
                                                    <td align="center" width="1%">
                                                        {{ number_format($data->totalsalesorder, 0, '.' . '.') }}</td>
                                                    <td width="1%">{{ $data->alasangagal }}</td>

                                                </tr>
                                            @endif
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div id="containercall" style="overflow: hidden;">
            </div>
        </div>
        {{-- <div class="table-responsive">
        <table class="table table-striped table-hover text-dark" id="tbltagihancustlog">
            <thead style="text-align: center !important;">
                <tr class="text-dark">
                    <th text-align="center">Kode</th>
                    <th align="center">Customer</th>
                </tr>
            </thead>
            <tbody class="text-dark">
                <td>Cs22</td>
                <td>Joko</td>
            </tbody>
        </table>
    </div> --}}
    </div>
</div>

<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    < script src = "https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js" >
</script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-Knob/1.2.13/jquery.knob.min.js"></script>

<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.bootstrap5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.colVis.min.js"></script>

<script>
    $(function() {
        var start = moment().subtract(29, 'days');
        var end = moment();

        function cb(start, end) {
            $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }

        $('#reportrange').daterangepicker({
            startDate: start,
            endDate: end,
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1,
                    'month').endOf('month')]
            }
        }, cb);

        cb(start, end);
    });
</script>

<script>
    $(function() {
        var start2 = moment().subtract(29, 'days');
        var startInput = $('#startdatereport');
        function cb2(start2, end2) {
            $('#reportrange2 span').html(start2.format('YYYY-MM-DD'));
            startInput.val(start2.format('YYYY-MM-DD'));

        }

        $('#reportrange2').daterangepicker({
            startDate: start2,
            singleDatePicker: true,
            showDropdowns: true,
            showCustomRangeLabel: false,
            maxYear: parseInt(moment().format('YYYY'),10)+1,
            linkedCalendars: false,
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment().subtract(6, 'days')],
                'Last 30 Days': [moment().subtract(29, 'days'), moment().subtract(29, 'days'),],

            }
        }, cb2);

        cb2(start2);
    });
</script>

<script>
    $(document).ready(function() {
        var printCounter = 0;
        var h3 = '<h3 align="center">';
        var h33 = '</h3>';
        var table = $('#tblchekin').DataTable({
            "responsive": true,
            "autoWidth": false,
            "width": "100%",
            buttons: [
                'copy',
                {
                    extend: 'excel',
                    messageTop: 'Laporan Tagihan Customer LOG Pada' + ' {{ date('D-M-Y') }}' + '',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'print',
                    title: h3 + 'Laporan Tagihan Customer LOG' + h33,
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                'colvis'
            ],
        });
        table.buttons().container().appendTo('#tblchekin_wrapper .col-md-6:eq(0)');
    });
</script>


<script>
    $(document).ready(function() {
        var printCounter = 0;
        var h3 = '<h3 align="center">';
        var h33 = '</h3>';
        var table = $('#tbltagihancustlog').DataTable({
            "responsive": true,
            "autoWidth": false,
            "width": "100%",
            buttons: [
                'copy',
                {
                    extend: 'excel',
                    messageTop: 'Laporan PJP Sales LOG Pada' + ' {{ date('D-M-Y') }}' + '',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'print',
                    title: h3 + 'Laporan PJP Sales LOG' + h33,
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                'colvis'
            ],
        });
        table.buttons().container().appendTo('#tbltagihancustlog_wrapper .col-md-6:eq(0)');
    });
</script>
