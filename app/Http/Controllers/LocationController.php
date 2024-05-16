<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;

class LocationController extends Controller
{
    public function viewLocationTable(){
        $locations=Location::all();
        return view('location.location-table',compact('locations'));
    }
    public function viewLocationForm(){
        return view('location.location-form');
    }
    public function addLocation(Request $request){

        $validated = $request->validate([
            'location' => 'required',
        ]);

        $location=new Location();
        $location->location=$request->location;
        $location->save();
        return redirect('/locations')->with('message','Location Added Successfully');
    }
    public function deleteLocation($id){
        
        $id=decrypt($id);

        $location=Location::find($id);
        $location->delete();
        return redirect('/locations')->with('error','Location Deleted');

    }
    public function updateLocation($id){

        $id=decrypt($id);

        $location=Location::find($id);
        return view('location.location-edit',compact('location'));

    }
    
    public function editLocation(Request $request,$id){

        $validated = $request->validate([
            'location' => 'required',
        ]);

        $id=decrypt($id);
        $location=Location::find($id);
        $location->location=$request->location;
        $location->save();
        return redirect('/locations')->with('message','Location Updated Successfully');
     }
}
