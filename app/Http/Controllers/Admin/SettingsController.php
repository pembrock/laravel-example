<?php

namespace App\Http\Controllers\Admin;

use App\Entities\Setting;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index(string $name)
    {
        $page = Setting::where('name', $name)->first();
        return view('admin.settings.index', ['data' => $page]);
    }

    public function editSettings(Request $request, string $name)
    {
        if (Setting::where('name', $name)->update([
            'text' => $request->input('text')
        ])) {
            return redirect()->route('settings.page', ['name' => $name])->with('success', 'Запись обновлена');
        }

        return back()->with('error', 'Не удалось обновить запись');
    }
}
