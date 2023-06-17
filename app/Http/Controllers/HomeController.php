<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $pemasukan = Transaksi::where('jenis', 'Pemasukan')->sum('nominal');
        $pengeluaran = Transaksi::where('jenis', 'Pengeluaran')->sum('nominal');
        $saldo = $pemasukan-$pengeluaran;
        
        return view('home.index',['income' => $pemasukan, 'outcome' => $pengeluaran, 'saldo' => $saldo]);
    }
}
