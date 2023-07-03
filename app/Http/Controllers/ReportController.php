<?php

namespace App\Http\Controllers;

use App\Models\Customerlog;
use App\Models\PjpPersonildetailIKAJ;
use App\Models\Tagihandetail;
use App\Models\TagihanHeader;
use App\Models\TagihanMobileHeader;
use App\Models\TagihanMobileDetail;
use Illuminate\Http\Request;
use Carbon\Carbon;

use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function reportAPI()
    {

        $hari = date('l');
        /*$new = date('l, F d, Y', strtotime($Today));*/
        if ($hari == "Sunday") {
            $hariindo = "Minggu";
        } elseif ($hari == "Monday") {
            $hariindo = "SENIN";
        } elseif ($hari == "Tuesday") {
            $hariindo = "SELASA";
        } elseif ($hari == "Wednesday") {
            $hariindo = "RABU";
        } elseif ($hari == "Thursday") {
            $hariindo = "KAMIS";
        } elseif ($hari == "Friday") {
            $hariindo = "JUMAT";
        } elseif ($hari == "Saturday") {
            $hariindo = "SABTU";
        }

        // MAINTANANCE
        // $data['custlog1'] = Customerlog::join('customer', 'customer_log.custno', '=', 'customer.CustNo')
        //     ->join('salesman', 'customer_log.kdslm', '=', 'salesman.kdslm')
        //     ->where('customer_log.tgl', date('Y-m-d'))
        //     ->where('customer_log.cekin', '!=', NULL)
        //     ->where('customer_log.kdslm', '!=', "")
        //     ->select(
        //         DB::raw('customer_log.*'),
        //         DB::raw('salesman.Nmslm'),
        //         DB::raw('customer.custname, TIMEDIFF(cekout, cekin) AS used_time')
        //     )
        //     ->get();
        $data['pjpreport'] = PjpPersonildetailIKAJ::select(
            'pjppersonildetail.kdslm',
            // DB::raw('COUNT(pjppersonildetail.custno) AS count_pjp'),
            DB::raw("salesman.NmSlm"),
            DB::raw("customer.CustName"),
            DB::raw("pjppersonildetail.M1"),
            DB::raw("pjppersonildetail.M2"),
            DB::raw("pjppersonildetail.M3"),
            DB::raw("pjppersonildetail.M4"),
            DB::raw("pjppersonildetail.M5"),
            DB::raw("FLOOR((DAYOFMONTH(CURDATE())-1 + WEEKDAY(CONCAT(YEAR(CURDATE()),'-',MONTH(CURDATE()),'-01')))/7) + 1 AS weeks_of_monthd"),
        )->join('salesman', 'pjppersonildetail.kdslm', '=', 'salesman.kdslm')->join('customer', 'pjppersonildetail.custno', '=', 'customer.custno')
            ->where('pjppersonildetail.hari', $hariindo)
            ->where('salesman.stat', '=', '1')
            ->get();
        // $data['tagihancustlogsales'] = TagihanMobileHeader::join('tagihanmobiledetail', 'tagihanmobileheader.nobukti', '=', 'tagihanmobiledetail.nobukti')
        //     ->join('salesman', 'tagihanmobileheader.kdslm', '=', 'salesman.kdslm')
        //     ->join('customer', 'tagihanmobiledetail.custno', '=', 'customer.custno')
        //     ->where('tagihanmobileheader.tgl', date('Y-m-d'))
        //     ->whereNotNull('customer.NoMember')
        //     ->where('salesman.Stat', '=', '1')
        //     ->select(
        //         DB::raw('customer.custname'),
        //         DB::raw('salesman.Nmslm'),
        //         DB::raw('tagihanmobiledetail.tgl'),
        //         DB::raw('SUM(tagihanmobiledetail.nilaibayar) as nilaibayar'),
        //         DB::raw('SUM(tagihanmobiledetail.netto) as netto'),
        //         DB::raw('SUM(tagihanmobiledetail.netto) - SUM(tagihanmobiledetail.nilaibayar) as sisa_bayar'),
        //     )
        //     ->groupBy('tagihanmobiledetail.custno')
        //     ->orderByDesc(DB::raw('SUM(tagihanmobiledetail.netto) - SUM(tagihanmobiledetail.nilaibayar)'))
        //     ->get();
        return response()->json($data);
        // return view('dashboarddmj.report', $data);
    }
    public function report()
    {
        // MAINTANANCE
        $data['custlogs1'] = Customerlog::join('customer', 'customer_log.custno', '=', 'customer.CustNo')
            ->join('salesman', 'customer_log.kdslm', '=', 'salesman.kdslm')
            ->where('customer_log.tgl', date('Y-m-d'))
            ->where('customer_log.cekin', '!=', NULL)
            ->where('customer_log.kdslm', '!=', "")
            ->orderBy('customer_log.kdslm')
            ->select(
                DB::raw('customer_log.*'),
                DB::raw('salesman.Nmslm'),
                DB::raw('customer.custname, TIMEDIFF(cekout, cekin) AS used_time')
            )
            ->get();


        $hari = date('l');
        /*$new = date('l, F d, Y', strtotime($Today));*/
        if ($hari == "Sunday") {
            $hariindo = "Minggu";
        } elseif ($hari == "Monday") {
            $hariindo = "SENIN";
        } elseif ($hari == "Tuesday") {
            $hariindo = "SELASA";
        } elseif ($hari == "Wednesday") {
            $hariindo = "RABU";
        } elseif ($hari == "Thursday") {
            $hariindo = "KAMIS";
        } elseif ($hari == "Friday") {
            $hariindo = "JUMAT";
        } elseif ($hari == "Saturday") {
            $hariindo = "SABTU";
        }


        // dd($pjpreport);
        //MAINTANANCE
        // $data['tagihancustlogsales'] = TagihanMobileHeader::join('tagihanmobiledetail', 'tagihanmobileheader.nobukti', '=', 'tagihanmobiledetail.nobukti')
        //     ->join('salesman', 'tagihanmobileheader.kdslm', '=', 'salesman.kdslm')
        //     ->join('customer', 'tagihanmobiledetail.custno', '=', 'customer.custno')
        //     ->where('tagihanmobileheader.tgl', date('Y-m-d'))
        //     ->whereNotNull('customer.NoMember')
        //     // ->where('customer.NoMember','!=','')
        //     // ->where('customer.NPWP','!=','')
        //     ->where('salesman.Stat','=','1')
        //     ->select(
        //         DB::raw('tagihanmobiledetail.custno'),
        //         DB::raw('customer.custname'),
        //         DB::raw('salesman.Nmslm'),
        //         DB::raw('tagihanmobileheader.nolph'),
        //         DB::raw('tagihanmobiledetail.tgl'),
        //         DB::raw('SUM(tagihanmobiledetail.nilaibayar) as nilaibayar'),
        //         DB::raw('SUM(tagihanmobiledetail.netto) as netto'),
        //         DB::raw('SUM(tagihanmobiledetail.netto) - SUM(tagihanmobiledetail.nilaibayar) as sisa_bayar'),
        //     )
        //     ->groupBy('tagihanmobiledetail.custno')
        //     ->orderByDesc(DB::raw('SUM(tagihanmobiledetail.netto) - SUM(tagihanmobiledetail.nilaibayar)'))
        //     ->get();
        // $data = TagihanMobileHeader::all();
        // $data = TagihanMobileDetail::all();
        // $datah= TagihanHeader::select(
        //     'tagihanheader.kdslm',
        //     'tagihandetail.nobukti',
        //     DB::raw('tagihanheader.Total AS totallph'),
        //     // DB::raw('SUM(CASE WHEN tagihandetail.nobukti = tagihandetail.nobukti THEN tagihanheader.Total ELSE NULL END) AS totallph'),
        //     DB::raw('COUNT(CASE WHEN tagihandetail.nobukti = tagihandetail.nobukti THEN 1 ELSE NULL END) AS countlph'),
        // )
        //     ->join('tagihandetail', 'tagihandetail.nobukti', '=', 'tagihanheader.nobukti')
        //     ->where('tagihanheader.TglTagih', date('Y-m-d'))
        //     ->groupBy('tagihanheader.kdslm')
        //     ->get();

        // $dataD= Tagihandetail::select(
        //     'tagihanheader.kdslm',
        //     'tagihandetail.nobukti',
        //     DB::raw('sum(tagihandetail.Nilai) AS totallph'),
        //     DB::raw('COUNT(tagihandetail.NoFaktur) AS countlph'),
        // )
        //     ->join('tagihanheader', 'tagihandetail.nobukti', '=', 'tagihanheader.nobukti')
        //     ->where('tagihanheader.TglTagih', date('Y-m-d'))
        //     ->groupBy('tagihanheader.kdslm')
        //     ->get();
        // dd($dataD);
        $data['pjpreport'] = PjpPersonildetailIKAJ::select(
            'pjppersonildetail.kdslm',
            DB::raw("salesman.NmSlm"),
            DB::raw("customer.CustName"),
            DB::raw("pjppersonildetail.M1 AS Mg1"),
            DB::raw("pjppersonildetail.M2"),
            DB::raw("pjppersonildetail.M3"),
            DB::raw("pjppersonildetail.M4"),
            DB::raw("pjppersonildetail.M5"),
            DB::raw("COUNT(*) AS Allpjpreport"),
            DB::raw("FLOOR((DAYOFMONTH(CURDATE())-1 + WEEKDAY(CONCAT(YEAR(CURDATE()),'-',MONTH(CURDATE()),'-01')))/7) + 1 AS weeks_of_monthd")
        )->join('salesman', 'pjppersonildetail.kdslm', '=', 'salesman.kdslm')->join('customer', 'pjppersonildetail.custno', '=', 'customer.custno')
            ->where('pjppersonildetail.hari', $hariindo)
            ->where('salesman.stat', '=', '1')
            ->where('salesman.kdslm', '=', '20')
            ->where('pjppersonildetail.M1', '=', '1')
            ->get();

        return view('dashboarddmj.report', $data);
    }
}
