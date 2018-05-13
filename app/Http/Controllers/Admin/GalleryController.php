<?php

namespace App\Http\Controllers\Admin;

use App\Entities\Gallery;
use App\Entities\ImageGallery;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public $uploadPath = 'upload/gallery';
    public function index()
    {
        $gallery = Gallery::orderBy('id', 'desc')->get();
        return view('admin.gallery.index', ['gallery' => $gallery]);
    }

    public function addGallery()
    {
        return view('admin.gallery.add');
    }

    public function addRequestGallery(Request $request)
    {
        try {
            $this->validate($request, [
                'title' => 'required|string|min:4|max:150'
            ]);
            $objGallery = new Gallery();
            $objGallery = $objGallery->create([
                'title' =>  $request->input('title')
            ]);

            if ($objGallery) {
                return redirect()->route('gallery.edit', $objGallery->id)->with('success', 'Запись успешно добавлена');
            }

            return back()->with('error', 'Не удалось добавить галерею');
        } catch (ValidationException $e) {
            \Log::error($e->getMessage());
            return back()->with('error', $e->getMessage());
        }
    }

    public function editGallery(int $id)
    {
        $gallery = Gallery::find($id);

        if(!$gallery) {
            return redirect()->route('news')->with('error', 'Страница не найдена');
        }

        $images = ImageGallery::where('gallery_id', $id)->get();

        return view('admin.gallery.edit', ['gallery' => $gallery, 'images' => $images]);
    }

    public function editRequestGallery(Request $request, int $id)
    {
        $this->validate($request, [

            'images' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'

        ]);

        $isVisible = boolval($request->has('is_visible'));
        if($request->hasfile('images'))
        {
            foreach($request->file('images') as $image)
            {
                $name=md5($image->getClientOriginalName()) . '.' . $image->getClientOriginalExtension();
                $path[] = $image->move($this->uploadPath . '/' . $id, $name);
            }
        }

        if (Gallery::where('id', $id)->update([
            'title' => $request->input('title'),
            'is_visible' => $isVisible
        ])) {
            foreach ($path as $file) {
                $imageGallery = new ImageGallery();
                $imageGallery->create([
                    'gallery_id' => $id,
                    'path' => $file->getPath() . '/' . $file->getFilename()
                ]);

            }
            return redirect()->route('gallery')->with('success', 'Запись обновлена');
        }

        return back()->with('error', 'Не удалось обновить запись');
    }
}
