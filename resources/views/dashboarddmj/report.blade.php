<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
    integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
<script src="https://kit.fontawesome.com/4c68d22cde.js" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
    integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

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

        </ul>

    </div>
</nav>
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
        <div class="tab-content p-0">
            <div class="chart tab-pane active" id="cust-log">
                <center>
                    <b>SALESMAN CHECKIN DAILY</b>
                </center>
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

                                {{-- @foreach ($custlogs1 as $data)
                                <tr>
                                    <td colspan="8" align="center" width="1%">LOADING DATA . . .</td>
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
                                @endforeach --}}
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
                        <table class="table table-striped table-hover text-dark" id="tbltagihancustlog">
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
                                    {{-- <th align="center">Order</th> --}}
                                </tr>
                            </thead>
                            <tbody class="text-dark">
                                {{-- <?php $no = 1;

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
                                @endforeach --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-Knob/1.2.13/jquery.knob.min.js"></script>

<script>
    $(document).ready(function() {
        var table = $('#tblchekin').DataTable({
            ajax: {
                url: "{{ route('data-ReportAPI') }}",
                type: "GET",
                dataType: "json",
                dataSrc: "custlog1", // Menentukan sumber data dari response JSON
            },
            columns: [
                { data: null, render: function(data, type, row, meta) {
                    // Kolom nomor
                    return meta.row + 1;
                }},
                { data: "Nmslm" },
                { data: "custname" },
                { data: "cekin" },
                { data: "cekout" },
                {
                    data: "used_time",
                    render: function(data, type, row) {
                        if (row.used_time <= '00:05:00') {
                            return '<td width="2%"><b class="text-danger">' + row.used_time + '</b></td>';
                        } else {
                            return '<td width="2%">' + row.used_time + '</td>';
                        }
                    }
                },
                { data: "status" },
                {
                    data: "salesorder",
                    render: $.fn.dataTable.render.number(',', '.', 0, ''),

                }
                // Tambahkan kolom lain sesuai dengan kebutuhan
            ]
        });

    });
</script>



