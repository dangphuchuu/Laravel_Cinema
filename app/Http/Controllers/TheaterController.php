<?php

namespace App\Http\Controllers;

use App\Models\MovieGenres;
use App\Models\RoomType;
use App\Models\SeatType;
use App\Models\Theater;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TheaterController extends Controller
{
    public function __construct()
    {
    }

    public function theater()
    {
        $theaters = Theater::all();
        $seatTypes = SeatType::all();
        $roomTypes = RoomType::all();
        return view('admin.theater.list', [
            'theaters' => $theaters,
            'seatTypes' => $seatTypes,
            'roomTypes' => $roomTypes
        ]);
    }

    public function postCreate(Request $request)
    {
        $theater = new Theater([
            'name' => $request->name,
            'address' => $request->address,
            'city' => $request->city,
            'location' => $request->location,
            'created_at' => Carbon::today(),
            'updated_at' => null,
        ]);

        $theater->save();
        return redirect('/admin/theater')->with('success', 'Add Theater Successfully!');
    }

    public function status(Request $request)
    {
        $theaters = Theater::find($request->theater_id);
        $theaters['status'] = $request->active;
        $theaters->save();
        return response('success',200);
    }
    public function delete($id){
        $theaters = Theater::find($id);
        $check = count($theaters->rooms);
        if($theaters['status'] ==0 ){
            if($check ==0){
                Theater::destroy($id);
                return response()->json(['success' => 'Delete Successfully']);
            }
            else{
                return response()->json(['error' => "Can't delete because Theater exist Room" ]);
            }
        }
        else{
            return response()->json(['error' => "Please change status to offline" ]);
        }

    }
}
