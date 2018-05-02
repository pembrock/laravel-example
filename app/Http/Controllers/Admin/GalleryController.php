<?php

namespace App\Http\Controllers\Admin;

use App\Entities\Gallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GalleryController extends Controller
{
    public function index()
    {
        $gallery = Gallery::orderBy('id', 'desc')->get();
        return view('admin.gallery.index', ['gallery' => $gallery]);
    }

    public function addGallery()
    {
        return view('admin.gallery.add');
    }
}
