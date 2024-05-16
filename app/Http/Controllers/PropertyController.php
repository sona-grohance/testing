<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\Property;
use App\Models\PropertyImage;

class PropertyController extends Controller
{
    public function viewPropertyTable(){
        $properties=Property::all();
        $locations=Location::pluck('location', 'id')->toArray();

        return view('property.property-table',compact('properties','locations'));
    }
    public function viewPropertyForm(){
        $locations=Location::all();
        return view('property.property-form',compact('locations'));
    }
    public function addProperty(Request $request){

        $property=new Property();
        $property->name=$request->property_name;
        $property->category=$request->category;
        $property->location_id=$request->location;
        $property->short_description=$request->short_description;
        $property->description=$request->description;
        $property->save();


        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $filename = time() . 'property_' . $image->getClientOriginalName();
                $image->storeAs('images', $filename);
                
                $property->images()->create([
                    'image' => $filename,
                ]);
            }
        }

        return redirect('/properties')->with('message','Property Added SuccessFully');
    }
    public function deleteProperty($id){

        $id=decrypt($id);
        $properyImages=PropertyImage::where('property_id',$id)->get();
        foreach($properyImages as $properyImage){
        $properyImage->delete();
        }
        $property=Property::find($id);
        $property->delete();
        return redirect('/properties')->with('error','Property Deleted');

    }
    public function updateProperty($id){

        $id=decrypt($id);
        $locations=Location::all();
        $property=Property::find($id);
        return view('property.property-edit',compact('locations','property'));

    }
    public function editProperty(Request $request,$id){

        $id=decrypt($id);
        $property=Property::find($id);
        $property->name=$request->property_name;
        $property->category=$request->category;
        $property->location_id=$request->location;
        $property->short_description=$request->short_description;
        $property->description=$request->description;
        $property->save();

        return redirect('/properties')->with('message','Property Detils Updated');

    }
    public function viewPropertyImages($id){

        $id=decrypt($id);
        $propertyImages=PropertyImage::where('property_id',$id)->get();
        return view('property.property-images',compact('propertyImages','id'));
    }
    public function deletePropertyImage($id){
        
        $id=decrypt($id);
        $propertyImage=PropertyImage::find($id);
        $propertyImage->delete();
        return redirect('/properties')->with('error','Image Deleted');

    }
    public function updatePropertyImage($id){

     $id=decrypt($id);
     $propertyImage=PropertyImage::find($id);
     return view('property.property-edit-image',compact('propertyImage'));

    }
    public function editPropertyImage(Request $request,$id){       

        $id=decrypt($id);
        $propertyImage=PropertyImage::find($id);

       if ($request->hasFile('image')) {
                $image= $request->file('image');
                $filename = time() . 'property_' . $image->getClientOriginalName();
                $image->storeAs('images', $filename);
                $propertyImage->image=$filename;
                $propertyImage->save();                
        }
        return redirect('/properties')->with('message','Image Updated');

    }
    public function detailsProperty($id){

        $id=decrypt($id);
        $property=Property::find($id);
        $propertyImages=PropertyImage::where('property_id',$id)->get();
        $locations=Location::pluck('location', 'id')->toArray();
        return view('property.property-details',compact('property','propertyImages','locations'));

    }
    public function propertyImageForm(){
        return view('property.property-add-image');
    }
    public function addPropertyImage(Request $request,$id){

       $propertyId=decrypt($id);
       $propertyImage=new PropertyImage();
       if ($request->hasFile('image')) {
                       
                $image= $request->file('image');
                $filename = time() . 'property_' . $image->getClientOriginalName();
                $image->storeAs('images', $filename);
                $propertyImage->image=$filename;
                $propertyImage->property_id=$propertyId;
                    $propertyImage->save();                

        }
        return redirect('/properties')->with('message','New Image Added');

    }
}
