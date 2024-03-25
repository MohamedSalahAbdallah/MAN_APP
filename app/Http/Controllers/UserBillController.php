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
            'bill_status' => 'required|string',
            'number_of_tickets' => 'required|numeric',
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
            'bill_amount' => 'required|numeric',
            'event_id' => 'required|numeric|exists:events,id',
            'number_of_tickets' => 'required|numeric',
        ]);

        if($validator->fails()){
            return response()->json([
                'validation_errors' => $validator->messages(),
            ],400);
        }else {

            $userBill=UserBill::create([
                'user_id' => $request->user()->id,
                'bill_amount' => $request->bill_amount,
                'number_of_tickets' => $request->number_of_tickets,
                'event_id' => $request->event_id,
            ]);

            return response()->json($userBill);
        }
    }

    public function getTravelUsers() {
        return UserBill::with(['event', 'user'])->whereHas('event', function ($query) {
            $query->where('category', 'travel');
        })->get();
    }

    public function getGradUsers() {
        return UserBill::with(['user', 'event'])->whereHas('event', function ($query) {
            $query->where('category', 'grad');
        })->get();
    }


}
