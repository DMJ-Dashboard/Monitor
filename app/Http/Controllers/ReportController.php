<?php

namespace App\Http\Controllers;

use App\Models\Customerlog;
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
        // MAINTANANCE
        $data['custlog1'] = Customerlog::join('customer', 'customer_log.custno', '=', 'customer.CustNo')
            ->join('salesman', 'customer_log.kdslm', '=', 'salesman.kdslm')
            ->where('customer_log.tgl', date('Y-m-d'))
            ->where('customer_log.cekin', '!=', NULL)
            ->where('customer_log.kdslm', '!=', "")
            ->select(
                DB::raw('customer_log.*'),
                DB::raw('salesman.Nmslm'),
                DB::raw('customer.custname, TIMEDIFF(cekout, cekin) AS used_time')
            )
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
        return view('dashboarddmj.report', $data);
    }
}
