<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller
{

    //function to handle images for events
    public function storeImage(Request $request){
        if($request->hasFile('image')){
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $imageName = time().'.'.$request->image->getClientOriginalName();
            $request->image->move(public_path('images'), $imageName);
            return $imageName;
        }
    }

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
            // 'name'=>'required',
            // 'description'=>'required',
            'location'=>'required',
            // 'time'=>'required',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category'=>'required|string',
            // 'status'=>'required',
            // 'date'=>'required|date',
            'ticket_price'=>'required|numeric',
            // 'free_guests'=>'required|numeric',
            // 'paid_guests'=>'required|numeric',
            'etis__cash' => 'required|numeric',
            'vod__cash' => 'required|numeric',
        ]);

        if($validator->fails()){
            return response()->json([
                'validation_errors' => $validator->messages(),
            ]);
        }else {

            $Event=Event::findOrFail($id);
            $imageName = $this->storeImage($request);
            $Event->update([
                // 'name' => $request->name,
                // 'description' => $request->description,
                'location' => $request->location,
                // 'time' => $request->time,
                'image' => $imageName,
                'category' => $request->category,
                // 'status' => $request->status,
                // 'date' => $request->date,
                'ticket_price' => $request->ticket_price,
                // 'free_guests' => $request->free_guests,
                // 'paid_guests' => $request->paid_guests,
                'etis__cash' => $request->etis__cash,
                'vod__cash' => $request->vod__cash,
            ]);
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
            // 'name'=>'required',
            // 'description'=>'required',
            'location'=>'required',
            // 'time'=>'required',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category'=>'required|string',
            // 'status'=>'required',
            // 'date'=>'required|date',
            'ticket_price'=>'required|numeric',
            // 'free_guests'=>'required|numeric',
            // 'paid_guests'=>'required|numeric',
            'extra_price'=>'numeric',
            'etis__cash' => 'required|numeric',
            'vod__cash' => 'required|numeric',

        ]);

        if($validator->fails()){
            return response()->json([
                'validation_errors' => $validator->messages(),
            ]);
        }else {

            $imageName = $this->storeImage($request);


                $Event=Event::create([
                    // 'name' => $request->name,
                    // 'description' => $request->description,
                    'location' => $request->location,
                    // 'time' => $request->time,
                    'image' => $imageName,
                    'category' => $request->category,
                    // 'status' => $request->status,
                    // 'date' => $request->date,
                    'ticket_price' => $request->ticket_price,
                    // 'free_guests' => $request->free_guests,
                    // 'paid_guests' => $request->paid_guests,
                    'extra_price' => $request->extra_price,
                    'etis__cash' => $request->etis__cash,
                    'vod__cash' => $request->vod__cash,
                ]);


            return response()->json([$Event,$request->image]);
        }
    }

    // get event by category
    public function getTravel(Request $request){
        $Event = Event::where('category', 'travel')->get();
        return response()->json($Event);

    }
    public function getGrad(Request $request){
        $Event = Event::where('category', 'grad')->get();
        return response()->json($Event);

    }
}
