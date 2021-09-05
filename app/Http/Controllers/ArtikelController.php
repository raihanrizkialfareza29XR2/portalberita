<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Artikel;
use App\Models\Kategori;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artikel = Artikel::all();
        return view('admin.artikel.index', compact('artikel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Kategori::all();
        $user = User::all();
        return view('admin.artikel.create', compact('kategori','user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required|min:4',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->judul);
        $data['user_id'] = Auth::id();
        $data['views'] = 0;
        $data['kategori_id'] = $request->kategori_id;
        $data['gambar'] = $request->file('gambar')->store('artikel');
        Artikel::create($data);
        Alert::success('success', 'Data berhasil disimpan');
        return redirect()->route('artikel.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $artikel = Artikel::find($id);

        $kategori = Kategori::all();

        $user = User::all();

        return view('admin.artikel.edit', compact('artikel', 'kategori','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $this->validate($request, [
        //     'judul' => 'required|min:4',
        // ]);

        if (empty($request->file('gambar'))) {
        
        $artikel = Artikel::find($id);
        $artikel->update([
        'judul' => $request->judul,
        'slug' => Str::slug($request->judul),
        'body' => $request->body,
        'user_id' => Auth::id(),
        'kategori_id' => $request->kategori_id,
        'is_active' => $request->is_active,
        ]);
        Alert::success('success', 'Data berhasil diupdate');
        return redirect()->route('artikel.index');
        
        } else {
            $artikel = Artikel::find($id);
            Storage::delete($artikel->gambar);
            $artikel->update([
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul),
            'body' => $request->body,
            'user_id' => $request->user_id,
            'kategori_id' => $request->kategori_id,
            'is_active' => $request->is_active,
            'gambar' => $request->file('gambar')->store('artikel'),
            ]);
        }

        
        Alert::success('success', 'Data berhasil diupdate');
        return redirect()->route('artikel.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $artikel = Artikel::find($id);

        Storage::delete($artikel->gambar);
        $artikel->delete();

        Alert::success('success', 'Data berhasil dihapus');
        return redirect()->route('artikel.index');
    }
}
