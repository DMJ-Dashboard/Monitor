<?php

namespace App\Http\Controllers;

use App\Models\Fakturjual;
use App\Models\Fakturjualmobile;
use App\Models\TagihanDetail;
use App\Models\TagihanMobileDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CustomerKartu extends Controller
{
    public function CustKartu()
    {
        git 

        $subquerytagd = Tagihandetail::select(
            'tagihanheader.kdslm',
            'tagihanheader.tgl',
            'tagihandetail.custno as custnotagd',
            'tagihandetail.nofaktur as dkfp',
            DB::raw('SUM(tagihandetail.nilai) as total'),
            // DB::raw('CAST(tagihandetail.nilai AS INT) as nilaifp')
        )->Join('tagihanheader', 'tagihandetail.nobukti', '=', 'tagihanheader.nobukti')
        ->groupBy('tagihandetail.custno');

        $subquerytagdM = TagihanMobileDetail::select(
            'tagihanmobileheader.kdslm',
            'tagihanmobileheader.tgl',
            'tagihanmobiledetail.custno as custnotagdm',
            DB::raw('SUM(tagihanmobiledetail.nilaibayar) as nilaibayar'),
        )->Join('tagihanmobileheader', 'tagihanmobiledetail.nobukti', '=', 'tagihanmobileheader.nobukti')
            ->groupBy('tagihanmobiledetail.custno');

        $custkartu['custkartu'] = Fakturjualmobile::join('customer as cs', 'cs.CustNo', '=', 'fakturjualheader.CustNo')
            ->join('salesman as sl', 'sl.kdslm', '=', 'fakturjualheader.kdslm')
            ->leftJoinSub($subquerytagd, 'tagd', function ($join) {
                $join->on('sl.kdslm', '=', 'tagd.kdslm')
                    ->on('fakturjualheader.custno', '=', 'tagd.custnotagd');
            })
            ->leftJoinSub($subquerytagdM, 'tagdM', function ($join) {
                $join->on('sl.kdslm', '=', 'tagdM.kdslm')
                    ->on('fakturjualheader.custno', '=', 'tagdM.custnotagdm');
            })
            ->where('fakturjualheader.tglkirim', '>=', $threeMonthsAgo)
            ->orderBy('fakturjualheader.tglkirim', 'DESC')
            ->select('fakturjualheader.tglkirim',
            'cs.custno',
            'cs.CustName',
            // 'fakturjualheader.Nobukti',
            'fakturjualheader.Netto AS orderan',
            'sl.Nmslm',
            DB::raw('IFNULL(tagdM.nilaibayar, 0) AS nilaibayar'),
            DB::raw('IFNULL(tagd.total, 0) AS total'))
            ->get();

            $subquerytagd = Tagihandetail::select(
                'tagihanheader.kdslm',
                'tagihandetail.custno as custnotagd',
                'tagihandetail.nofaktur as dkfp',
                DB::raw("GROUP_CONCAT(CONCAT(' ( ',tagihandetail.nofaktur, ' / Rp.', CAST(tagihandetail.nilai AS INT) ,' )')) as datafakturs"),
                DB::raw('SUM(tagihandetail.nilai) as total'),
                // DB::raw('CAST(tagihandetail.nilai AS INT) as nilaifp')
            )->Join('tagihanheader', 'tagihandetail.nobukti', '=', 'tagihanheader.nobukti')
                ->where('tagihanheader.tgltagih', date('Y-m-d'))
                ->where('tagihandetail.custno', "DR119")
                ->where('tagihanheader.kdslm',"01")
                ->groupBy('tagihandetail.custno')
                ->get();

            dd($subquerytagd);
        return view('dashboarddmj.custkartu', $data);
    }
}
