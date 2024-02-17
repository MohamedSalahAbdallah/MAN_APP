<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller
{
    //Event index
    public function index()
    {
        $Event=Event::all();
        return response()->json($Event);
    }

    //Event show
    public function show($id)
    {
        $Event = Event::findOrFail($id);
        return response()->json($Event);
    }

    //Event update
    public function update(Request $request, $id){
        $validator=Validator::make($request->all(),[
            'title'=>'required',
            'description'=>'required',
            'location'=>'required',
            'time'=>'required',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category'=>'required|string',
            'status'=>'required',
            'date'=>'required|date',
            'ticket_price'=>'required|numeric',
            'free_guests'=>'required|numeric',
            'paid_guests'=>'required|numeric',
        ]);

        if($validator->fails()){
            return response()->json([
                'validation_errors' => $validator->messages(),
            ]);
        }else {

            $Event=Event::findOrFail($id);
            $Event->update($request->all());
            return response()->json($Event);
        }
    }

    //Event delete
    public function destroy($id){
        $Event=Event::findOrFail($id);
        $Event->delete();
        return response()->json(['message'=>'Event Deleted Successfully']);
    }

    //Event store
    public function store(Request $request){

        $validator=Validator::make($request->all(),[
            'name'=>'required',
            'description'=>'required',
            'location'=>'required',
            'time'=>'required',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category'=>'required|string',
            'status'=>'required',
            'date'=>'required|date',
            'ticket_price'=>'required|numeric',
            'free_guests'=>'required|numeric',
            'paid_guests'=>'required|numeric',

        ]);

        if($validator->fails()){
            return response()->json([
                'validation_errors' => $validator->messages(),
            ]);
        }else {
            $Event=Event::create($request->all());
            return response()->json($Event);
        }
    }
}
