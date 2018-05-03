<?php

namespace App\Http\Controllers\Front;

use App\Entities\Gallery;
use App\Entities\ImageGallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GalleryController extends Controller
{
    protected $uploadPath = 'upload/gallery';
    public function index()
    {
        $galleries = Gallery::where('is_visible', 1)->get();
        $galleryPreview = [];
        foreach ($galleries as $gallery) {
            $preview = ImageGallery::where('gallery_id', $gallery->id)->first();
            $galleryPreview[$gallery->id] = $preview->path;
        }
        return view('front.gallery.show', ['galleries' => $galleries, 'preview' => $galleryPreview]);
    }

    public function showGallery(int $id)
    {
        $images = ImageGallery::where('gallery_id', $id)->get();

        return view('front.gallery.showGallery', ['images' => $images]);
    }
}
