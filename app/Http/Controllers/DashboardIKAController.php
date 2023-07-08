<?php

namespace App\Http\Controllers;

use App\Models\CustomerLogIKA;
use App\Models\DashboardIKAJ;
use App\Models\Fakturjual;
use App\Models\HutangIKA;
use App\Models\PiutangIKA;
use App\Models\PjpPersonildetailIKAJ;
use App\Models\PjpPersonilheaderIKAJ;
use App\Models\ReturbeliIKA;
use App\Models\ReturjualIKA;
use App\Models\SOheaderIKA;
use App\Models\StokbulanIKA;
use App\Models\StokkartuIKA;
use App\Models\TagihanMobileDetail;
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
        $data['targets'] = TargetSalesmanIKA::all();

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
            ->select(DB::raw('SUM(Netto) as nilaiika'))
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


        return view('dashboarddmj.ika', ['salesmans'=>$salesmans, 'bulanika' => $bulanika, 'totalkartustok' => $totalkartustok, 'sumsalesmanika' => $sumsalesmanika, 'salesoutsalesmanika' => $salesoutsalesmanika, 'nilaiika' => $nilaiika], $data);
    }
}
