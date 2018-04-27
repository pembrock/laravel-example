<?php

namespace App\Http\Controllers\Admin;

use App\Entities\Shop;
use App\Http\Requests\ShopRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ShopController extends Controller
{
    public $uploadPath = 'upload/shop';
    public function index()
    {
        $shop = Shop::orderBy('id', 'desc')->get();

        return view('admin.shop.index', ['shop' => $shop]);
    }

    public function addRequestShop(ShopRequest $request)
    {
        $objShop = new Shop();
        if(!is_null($request->file('image'))) {
            $file = $request->file('image');
            $path = $file->move($this->uploadPath, $file->getClientOriginalName());
        }
        $path = isset($path) ? $path->getPathname() : NULL;
        $objShop = $objShop->create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'img' => $path
        ]);

        if ($objShop) {
            return redirect()->route('shop.edit', $objShop->id)->with('success', 'Запись успешно добавлена');
        }

        return back()->with('error', 'Запись не добавлена');
    }

    public function addShop()
    {

        return view('admin.shop.add');
    }

    public function editShop(int $id)
    {
        $shop = Shop::find($id);

        if(!$shop) {
            return redirect()->route('shop')->with('error', 'Страница не найдена');
        }
        Storage::delete($shop->img_path);
        return view('admin.shop.edit', ['shop' => $shop]);
    }

    public function editRequestShop(ShopRequest $request, int $id)
    {
        $isAvailability = boolval($request->has('is_availability'));
        $isVisibility = boolval($request->has('is_visibility'));
        $shop = Shop::find($id);
        if (!is_null($request->file('image'))) {
            if (!is_null($shop->img)) {
                Shop::deleteImage($shop->img);
            }

            $file = $request->file('image');
            $path = $file->move($this->uploadPath,$file->getClientOriginalName());

        }
        $path = isset($path) && !empty($path) ? $path->getPathname() : $shop->img;
        if (Shop::where('id', $id)->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'is_availability' => $isAvailability,
            'is_visibility' => $isVisibility,
            'img' => $path
        ])) {
            return redirect()->route('shop')->with('success', 'Запись обновлена');
        }

        return back()->with('error', 'Не удалось обновить запись');
    }

    public function deleteShop (Request $request)
    {
        if ($request->ajax()) {
            $id = (int) $request->input('id');
            $objShop = Shop::find($id);
            if (!is_null($objShop->img)) {
                Shop::deleteImage($objShop->img);
            }

            Shop::where('id',$id)->delete();
        }
    }

    public function deleteShopImage (Request $request)
    {
        if ($request->ajax()) {
            $id = (int) $request->input('id');
            $objShop = Shop::find($id);
            Shop::deleteImage($objShop->img);
            $objShop->img = NULL;
            $objShop->save();
        }
    }
}
