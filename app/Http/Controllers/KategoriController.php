<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $kategori = Kategori::latest()->paginate(5);
      
        return view('kategori.index',compact('kategori'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'tipe' => 'required',
            'nama_kategori' => 'required',
            'deskripsi' => 'required',
        ]);
      
        Kategori::create($request->all());
       
        return redirect()->route('kategori.index')
                        ->with('success','Kategori created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kategori $kategori): View
    {
        return view('kategori.show',compact('kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kategori $kategori): View
    {
        return view('kategori.edit',compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kategori $kategori): RedirectResponse
    {
        $request->validate([
            'tipe' => 'required',
            'nama_kategori' => 'required',
            'deskripsi' => 'required',
        ]);
      
        $kategori->update($request->all());
      
        return redirect()->route('kategori.index')
                        ->with('success','Kategori updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kategori $kategori): RedirectResponse
    {
        $kategori->delete();
       
        return redirect()->route('kategori.index')
                        ->with('success','Kategori deleted successfully');
    }
}
