<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Transaksi;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        if(!empty($request->start) && $request->end != '') {

            $transaksi = Transaksi::whereBetween('created_at', [$request->start, $request->end])->latest()->paginate(5);
        }else{
            
            $transaksi = Transaksi::where('created_at', 'LIKE', '%'.date('Y-m').'%')->latest()->paginate(5);
        }
      
        return view('transaksi.index',compact('transaksi'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('transaksi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'jenis' => 'required',
            'nama_kategori' => 'required',
            'nominal' => 'required',
            'deskripsi' => 'required',
        ]);
      
        Transaksi::create($request->all());
       
        return redirect()->route('transaksi.index')
                        ->with('success','transaksi created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaksi $transaksi): View
    {
        return view('transaksi.show',compact('transaksi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaksi $transaksi): View
    {
        return view('transaksi.edit',compact('transaksi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaksi $transaksi): RedirectResponse
    {
        $request->validate([
            'jenis' => 'required',
            'nama_kategori' => 'required',
            'nominal' => 'required',
            'deskripsi' => 'required',
        ]);
      
        $transaksi->update($request->all());
      
        return redirect()->route('transaksi.index')
                        ->with('success','transaksi updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaksi $transaksi): RedirectResponse
    {
        $transaksi->delete();
       
        return redirect()->route('transaksi.index')
                        ->with('success','transaksi deleted successfully');
    }

    public function getKategori(Request $request)
    {
        if(isset($request->jenis)) {
            $kategori = Kategori::where('tipe', $request->jenis)->get();
            $template = [];
            foreach ($kategori as $key => $kat) {
                if(!empty($request->method) && $request->method == $kat['nama_kategori']){
                    $html = '<option value="'.$kat['nama_kategori'].'" selected>'.$kat['nama_kategori'].'</option>';
                }else{
                    $html = '<option value="'.$kat['nama_kategori'].'">'.$kat['nama_kategori'].'</option>';
                }
                array_push($template,$html);
            }

            echo json_encode($template);
        }
        
    }
}
