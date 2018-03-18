<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prodcuts = \App\Models\Product::orderBy('created_at','desc')->get();

        return response()->json(['error' => false,'response'=>$prodcuts],200)
            ->setCallback(\Request::input('callback'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $prodcuts = \App\Models\Product::orderBy('created_at','desc')->get();
        $total_sum = $prodcuts->sum('total_value_number');
        if((\Input::get('action'))){
            \Session::flash('message', 'My message');
        }
        return view('products.create')
                                ->with('products',$prodcuts)
                                ->with('total_sum',$total_sum);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $error = false;
        $status_code = 200;
        $result =[];
        $input = $request->all();


        if(!empty($input)) {

            try{

                $input['total_value_number'] = ($input['quantity_in_stock']*$input['product_price']);
                $product = \App\Models\Product::create($input);
                if($product){
                    $result['message']='Product added successfully.';
                }
                else{
                    $result['error_message']='Product not added successfully.';
                }


            }catch(\Exception $ex){
                $error = true;
                $status_code = $ex->getCode();
                $result['error_code'] = $ex->getCode();
                $result['error_message'] = $ex->getMessage();
            }

        }else{
            $error =true;
            $status_code = 400;
            $result['message']='Request data is empty';
        }

        return response()->json(['error' => $error,'response'=>$result],$status_code)
            ->setCallback(\Request::input('callback'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
