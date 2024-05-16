<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\Property;
use App\Models\PropertyImage;

class PropertyController extends Controller
{
    public function viewPropertyTable(){
        $properties=Property::all();
        $locations=Location::pluck('location', 'id')->toArray();

        return response()->json(['properties' => $properties,'locations' => $locations],200);
    }

    public function detailsProperty($id){

        $id=decrypt($id);
        $property=Property::find($id);
        $propertyImages=PropertyImage::where('property_id',$id)->get();
        $locations=Location::pluck('location', 'id')->toArray();
        return response()->json(['id' =>$id,'property' =>$property,'propertyImages' =>$propertyImages],200);

    }

}
