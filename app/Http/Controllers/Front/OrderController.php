<?php

namespace App\Http\Controllers\Front;

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
            'cc-name'   =>  'Имя',
            'cc-phone'  =>  'Номер телефона',
            'cc-email'  =>  'Электронная почта',
            'delivery'  =>  [
                '1' => 'Самавывоз в офисе',
                '2' => 'Курьером в пределах Москвы',
                '3' => 'Транспортной компанией за пределы Москвы'
            ],
            'total-price' => 'Итоговая стоимость'
        ];

        foreach ($request->all() as $key => $value) {
            if (array_key_exists($key, $fields)) {
                if ($key == 'delivery') {
                    $content .= "<tr><td>Доставка</td><td>{$fields[$key][$value]}</td></tr>";
                } else {
                    $content .= "<tr><td>{$fields[$key]}</td><td>{$value}</td></tr>";
                }
            }
        }
        $body = str_replace('{$content}', $content, $body);

        if (!empty($body)) {
            Mail::to('shitanger@mail.ru')->send(new OrderMail($body));
            #Mail::to('evd79@bk.ru')->send(new OrderMail());
            return view('front.order.success');
        }
    }
}
