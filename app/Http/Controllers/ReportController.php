<?php

namespace App\Http\Controllers;

use App\Models\Customerlog;
use App\Models\PjpPersonildetailIKAJ;
use App\Models\Fakturjual;
use App\Models\FakturjualMobile;
use App\Models\PjpPersonildetailDMJ;
use App\Models\Tagihandetail;
use App\Models\TagihanDetaillokal;
use App\Models\TagihanHeader;
use App\Models\TagihanMobileHeader;
use App\Models\TagihanMobileDetail;
use App\Models\TagihanMobileDetailLokal;
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




        $subquerytagd = Tagihandetail::select(
            'tagihanheader.kdslm',
            'tagihandetail.custno as custnotagd',
            'tagihandetail.nofaktur as dkfp',
            DB::raw("GROUP_CONCAT(CONCAT(' ( ',tagihandetail.nofaktur, ' / Rp.', CAST(tagihandetail.nilai AS INT) ,' )')) as datafakturs"),
            DB::raw('SUM(tagihandetail.nilai) as total'),
            // DB::raw('CAST(tagihandetail.nilai AS INT) as nilaifp')
        )->Join('tagihanheader', 'tagihandetail.nobukti', '=', 'tagihanheader.nobukti')
            ->where('tagihanheader.tgltagih', date('Y-m-d'))
            ->groupBy('tagihandetail.custno');

        $subquerytagdM = TagihanMobileDetail::select(
            'tagihanmobileheader.kdslm',
            'tagihanmobiledetail.custno as custnotagdm',
            DB::raw('SUM(tagihanmobiledetail.nilaibayar) as nilaibayar'),
        )->Join('tagihanmobileheader', 'tagihanmobiledetail.nobukti', '=', 'tagihanmobileheader.nobukti')
            ->where('tagihanmobileheader.tgl', date('Y-m-d'))
            ->groupBy('tagihanmobiledetail.custno');
        // ->orderBy('tagihanmobiledetail.custno')
        // ->get();

        $subquerycustlog = Customerlog::select(
            'customer_log.custno as custnolog',
            'customer_log.kdslm',
            'customer_log.cekin',
            'customer_log.cekout',
            'customer_log.salesorder',
            'customer_log.bayar',
            DB::raw('TIMEDIFF(cekout, cekin) AS used_time'),
            DB::raw('SUM(customer_log.salesorder) as totalsalesorder')
        )->where('customer_log.tgl', date('Y-m-d'))
            ->groupBy('customer_log.custno');
        // ->orderBy('tagihandetail.custno')


        $datas['pjpreport'] = PjpPersonildetailDMJ::join('salesman', 'pjppersonildetail.kdslm', '=', 'salesman.kdslm')
            ->join('customer', 'pjppersonildetail.custno', '=', 'customer.custno')
            ->leftJoinSub($subquerytagd, 'tagd', function ($join) {
                $join->on('salesman.kdslm', '=', 'tagd.kdslm')
                    ->on('pjppersonildetail.custno', '=', 'tagd.custnotagd');
            })
            ->leftJoinSub($subquerytagdM, 'tagdM', function ($join) {
                $join->on('salesman.kdslm', '=', 'tagdM.kdslm')
                    ->on('pjppersonildetail.custno', '=', 'tagdM.custnotagdm');
            })
            ->leftJoinSub($subquerycustlog, 'custlgr', function ($join) {
                $join->on('salesman.kdslm', '=', 'custlgr.kdslm')
                    ->on('pjppersonildetail.custno', '=', 'custlgr.custnolog');
            })
            ->where('pjppersonildetail.hari', $hariindo)
            ->where('salesman.stat', '=', '1')
            ->orderBy('salesman.NmSlm')
            ->select(
                'pjppersonildetail.kdslm',
                // DB::raw("tagd.dkfp"),
                // DB::raw("tagd.nilaifp"),
                DB::raw("tagd.datafakturs"),
                DB::raw("custlgr.used_time"),
                DB::raw("customer.custno"),
                DB::raw("custlgr.cekin"),
                DB::raw("custlgr.cekout"),
                DB::raw("custlgr.salesorder"),
                DB::raw('IFNULL(tagdM.nilaibayar, 0) AS nilaibayar'),
                DB::raw('IFNULL(tagd.total, 0) AS total'),
                DB::raw("salesman.NmSlm"),
                DB::raw("customer.CustName"),
                DB::raw("pjppersonildetail.M1"),
                DB::raw("pjppersonildetail.M2"),
                DB::raw("pjppersonildetail.M3"),
                DB::raw("pjppersonildetail.M4"),
                DB::raw("pjppersonildetail.M5"),
                // DB::raw("COUNT(*) AS Allpjpreport"),
                DB::raw("FLOOR((DAYOFMONTH(CURDATE())-1 + WEEKDAY(CONCAT(YEAR(CURDATE()),'-',MONTH(CURDATE()),'-01')))/7) + 1 AS weeks_of_monthd")
            )
            ->get();


        $subquerytagd = TagihanDetaillokal::select(
            'tagihanheader.kdslm',
            'tagihanheader.TglTagih',
            'tagihandetail.custno as custnotagd',
            'tagihandetail.nofaktur as dkfp',
            DB::raw('ROUND(tagihandetail.nilai) as total'),
            // DB::raw('CAST(tagihandetail.nilai AS INT) as nilaifp')
        )->Join('tagihanheader', 'tagihandetail.nobukti', '=', 'tagihanheader.nobukti')
            ->groupBy('tagihandetail.custno');

        $subquerytagdM = TagihanMobileDetailLokal::select(
            'tagihanmobileheader.kdslm',
            'tagihanmobileheader.tgl',
            'tagihanmobiledetail.custno as custnotagdm',
            // DB::raw('CAST(tagihanmobiledetail.nilaibayar AS SIGNED INTEGER) as nilaibayar')
            DB::raw('ROUND(tagihanmobiledetail.nilaibayar) as nilaibayar')
        )->Join('tagihanmobileheader', 'tagihanmobiledetail.nobukti', '=', 'tagihanmobileheader.nobukti')
            ->groupBy('tagihanmobiledetail.custno');

        $threeMonthsAgo = Carbon::now()->subMonths(3)->format('Y-m-01');

        $custkartu['custkartu'] = Fakturjual::join('customer as cs', 'cs.CustNo', '=', 'fakturjualheader.CustNo')
            ->join('salesman as sl', 'sl.kdslm', '=', 'fakturjualheader.kdslm')
            ->leftJoinSub($subquerytagd, 'tagd', function ($join) {
                $join->on('sl.kdslm', '=', 'tagd.kdslm')
                    ->on('fakturjualheader.custno', '=', 'tagd.custnotagd');
            })
            ->leftJoinSub($subquerytagdM, 'tagdM', function ($join) {
                $join->on('sl.kdslm', '=', 'tagdM.kdslm')
                    ->on('fakturjualheader.custno', '=', 'tagdM.custnotagdm');
            })
            ->where('fakturjualheader.tgl', '>=', $threeMonthsAgo)
            ->orderBy('fakturjualheader.tgl', 'DESC')
            // ->where('cs.custno', 'DM134')
            // ->where('fakturjualheader.tgl', 'tagd.TglTagih')
            // ->where('fakturjualheader.custno', 'tagd.custno')
            // ->where('fakturjualheader.custno', 'tagdM.custno')
            ->select(
                'fakturjualheader.tgl',
                'cs.custno',
                'cs.CustName',
                'fakturjualheader.Nobukti',
                'sl.Nmslm',
                DB::raw('ROUND(fakturjualheader.Netto) AS orderan'),
                DB::raw('IFNULL(tagdM.nilaibayar, 0) AS nilaibayar'),
                DB::raw('IFNULL(tagd.total, 0) AS total')
            )
            ->get();


        return response()->json($custkartu);
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

        $subquerytagd = Tagihandetail::select(
            'tagihanheader.kdslm',
            'tagihandetail.custno as custnotagd',
            'tagihandetail.nofaktur as dkfp',
            DB::raw("GROUP_CONCAT(CONCAT(' ( ',tagihanheader.kdslm,'-',tagihandetail.nofaktur, ' / Rp.', CAST(tagihandetail.nilai AS INT) ,' )')) as datafakturs"),
            DB::raw('SUM(tagihandetail.nilai) as total'),
        )->Join('tagihanheader', 'tagihandetail.nobukti', '=', 'tagihanheader.nobukti')
            ->where('tagihanheader.tgltagih', date('Y-m-d'))
            ->groupBy('tagihandetail.custno', 'tagihanheader.kdslm');

        $subquerytagdM = TagihanMobileDetail::select(
            'tagihanmobileheader.kdslm',
            'tagihanmobiledetail.custno as custnotagdm',
            DB::raw('SUM(tagihanmobiledetail.nilaibayar) as nilaibayar'),
        )->Join('tagihanmobileheader', 'tagihanmobiledetail.nobukti', '=', 'tagihanmobileheader.nobukti')
            ->where('tagihanmobileheader.tgl', date('Y-m-d'))
            ->groupBy('tagihanmobiledetail.custno');


        $subquerycustlog = Customerlog::select(
            'customer_log.kdslm',
            'customer_log.cekin',
            'customer_log.cekout',
            'customer_log.salesorder',
            'customer_log.bayar',
            'customer_log.alasangagal',
            DB::raw('TIMEDIFF(cekout, cekin) AS used_time'),
            DB::raw('SUM(customer_log.salesorder) as totalsalesorder'),
        )
            ->where('customer_log.tgl', date('Y-m-d'))
            ->groupBy('customer_log.custno');

        $data['pjpreport'] = PjpPersonildetailDMJ::join('salesman', 'pjppersonildetail.kdslm', '=', 'salesman.kdslm')
            ->join('customer', 'pjppersonildetail.custno', '=', 'customer.custno')
            ->leftJoinSub($subquerytagd, 'tagd', function ($join) {
                $join->on('pjppersonildetail.kdslm', '=', 'tagd.kdslm')
                    ->on('pjppersonildetail.custno', '=', 'tagd.custnotagd');
            })
            ->leftJoinSub($subquerytagdM, 'tagdM', function ($join) {
                $join->on('pjppersonildetail.kdslm', '=', 'tagdM.kdslm')
                    ->on('pjppersonildetail.custno', '=', 'tagdM.custnotagdm');
            })
            ->leftJoinSub($subquerycustlog, 'custlgr', function ($join) {
                $join->on('pjppersonildetail.kdslm', '=', 'custlgr.kdslm')
                    ->on('pjppersonildetail.custno', '=', 'custlgr.custnolog');
            })
            ->where('pjppersonildetail.hari', $hariindo)
            ->where('salesman.stat', '=', '1')
            ->orderBy('custlgr.cekin', 'DESC')
            ->select(
                'pjppersonildetail.kdslm',
                // DB::raw("tagd.dkfp"),
                // DB::raw("tagd.nilaifp"),
                DB::raw("tagd.datafakturs"),
                DB::raw("custlgr.used_time"),
                DB::raw("customer.custno"),
                DB::raw("custlgr.alasangagal"),
                DB::raw("custlgr.cekin"),
                DB::raw("custlgr.cekout"),
                DB::raw("custlgr.totalsalesorder"),
                DB::raw('IFNULL(tagdM.nilaibayar, 0) AS nilaibayar'),
                DB::raw('IFNULL(tagd.total, 0) AS total'),
                DB::raw("salesman.NmSlm"),
                DB::raw("customer.CustName"),
                DB::raw("pjppersonildetail.M1"),
                DB::raw("pjppersonildetail.M2"),
                DB::raw("pjppersonildetail.M3"),
                DB::raw("pjppersonildetail.M4"),
                DB::raw("pjppersonildetail.M5"),
                // DB::raw("COUNT(*) AS Allpjpreport"),
                DB::raw("FLOOR((DAYOFMONTH(CURDATE())-1 + WEEKDAY(CONCAT(YEAR(CURDATE()),'-',MONTH(CURDATE()),'-01')))/7) + 1 AS weeks_of_monthd")
            )
            ->get();
        // dd($pjpreport);
        return view('dashboarddmj.report', $data);
    }


    public function reportadmin()
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

        $subquerytagd = Tagihandetail::select(
            'tagihanheader.kdslm',
            'tagihandetail.custno as custnotagd',
            'tagihandetail.nofaktur as dkfp',
            DB::raw("GROUP_CONCAT(CONCAT(' ( ',tagihandetail.nofaktur, ' / Rp.', CAST(tagihandetail.nilai AS INT) ,' )')) as datafakturs"),
            DB::raw('SUM(tagihandetail.nilai) as total'),
            // DB::raw('CAST(tagihandetail.nilai AS INT) as nilaifp')
        )->Join('tagihanheader', 'tagihandetail.nobukti', '=', 'tagihanheader.nobukti')
            ->where('tagihanheader.tgltagih', date('Y-m-d'))
            ->groupBy('tagihandetail.custno');

        $subquerytagdM = TagihanMobileDetail::select(
            'tagihanmobileheader.kdslm',
            'tagihanmobiledetail.custno as custnotagdm',
            DB::raw('SUM(tagihanmobiledetail.nilaibayar) as nilaibayar'),
        )->Join('tagihanmobileheader', 'tagihanmobiledetail.nobukti', '=', 'tagihanmobileheader.nobukti')
            ->where('tagihanmobileheader.tgl', date('Y-m-d'))
            ->groupBy('tagihanmobiledetail.custno');
        // ->orderBy('tagihanmobiledetail.custno')
        // ->get();

        $subquerycustlog = Customerlog::select(
            'customer_log.custno as custnolog',
            'customer_log.kdslm',
            'customer_log.cekin',
            'customer_log.cekout',
            'customer_log.salesorder',
            'customer_log.bayar',
            DB::raw('TIMEDIFF(cekout, cekin) AS used_time'),
            DB::raw('SUM(customer_log.salesorder) as totalsalesorder'),
            // DB::raw('SUM(somobileheader.netto) as nettosomobile')
        )
            // ->Join('somobileheader', 'customer_log.custno', '=', 'somobileheader.custno')
            ->where('customer_log.tgl', date('Y-m-d'))
            ->groupBy('customer_log.custno');
        // ->orderBy('tagihandetail.custno')
        // ->get();

        // dd($subquerytagd);

        $data['pjpreport'] = PjpPersonildetailDMJ::join('salesman', 'pjppersonildetail.kdslm', '=', 'salesman.kdslm')
            ->join('customer', 'pjppersonildetail.custno', '=', 'customer.custno')
            ->leftJoinSub($subquerytagd, 'tagd', function ($join) {
                $join->on('salesman.kdslm', '=', 'tagd.kdslm')
                    ->on('pjppersonildetail.custno', '=', 'tagd.custnotagd');
            })
            ->leftJoinSub($subquerytagdM, 'tagdM', function ($join) {
                $join->on('salesman.kdslm', '=', 'tagdM.kdslm')
                    ->on('pjppersonildetail.custno', '=', 'tagdM.custnotagdm');
            })
            ->leftJoinSub($subquerycustlog, 'custlgr', function ($join) {
                $join->on('salesman.kdslm', '=', 'custlgr.kdslm')
                    ->on('pjppersonildetail.custno', '=', 'custlgr.custnolog');
            })
            ->where('pjppersonildetail.hari', $hariindo)
            ->where('salesman.stat', '=', '1')
            ->orderBy('custlgr.cekin', 'DESC')
            ->select(
                'pjppersonildetail.kdslm',
                // DB::raw("tagd.dkfp"),
                // DB::raw("tagd.nilaifp"),
                DB::raw("tagd.datafakturs"),
                DB::raw("custlgr.used_time"),
                DB::raw("customer.custno"),
                DB::raw("custlgr.alasangagal"),
                DB::raw("custlgr.cekin"),
                DB::raw("custlgr.cekout"),
                DB::raw("custlgr.totalsalesorder"),
                DB::raw('IFNULL(tagdM.nilaibayar, 0) AS nilaibayar'),
                DB::raw('IFNULL(tagd.total, 0) AS total'),
                DB::raw("salesman.NmSlm"),
                DB::raw("customer.CustName"),
                DB::raw("pjppersonildetail.M1"),
                DB::raw("pjppersonildetail.M2"),
                DB::raw("pjppersonildetail.M3"),
                DB::raw("pjppersonildetail.M4"),
                DB::raw("pjppersonildetail.M5"),
                // DB::raw("COUNT(*) AS Allpjpreport"),
                DB::raw("FLOOR((DAYOFMONTH(CURDATE())-1 + WEEKDAY(CONCAT(YEAR(CURDATE()),'-',MONTH(CURDATE()),'-01')))/7) + 1 AS weeks_of_monthd")
            )
            ->get();
        // dd($pjpreport);
        return view('dashboarddmj.report', $data);
    }
}
