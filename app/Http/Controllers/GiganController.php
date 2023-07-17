<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Jangbu;
use Illuminate\Support\Facades\DB;

class GiganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $text1 = $request->input('text1'); //text1의 값을 알아냄
        if (!$text1) $text1 = date('Y-m-d', strtotime("-1 month")); // 오늘 기준 1달전

        $text2 = request('text2');
        if (!$text2) $text2 = date('Y-m-d'); // 오늘 날짜

        $text3 = request('text3');
        if (!$text3) $text3 = date('Y-m-d'); // 전체 날짜

        $data['text1'] = $text1;
        $data['text2'] = $text2;
        $data['text3'] = $text3;
        $data['list'] = $this->getlist($text1, $text2, $text3);
        $data['list_product'] = $this->getlist_product();
        return view('gigan.index', $data);
    }

    public function getlist($text1, $text2, $text3)
    {
        if ($text3 == 0) {
            $result = Jangbu::leftjoin('products', 'jangbus.products_id', '=', 'products.id')
                ->select('jangbus.*', 'products.name as product_name')
                ->wherebetween('jangbus.writeday', array($text1, $text2))
                ->orderby('jangbus.id', 'desc')
                ->paginate(5)->appends(['text1' => $text1, 'text2' => $text2, 'text3' => $text3]);
        } else
            $result = Jangbu::leftjoin('products', 'jangbus.products_id', '=', 'products.id')
                ->select('jangbus.*', 'products.name as product_name')
                ->wherebetween('jangbus.writeday', array($text1, $text2))
                ->where('jangbus.products_id',"=",$text3)
                ->orderby('jangbus.id', 'desc')
                ->paginate(5)->appends(['text1' => $text1, 'text2' => $text2, 'text3' => $text3]);
        return $result;
    }

    public function getlist_product()
    {
        $result = Product::orderby('name')->get();
        return $result;
    }
}
