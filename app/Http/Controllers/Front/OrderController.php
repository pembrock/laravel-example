<?php

namespace App\Http\Controllers\Front;

use App\Entities\Shop;
use App\Mail\OrderMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function index()
    {
        return view('front.order.index');
    }

    public function sendEMail(Request $request)
    {
        $body = '<table border="1">{$content}</table>';
        $content = '';
        $fields = [
            'cc-vysota' => 'Высота',
            'cc-shirina'=> 'Ширина',
            'cc-area'   => 'Площадь',
            'zolocheniye-doski' => 'Золочение доски',
            'chekanka-pozoloty' => 'Чеканка позолоты',
            'raskraska-chekannykh-poley'    => 'Раскраска чеканных полей',
            'razdelka-odezhd-zolotom'   =>  'Разделка одежд золотом',
            'dopolnitelnyy-obraz'   => 'Дополнительный образ',
            'ornamentalnyye-polya'  => 'Орнаментальные поля',
            'arka-tron' =>  'Арка, трон',
            'figures'   => 'Количество фигур в композиции',
            'background'    => 'Живописный фон (процент заполнения)',
            'margin'    => 'Предстоящие на полях',
            'cartouche' =>  'Картуш',
            'name'   =>  'Имя',
            'phone'  =>  'Номер телефона',
            'cc-email'  =>  'Электронная почта',
            'delivery'  =>  [
                '1' => 'Самовывоз в офисе',
                '2' => 'Курьером в пределах Москвы',
                '3' => 'Транспортной компанией за пределы Москвы'
            ],
            'total-price' => 'Итоговая стоимость'
        ];

        if ($request->ajax()) {
            $gid = $request->input('gid');
            $name = $request->input('name');
            $phone = $request->input('phone');
            $delivery = $request->input('delivery');
            $good = Shop::find($gid);
            $content .= "<tr><td>ID товара</td><td>{$good->id}</td></tr>";
            $content .= "<tr><td>Товар</td><td>{$good->title}</td></tr>";
            $content .= "<tr><td>Имя</td><td>{$name}</td></tr>";
            $content .= "<tr><td>Телефон</td><td>{$phone}</td></tr>";
            $content .= "<tr><td>Доставка</td><td>{$fields['delivery'][$delivery]}</td></tr>";
        } else {
            foreach ($request->all() as $key => $value) {
                if (array_key_exists($key, $fields)) {
                    if ($key == 'delivery') {
                        $content .= "<tr><td>Доставка</td><td>{$fields[$key][$value]}</td></tr>";
                    } else {
                        $content .= "<tr><td>{$fields[$key]}</td><td>{$value}</td></tr>";
                    }
                }
            }
        }
        $body = str_replace('{$content}', $content, $body);

        if (!empty($body)) {
            Mail::to('shitanger@mail.ru')->send(new OrderMail($body));
            //Mail::to('evd79@bk.ru')->send(new OrderMail($body));
            if (!$request->ajax()) {
                return view('front.order.success');
            }
        }
    }
}
