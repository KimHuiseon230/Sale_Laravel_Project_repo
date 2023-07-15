<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Gubun;
use App\Models\Jangbu;
use Illuminate\Support\Facades\DB;

class JangbuiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['tmp'] = $this->qstring();
        $text1 = request('text1'); //text1의 값을 알아냄
        if (!$text1) $text1 = date('Y-m-d');
        $data['text1'] = $text1;
        $data['list'] = $this->getlist($text1);
        return view('jangbui.index', $data);
    }

    public function getlist($text1)
    {
        $result = Jangbu::leftjoin('products', 'jangbus.products_id', '=', 'products.id')
            ->select('jangbus.*', 'products.name as product_name')
            ->where('jangbus.io', '=', 0)
            ->where('jangbus.writeday', '=', $text1)
            ->orderby('jangbus.id', 'desc')
            ->paginate(5)->appends(['text1' => $text1]);
        return $result;
    }

    public function getlist_product()
    {
        $result = Product::orderby('name')->get();
        return $result;
    }
    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        $data['list'] = $this->getlist_product();
        $data['tmp'] = $this->qstring();
        return view('jangbui.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $row = new Jangbu;
        $this->save_row($request, $row);

        $tmp = $this->qstring();
        return redirect('jangbui' . $tmp);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data['row'] = Jangbu::leftjoin('products', 'jangbus.products_id', '=', 'products.id')
            ->select('jangbus.*', 'products.name as product_name')
            ->where('jangbus.id', '=', $id)->first();

        return view('jangbui.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['list'] = $this->getlist_product();
        $data['tmp'] = $this->qstring();
        $data['row'] = Jangbu::find($id); //자료 찾기
        return view('jangbui.edit', $data); //수정화면 호출
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $row = Jangbu::find($id); //자료찾기
        $this->save_row($request, $row);

        $tmp = $this->qstring();
        return redirect('jangbui' . $tmp);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Jangbu::find($id)->delete();
        $tmp = $this->qstring();
        return redirect('jangbui' . $tmp);
    }
    public function
    save_row(Request $request, $row)
    {
        $request->validate(
            [
                'writeday' => 'required|date',
                'products_id' => 'required',
            ],
            [
                'writeday.required'     => '날짜는 필수 입력입니다.',
                'products_id.required'  => '제픔명은 필수 입력입니다.',
                'writeday.date'         => '날짜형식이 올바르지 않습니다.',
            ]
        );
        $row->io            = 0;
        $row->writeday      = $request->input('writeday');
        $row->products_id   = $request->input('products_id');
        $row->price         = $request->input('price');
        $row->numi          = $request->input('numi');
        $row->numo          = 0;
        $row->prices        = $request->input('prices');
        $row->bigo          = $request->input('bigo');

        $row->save(); // 수정모드 
        return redirect('product');
    }

    public function qstring()
    {
        $text1 = request('text1') ? request('text1') : "";
        $page = request('page') ? request('page') : "1";
        $tmp = $text1 ? "?text1 =$text1&page=$page" : "?page= $page";
        return  $tmp;
    }
}
