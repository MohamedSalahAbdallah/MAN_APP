<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserBill;
use Illuminate\Support\Facades\Validator;

class UserBillController extends Controller
{
    //UserBill index
    public function index()
    {
        $userBill=UserBill::all();
        return response()->json($userBill);
    }

    //UserBill show
    public function show($id)
    {
        $userBill = UserBill::findOrFail($id);
        return response()->json($userBill);
    }

    //UserBill update
    public function update(Request $request, $id){
        $validator=Validator::make($request->all(),[
            'user_id' => 'required',
            'bill_amount' => 'required|numeric',
            'bill_date' => 'required|date',
            'bill_description' => 'required|string',
            'bill_status' => 'required|string',
        ]);

        if($validator->fails()){
            return response()->json([
                'validation_errors' => $validator->messages(),
            ]);
        }else {

            $userBill=UserBill::findOrFail($id);
            $userBill->update($request->all());
            return response()->json($userBill);
        }
    }

    //UserBill delete
    public function destroy($id){
        $userBill=UserBill::findOrFail($id);
        $userBill->delete();
        return response()->json(['message'=>'Bill Deleted Successfully']);
    }

    //UserBill store
    public function store(Request $request){

        $validator=Validator::make($request->all(),[
            'user_id' => 'required',
            'bill_amount' => 'required|numeric',
            'bill_date' => 'required|date',
            'bill_description' => 'required|string',
            'bill_status' => 'required|string',
        ]);

        if($validator->fails()){
            return response()->json([
                'validation_errors' => $validator->messages(),
            ]);
        }else {
            $userBill=UserBill::create($request->all());
            return response()->json($userBill);
        }


    }
}
