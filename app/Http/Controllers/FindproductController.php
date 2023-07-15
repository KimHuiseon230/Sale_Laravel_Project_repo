<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Gubun;
use Illuminate\Support\Facades\DB;

class FindproductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $text1 = request('text1'); //text1의 값을 알아냄
        $data['text1'] = $text1;
        $data['list'] = $this->getlist($text1);
        return view('findproduct.index', $data);
    }

    public function getlist($text1)
    {
        $result = Product::leftjoin('gubuns', 'products.gubuns_id', '=', 'gubuns.id')
            ->select('products.*', 'gubuns.name as gubun_name')
            ->where('products.name', 'like', '%' . $text1 . '%')
            ->orderby('products.name', 'asc')
            ->paginate(5)->appends(['text1' => $text1]);
        return $result;
    }

}
