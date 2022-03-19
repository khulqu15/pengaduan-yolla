<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanController extends Controller
{
    public function index()
    {
        return view('Admin.Laporan.index');
    }

    public function getLaporan(Request $request)
    {
        //$from = $request->form . ' ' . '00:00:00';

        //$to = $request->to . ' ' . '23:59:59';


        // // print($request->from);
        // // print_r($from.'-'.$to);
        // // exit;

        if(!empty($request->form)){
            $from = date('Y-m-d', strtotime($request->form));

            $to = date('Y-m-d',strtotime($request->to));

            $pengaduan = Pengaduan::whereBetween('tgl_pengaduan', [$from, $to])->get();
        }else{
            $from = '';

            $to = '';

            $pengaduan = Pengaduan::get();
        }


        return view('Admin.Laporan.index', ['pengaduan' => $pengaduan, 'from' => $from, 'to' => $to]);
     }

     public function cetakLaporan($from, $to)
     {

         $pengaduan = Pengaduan::whereBetween('tgl_pengaduan' , [$from, $to])->get();

         $pdf = PDF::loadView('Admin.Laporan.cetak', ['pengaduan' => $pengaduan]);
         return $pdf->download('laporan-pengaduan.pdf');
     }

     public function cetakSemua()
     {
        $pengaduan = Pengaduan::get();

         $pdf = PDF::loadView('Admin.Laporan.cetak', ['pengaduan' => $pengaduan]);
         return $pdf->download('laporan-pengaduan.pdf');
     }
}
