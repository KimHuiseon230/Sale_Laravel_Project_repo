<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Jangbu;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
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

        $data['text1'] = $text1;
        $data['text2'] = $text2;
        $list = $this->getlist($text1, $text2);
        // $data['list_product'] = $this->getlist_product();

        $str_label = '';
        $str_data = '';
        foreach ($list as $row) {
            $str_label  .= "'" . $row->gubuns_name . "',";
            $str_data .= $row->cnumo . ',';
        }
        $data["str_label"] = $str_label; // '음료','맥주','과일' ..
        $data["str_data"] = $str_data;   //62, 25, 6..
        return view('chart.index', $data);
    }

    public function getlist($text1, $text2)
    {

        $result = Jangbu::leftjoin('products', 'jangbus.products_id', '=', 'products.id')
            ->leftjoin('gubuns', 'products.gubuns_id', '=', 'gubuns.id')
            ->select('gubuns.name as gubuns_name', DB::raw('count(jangbus.numo) as cnumo'))
            ->wherebetween('jangbus.writeday', array($text1, $text2))
            ->where('jangbus.io', '=', 1)
            ->orderby('cnumo', 'desc')
            ->groupby('gubuns.name')
            ->limit(14)
            ->paginate(5)->appends(['text1' => $text1, 'text2' => $text2]);

        return $result;
    }

    public function getlist_product()
    {
        $result = Product::orderby('name')->get();
        return $result;
    }
}
