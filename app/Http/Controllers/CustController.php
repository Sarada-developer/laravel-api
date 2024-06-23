<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Cust;
use App\Http\Resource\Cust as CustResource;

class CustController extends Controller
{
 public function index(){
    $custs = Cust::all();
    return response()->json($custs);
 }


 public function store(Request $request)
{
    $input = $request->all();
    $validator = Validator::make($input,[
        'Custname'=> 'required',
        'Custaddress'=> 'required',
        'Custphone'=> 'required|unique:custs|min:10',
        'Custimage'=> 'required',
    ]);
    $cust = Cust::create($input);
    return response()->json($cust);

}
public function show($id)
{
    $cust = Cust::find($id);
    if(is_null($cust)) {
        return $this->sendError('Post does not exist.');
    }
    return response()->json($cust);
}


public function update(Request $request, Cust $cust)
{
    $input = $request->all();

    $validator = Validator::make($input, [
        'Custname'=> 'required',
        'Custaddress'=> 'required',
        'Custphone'=> 'required|unique:custs|min:10',
        'Custimage'=> 'required',
    ]);

    $cust->Custname = $input['Custname'];
    $cust->Custaddress = $input['Custaddress'];
    $cust->Custphone = $input['Custphone'];
    $cust->Custimage = $input['Custimage'];
    
    $cust->save();
    return response()->json($cust);
}

public function destroy(Request $request,$id)
{

    $cust = Cust::find($id);
    $cust->delete();
}
}
