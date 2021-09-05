<?php

namespace App\Http\Controllers;

use App\Models\Iklan;
use App\Models\Artikel;
use App\Models\Kategori;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $artikel = Artikel::all();
        $kategori = Kategori::all();
        $iklan = Iklan::all();
        return view('front.home', compact('artikel', 'kategori', 'iklan'));
    }
    public function post($slug)
    {
        $kategori = Kategori::all();
        $iklan = Iklan::all();
        $artikel = Artikel::where('slug', $slug)->first();
        $postinganterbaru = Artikel::orderBy('created_at', 'DESC')->limit('5')->get();

        return view('front.artikel.post', compact('artikel', 'kategori', 'iklan', 'postinganterbaru'));
    }
    public function susah($slug)
    {
        $kategori = Kategori::where('slug', $slug)->first();

        return view('front.kategori.kategori', compact('kategori'));
    }
}
