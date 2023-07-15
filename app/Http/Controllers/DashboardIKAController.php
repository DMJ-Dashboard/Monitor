<?php

namespace App\Http\Controllers;

use App\Models\DashboardIKAJ;
use App\Models\CustomerLogIKA;
use App\Models\Fakturjual;
use App\Models\HutangIKA;
use App\Models\PiutangIKA;
use App\Models\PjpPersonildetailIKAJ;
use App\Models\PjpPersonilheaderIKAJ;
use App\Models\ReturbeliIKA;
use App\Models\ReturjualIKA;
use App\Models\SOheaderIKA;
use App\Models\SomobileheaderIKA;
use App\Models\StokbulanIKA;
use App\Models\StokkartuIKA;
use App\Models\TagihanDetailIKAM;
use App\Models\TagihanHeaderIKAM;
use App\Models\TagihanMobileDetail;
use App\Models\TagihanMobileHeader;
use App\Models\TagihanMobileHeaderIKAM;
use App\Models\TargetSalesmanIKA;
use Illuminate\Support\Facades\DB;

class DashboardIKAController extends Controller
{
    public function show($nobukti)
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
        $mingguke = PjpPersonildetailIKAJ::whereYear("pjppersonildetail.lastmodified", date('Y'))
            ->select(
                DB::raw("DISTINCT FLOOR((DAYOFMONTH(CURDATE())-1 + WEEKDAY(CONCAT(YEAR(CURDATE()),'-',MONTH(CURDATE()),'-01')))/7) + 1 AS minggukebrp")
            )
            ->get();

        $data['salesmanpjpname'] = PjpPersonildetailIKAJ::where('nobukti', $nobukti)
            ->join('salesman', 'salesman.kdslm', '=', 'pjppersonildetail.kdslm')
            ->GroupBy('salesman.kdslm')
            ->select(
                DB::raw("salesman.NmSlm"),
            )
            ->get();

        // $data['showpjp'] = PjpPersonildetailIKAJ::where('nobukti', $nobukti)->get();

        $showpjppersonildetail = PjpPersonildetailIKAJ::where('pjppersonildetail.nobukti', $nobukti)
            ->join('salesman', 'salesman.kdslm', '=', 'pjppersonildetail.kdslm')
            ->join('customer', 'customer.Custno', '=', 'pjppersonildetail.Custno')
            ->join('tagihanmobileheader', 'tagihanmobileheader.kdslm', '=', 'pjppersonildetail.kdslm')
            ->join('tagihanmobiledetail', 'tagihanmobiledetail.nobukti', '=', 'tagihanmobileheader.nobukti')
            // ->join('tagihanmobileheader', 'tagihanmobiledetail.nobukti', '=', 'tagihanmobileheader.nobukti')
            ->where('pjppersonildetail.cabang', "20")
            ->where('pjppersonildetail.hari', $hariindo)
            ->select(
                // DB::raw('COUNT(CASE WHEN customer_log.statusorder = "sukses" OR customer_log.status = "sukses" THEN 1 END) AS suksescard'),
                DB::raw("pjppersonildetail.M1"),
                DB::raw("pjppersonildetail.M2"),
                DB::raw("pjppersonildetail.M3"),
                DB::raw("pjppersonildetail.M4"),
                DB::raw("pjppersonildetail.M5"),
                DB::raw("pjppersonildetail.hari as haripjp"),
                DB::raw("pjppersonildetail.nobukti as NoOfPJPd"),
                DB::raw("salesman.Nmslm as NamaSalesOfPJPd"),
                DB::raw("salesman.Kdslm"),
                DB::raw("pjppersonildetail.Custno as CustnoOfPJPd"),
                DB::raw("customer.Alamat1"),
                DB::raw("customer.CustName as NamaCustOfPJPd"),
                // DB::raw("SUM(tagihanmobiledetail.netto) as NilaiTagihan"),
                // DB::raw("SUM(tagihanmobiledetail.nilaibayar)"),
                // DB::raw("SUM(tagihanmobiledetail.netto)-SUM(tagihanmobiledetail.nilaibayar) AS sisa"),
                DB::raw("FLOOR((DAYOFMONTH(CURDATE())-1 + WEEKDAY(CONCAT(YEAR(CURDATE()),'-',MONTH(CURDATE()),'-01')))/7) + 1 AS weeks_of_monthd")
            )
            ->groupBy('pjppersonildetail.custno1')
            ->get();
        // dd($showpjppersonildetail[0]['Kdslm']);

        $tagihandetail = TagihanMobileDetail::where('tagihanmobileheader.tgl', date('Y-m-d'))
            ->where('tagihanmobileheader.kdslm', $showpjppersonildetail[0]['Kdslm'])
            ->join('tagihanmobileheader', 'tagihanmobileheader.nobukti', '=', 'tagihanmobiledetail.nobukti')
            ->select(
                DB::raw("tagihanmobileheader.kdslm"),
                DB::raw("tagihanmobileheader.tgl"),
                DB::raw("tagihanmobiledetail.custno"),
                DB::raw("tagihanmobiledetail.nobukti"),
                DB::raw("SUM(tagihanmobiledetail.netto) as NilaiTagihan"),
                DB::raw("SUM(tagihanmobiledetail.nilaibayar) as Bayaran"),
                DB::raw("SUM(tagihanmobiledetail.netto)-SUM(tagihanmobiledetail.nilaibayar) AS sisa"),
            )
            ->groupBy('tagihanmobiledetail.custno')
            ->orderBy('tagihanmobileheader.kdslm')
            ->get();
        foreach ($tagihandetail as $value) {
        }
        // dd($tagihandetail );
        return view("dashboarddmj.showpjp", ['mingguke' => $mingguke, 'showpjppersonildetail' => $showpjppersonildetail, 'tagihandetail' => $tagihandetail], $data);
    }
    public function dashboardika()
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
        
        $data['targets'] = TargetSalesmanIKA::all();

        $callinput = CustomerLogIKA::where('tgl', date('Y-m-d'))
            ->where('kdslm', '!=', "")
            ->groupBy(DB::raw("kdslm"))
            ->select(DB::raw('kdslm, COUNT(cekin) AS callinput'))
            ->pluck('callinput');

        $subqueryec = SomobileheaderIKA::select(
            'kdslm',
            DB::raw('COUNT( CASE WHEN stat != 0 THEN 1 END ) as jumlah_ec_sombhead'),
            DB::raw('COUNT(DISTINCT custno) as sukses')
        )
            ->where('tgl', date('Y-m-d'))
            ->groupBy('kdslm')
            ->orderBy('kdslm');

        $sukses = CustomerLogIKA::join('somobileheader', 'somobileheader.kdslm', '=', 'customer_log.kdslm')
        ->leftJoinSub($subqueryec, 'somobsukses', function ($join) {
            $join->on('customer_log.kdslm', '=', 'somobsukses.kdslm');
        })
        ->where('customer_log.tgl', date('Y-m-d'))
        ->where('customer_log.kdslm', '!=', "")
        ->groupBy(DB::raw("customer_log.kdslm"))
        ->select(
            DB::raw('IFNULL(somobsukses.sukses, 0) AS sukses'),
        )
        ->pluck('sukses');

        $salesmans = CustomerLogIKA::Join('salesman', 'customer_log.kdslm', '=', 'salesman.kdslm')
            ->where('customer_log.tgl', date('Y-m-d'))
            ->where('customer_log.kdslm', '!=', "")
            ->groupBy(DB::raw("customer_log.kdslm"))
            ->select(
                DB::raw("salesman.NmSlm AS salesmans")
            )
            ->pluck('salesmans');

        $data['countsales'] = DashboardIKAJ::whereMonth("TglKirim", date('m'))
            ->join('target', 'fakturjualheader.kdslm', '=', 'target.kdslm')
            ->join('salesman', 'salesman.kdslm', '=', 'target.kdslm')
            ->whereYear("fakturjualheader.TglKirim", date('Y'))
            ->where("fakturjualheader.Kdslm", "!=", "000")
            ->groupBy(DB::raw("fakturjualheader.Kdslm"))
            ->select(DB::raw('target.jcust, salesman.NmSlm, fakturjualheader.Kdslm , COUNT(DISTINCT fakturjualheader.CustNo) as csales'))
            ->get();
        // dd($countsales);

        $data['pjppersonilheader'] = PjpPersonilheaderIKAJ::join('salesman', 'salesman.kdslm', '=', 'pjppersonilheader.kdslm')
            ->where("salesman.stat", "1")
            // ->whereYear("pjppersonilheader.lastmodified", date('Y'))
            ->groupBy(DB::raw("salesman.kdslm"))
            ->select(
                DB::raw("pjppersonilheader.nobukti as NoOfPJPh"),
                DB::raw("salesman.Nmslm as NamaSalesOfPJPh"),
                DB::raw("salesman.Kdslm"),
                DB::raw("pjppersonilheader.lastmodified"),
                DB::raw("FLOOR((DAYOFMONTH(CURDATE())-1 + WEEKDAY(CONCAT(YEAR(CURDATE()),'-',MONTH(CURDATE()),'-01')))/7) + 1 AS weeks_of_monthh")
            )->get();

        $data['penjaualndb22'] = DashboardIKAJ::whereMonth("TglKirim", date('m'))
            ->whereYear("TglKirim", date('Y'))
            ->where("stat", '6')
            ->orwhere("stat", '2')
            ->count();

        $data['sumpenjualandb22'] = DashboardIKAJ::whereMonth("TglKirim", date('m'))
            ->whereYear("TglKirim", date('Y'))
            ->where("stat", '6')
            ->orwhere("stat", '2')
            ->sum('Netto');

        //card retur jual
        $data['countreturgeneral'] = ReturjualIKA::whereMonth("TglKirim", date('m'))
            ->whereYear("TglKirim", date('Y'))
            ->where("stat", '6')
            ->count();

        $data['sumstretur'] = ReturjualIKA::whereMonth("TglKirim", date('m'))
            ->whereYear("TglKirim", date('Y'))
            ->where("stat", '6')
            ->sum('Netto');

        //card Piutang
        $data['sumspiutang'] = PiutangIKA::whereMonth("Tgl", date('m'))
            // ->whereRaw('DATEDIFF(TglJTempo,CURRENT_DATE()) >= ?', '0')
            ->whereYear("Tgl", date('Y'))
            ->sum('Netto');
        $data['countspiutang'] = PiutangIKA::whereMonth("Tgl", date('m'))
            // ->whereRaw('DATEDIFF(TglJTempo,CURRENT_DATE()) >= ?', '0')
            ->whereYear("Tgl", date('Y'))
            ->count();

        //card Piutang
        $data['sumshutang'] = HutangIKA::whereRaw("DATE_FORMAT(TglJTempo, '%Y-%m') >= ?", date('Y-m'))
            ->whereRaw('DATEDIFF(TglJTempo,CURRENT_DATE()) >= ?', '0')
            ->where('kdsupplier', '!=', 'k28')
            ->sum('Netto');

        $data['countshutang'] = HutangIKA::whereMonth("TglJTempo", '>=', date('m'))
            ->whereYear("TglJTempo", '>=', date('Y'))
            ->count();

        $data['sumshutangperprincipal'] = HutangIKA::whereRaw("DATE_FORMAT(TglJTempo, '%Y-%m') >= ?", date('Y-m'))
            ->whereRaw('DATEDIFF(TglJTempo,CURRENT_DATE()) >= ?', '0')
            ->whereNotIn('kdsupplier', ['k28'])
            ->groupBy(DB::raw("KdSupplier"))
            ->select(DB::raw('KdSupplier , SUM(netto) as sumprincipal'))
            ->get();
        // dd($datab);

        $data['sumshutangperprincipaltgl'] = HutangIKA::whereRaw("DATE_FORMAT(TglJTempo, '%Y-%m') >= ?", date('Y-m'))
            ->whereRaw('DATEDIFF(TglJTempo,CURRENT_DATE()) >= ?', '0')
            ->whereNotIn('kdsupplier', ['k28'])
            ->groupBy(DB::raw("KdSupplier, TglJTempo"))
            // ->orderBy(DB::raw("CASE WHEN TglJTempo >=CURRENT_DATE() THEN 'Hutang Masih Ada' END"))
            ->orderBy('TglJTempo', 'DESC')
            ->select(DB::raw('KdSupplier, TglJTempo, SUM(netto) as sumprincipaltgl, DATEDIFF(TglJTempo,CURRENT_DATE()) AS Jumlah_Haritgl'))
            ->get();

        $data['sumreturbeli'] = ReturbeliIKA::whereMonth("tgl", date('m'))
            ->whereYear("tgl", date('Y'))
            ->sum('Netto');

        $data['sumsodaily'] = SOheaderIKA::where('tgl', date('Y-m-d'))
            ->sum('netto');

        $data['fakturbatal'] = DashboardIKAJ::whereMonth("TglKirim", date('m'))
            ->whereYear("TglKirim", date('Y'))
            ->where("stat", '4')
            ->sum('Netto');


        $stokK = StokkartuIKA::where("mk", "k")
            ->select(DB::raw('SUM(hpp*qty) as stokk'))
            ->get();
        $stokM = StokkartuIKA::where("mk", "m")
            ->select(DB::raw("SUM(hpp*qty) as stokm"))
            ->get();

        $arraystokk = $stokK[0]['stokk'];
        $arraystokm = $stokM[0]['stokm'];
        $totalkartustok = $arraystokm - $arraystokk;
        // dd(round($totalkartustok));

        $bulanika = DashboardIKAJ::select(DB::raw("MONTHNAME(TglKirim) as bulanika"))
            ->GroupBy(DB::raw("MONTHNAME(TglKirim)"))
            ->OrderBy(DB::raw("MONTH(TglKirim)"))
            ->whereYear("TglKirim", '2021')
            ->whereNotIn('TglKirim', ['null'])
            ->pluck('bulanika');


        $nilaiika = DashboardIKAJ::where("stat", '6')
            ->GroupBy(DB::raw("MONTHNAME(TglKirim)"))
            ->select(DB::raw('CAST(SUM(Netto) as SIGNED) as nilaiika'))
            ->OrderBy(DB::raw("MONTH(TglKirim)"))
            ->whereYear("TglKirim", date('Y'))
            ->pluck('nilaiika');

        $salesoutsalesmanika = DashboardIKAJ::whereMonth("TglKirim", date('m'))
            ->whereYear("TglKirim", date('Y'))
            ->orderBy(DB::raw("kdslm"))
            ->where('kdslm', '!=', "")
            ->where('kdslm', '!=', "07")
            ->groupBy(DB::raw("kdslm"))
            ->select(DB::raw('kdslm, SUM(Netto) AS salesoutsalesmanika'))
            ->pluck('salesoutsalesmanika');

        $sumsalesmanika = DashboardIKAJ::join('salesman', 'fakturjualheader.kdslm', '=', 'salesman.kdslm')
            ->whereMonth("fakturjualheader.TglKirim", date('m'))
            ->whereYear("fakturjualheader.TglKirim", date('Y'))
            ->where('fakturjualheader.kdslm', '!=', "")
            ->select(DB::raw('salesman.NmSlm as sumsalesmanika'))
            ->orderBy(DB::raw("fakturjualheader.kdslm"))
            ->groupBy(DB::raw("salesman.NmSlm"))
            ->pluck('sumsalesmanika');
        // ->get();
        // dd($sumsalesmanika);

        $saldostok99 = StokbulanIKA::join('barang', 'stokbulan.kdbrg', '=', 'barang.kdbrg')
            ->join('supplier', 'supplier.KdSupplier', '=', 'barang.KdSupplier')
            ->where('stokbulan.tahun', date('Y'))
            ->where('stokbulan.kdGudang', "99")
            ->where('supplier.KdSupplier', '!=', "k21")
            ->where('supplier.KdSupplier', '!=', "k24")
            ->where('supplier.KdSupplier', '!=', "k30")
            ->where('supplier.KdSupplier', '!=', "k31")
            ->where('barang.Stat', '!=', "2")
            ->where('supplier.Stat', '!=', "2")
            // ->groupBy(DB::raw("barang.KdSupplier"))
            ->select(
                // DB::raw('barang.KdSupplier, stokbulan.kdgudang, stokbulan.Nawal,supplier.NamaSupplier'),
                // DB::raw('SUM(stokbulan.Nm1+stokbulan.Nm2+stokbulan.Nm3) AS Total_masuk'),
                // DB::raw('SUM(stokbulan.Nk1+stokbulan.Nk2+stokbulan.Nk3) AS Total_masuk'),
                DB::raw('SUM((stokbulan.Nm1+stokbulan.Nm2+stokbulan.Nm3)-(stokbulan.Nk1+stokbulan.Nk2+stokbulan.Nk3) + Nawal) AS Sisa_saldo99')
            )
            ->get();
        $saldostok98 = StokbulanIKA::join('barang', 'stokbulan.kdbrg', '=', 'barang.kdbrg')
            ->join('supplier', 'supplier.KdSupplier', '=', 'barang.KdSupplier')
            ->where('stokbulan.tahun', date('Y'))
            ->where('stokbulan.kdGudang', "98")
            ->where('supplier.KdSupplier', '!=', "k21")
            ->where('supplier.KdSupplier', '!=', "k24")
            ->where('supplier.KdSupplier', '!=', "k30")
            ->where('supplier.KdSupplier', '!=', "k31")
            ->where('barang.Stat', '!=', "2")
            ->where('supplier.Stat', '!=', "2")
            // ->groupBy(DB::raw("barang.KdSupplier"))
            ->select(
                // DB::raw('barang.KdSupplier, stokbulan.kdgudang, stokbulan.Nawal,supplier.NamaSupplier'),
                // DB::raw('SUM(stokbulan.Nm1+stokbulan.Nm2+stokbulan.Nm3) AS Total_masuk'),
                // DB::raw('SUM(stokbulan.Nk1+stokbulan.Nk2+stokbulan.Nk3) AS Total_masuk'),
                DB::raw('SUM((stokbulan.Nm1+stokbulan.Nm2+stokbulan.Nm3)-(stokbulan.Nk1+stokbulan.Nk2+stokbulan.Nk3) + Nawal) AS Sisa_saldo98')
            )
            ->get();

        $arraysaldostok98 = $saldostok98[0]['Sisa_saldo98'];
        $arraysaldostok99 = $saldostok99[0]['Sisa_saldo99'];

        $data['totalsaldostok'] = $arraysaldostok98 + $arraysaldostok99;


        $subquerypjpdetail = PjpPersonildetailIKAJ::select(
            'pjppersonildetail.kdslm',
            DB::raw('COUNT(pjppersonildetail.custno) AS count_pjp'),
            DB::raw("pjppersonildetail.M1"),
            DB::raw("pjppersonildetail.M2"),
            DB::raw("pjppersonildetail.M3"),
            DB::raw("pjppersonildetail.M4"),
            DB::raw("pjppersonildetail.M5"),
        )->join('salesman', 'pjppersonildetail.kdslm', '=', 'salesman.kdslm')
            ->where('pjppersonildetail.hari', $hariindo)
            ->where('salesman.stat', '=', '1')
            ->groupBy('pjppersonildetail.kdslm')
            ->orderBy('pjppersonildetail.kdslm');

        $subqueryec = SomobileheaderIKA::select(
            'kdslm',
            DB::raw('COUNT( CASE WHEN stat != 0 THEN 1 END ) as jumlah_ec_sombhead'),
            DB::raw('COUNT(DISTINCT custno) as sukses')
        )
            ->where('tgl', date('Y-m-d'))
            ->groupBy('kdslm')
            ->orderBy('kdslm');

        $subquerytagihanheadmob = TagihanMobileHeaderIKAM::select(
            'tagihanmobileheader.kdslm',
            'tagihanmobiledetail.nobukti as nobuktidet',
            DB::raw('tagihanmobileheader.totalbayar AS bayartagihan'),
            // DB::raw('tagihanmobileheader.totalfaktur - tagihanmobileheader.totalbayar AS SisaTagihan'),
            DB::raw('COUNT(CASE WHEN tagihanmobiledetail.nilaibayar > 0.00 THEN 1 ELSE NULL END) AS countbayartagihan'),

        )
            ->join('tagihanmobiledetail', 'tagihanmobiledetail.nobukti', '=', 'tagihanmobileheader.nobukti')
            ->where('tagihanmobileheader.tgl', date('Y-m-d'))
            ->groupBy('tagihanmobileheader.kdslm')
            // ->get()
        ;

        $subquerytagihanhead = TagihanHeaderIKAM::select(
            'tagihanheader.kdslm',
            'tagihandetail.nobukti as nobuktidetail',
            DB::raw('tagihanheader.Total AS totallph'),
            DB::raw('COUNT(CASE WHEN tagihandetail.nobukti = tagihandetail.nobukti THEN 1 ELSE NULL END) AS countbayartagihan'),

        )
            ->join('tagihandetail', 'tagihandetail.nobukti', '=', 'tagihanheader.nobukti')
            ->where('tagihanheader.tgl', date('Y-m-d'))
            ->groupBy('tagihanheader.kdslm')
            // ->get()
        ;

        $subquerytagihanhead = TagihanDetailIKAM::select(
            'tagihanheader.kdslm',
            'tagihandetail.NoBukti',
            DB::raw('sum(tagihandetail.Nilai) AS totallph'),
            DB::raw('COUNT(tagihandetail.NoFaktur) AS countlph'),
        )
            ->join('tagihanheader', 'tagihandetail.NoBukti', '=', 'tagihanheader.nobukti')
            ->where('tagihanheader.TglTagih', date('Y-m-d'))
            ->groupBy('tagihanheader.kdslm')
            // ->get()
            ;
        $data['custlogs2'] = CustomerLogIKA::join('salesman', 'customer_log.kdslm', '=', 'salesman.kdslm')
            ->leftJoinSub($subquerypjpdetail, 'pjp', function ($join) {
                $join->on('salesman.kdslm', '=', 'pjp.kdslm');
            })
            ->leftJoinSub($subquerytagihanheadmob, 'taghm', function ($join) {
                $join->on('salesman.kdslm', '=', 'taghm.kdslm');
            })
            ->leftJoinSub($subquerytagihanhead, 'taghm2', function ($join) {
                $join->on('salesman.kdslm', '=', 'taghm2.kdslm');
            })
            ->leftJoinSub($subqueryec, 'ec', function ($join) {
                $join->on('salesman.kdslm', '=', 'ec.kdslm');
            })
            ->where('customer_log.tgl', date('Y-m-d'))
            ->whereNotNull('customer_log.cekin')
            ->where('customer_log.kdslm', '!=', '')
            ->groupBy('salesman.NmSlm')
            ->orderBy('salesman.kdslm')
            ->select(
                'salesman.NmSlm as salesmans',
                DB::raw('MIN(customer_log.cekin) AS firstcekin'),
                DB::raw('MAX(customer_log.cekin) AS lastcekin'),
                DB::raw('COUNT(customer_log.cekin) AS callinputcard'),
                DB::raw('COUNT(CASE WHEN customer_log.statusorder = "sukses" OR customer_log.status = "sukses" THEN 1 END) AS suksescard'),
                DB::raw('SEC_TO_TIME(SUM(TIME_TO_SEC(customer_log.cekout) - TIME_TO_SEC(customer_log.cekin))) AS used_time'),
                DB::raw('SUBTIME("06:00:00",SEC_TO_TIME(SUM(TIME_TO_SEC(customer_log.cekout) - TIME_TO_SEC(customer_log.cekin)))) AS remaining_time'),
                // DB::raw('SUBTIME(SEC_TO_TIME(SUM(TIME_TO_SEC(customer_log.cekout) - TIME_TO_SEC(customer_log.cekin)))) - 21600 AS remaining_time'),
                DB::raw('SUM(CASE WHEN customer_log.tgl = CURDATE() THEN TIME_TO_SEC(customer_log.cekout) - TIME_TO_SEC(customer_log.cekin) ELSE 0 END)/23400*100 AS used_sec'),
                DB::raw('SUM(customer_log.salesorder) AS penjualan'),
                DB::raw('IFNULL(pjp.count_pjp, 0) AS count_pjp'),
                DB::raw("pjp.M1"),
                DB::raw("pjp.M2"),
                DB::raw("pjp.M3"),
                DB::raw("pjp.M4"),
                DB::raw("pjp.M5"),
                DB::raw('IFNULL(ec.jumlah_ec_sombhead, 0) AS jumlah_ec_sombhead'),
                DB::raw('IFNULL(taghm2.totallph, 0) AS totallph'),
                DB::raw('IFNULL(taghm2.countlph, 0) AS countlph'),
                DB::raw('taghm2.totallph-taghm.bayartagihan as SisaTotalTagihan'),
                DB::raw('taghm2.countlph-taghm.countbayartagihan as Sisacount'),
                DB::raw('IFNULL(taghm.countbayartagihan, 0) AS countbayartagihan'),
                DB::raw('IFNULL(taghm.bayartagihan, 0) AS bayartagihan'),
                DB::raw('( COUNT(customer_log.cekin)) / IFNULL(pjp.count_pjp, 0) * 100 AS pjp_percentage'),
                DB::raw("FLOOR((DAYOFMONTH(CURDATE())-1 + WEEKDAY(CONCAT(YEAR(CURDATE()),'-',MONTH(CURDATE()),'-01')))/7) + 1 AS weeks_of_monthd")
            )
            ->get();

        return view('dashboarddmj.ika', ['sukses'=>$sukses, 'callinput'=>$callinput, 'salesmans'=>$salesmans, 'bulanika' => $bulanika, 'totalkartustok' => $totalkartustok, 'sumsalesmanika' => $sumsalesmanika, 'salesoutsalesmanika' => $salesoutsalesmanika, 'nilaiika' => $nilaiika], $data);
    }
}
