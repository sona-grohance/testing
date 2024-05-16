<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;

class Testimonialcontroller extends Controller
{
   public function viewTestimonialForm(){
    return view('testimonial.testimonial-form');
   }
   public function addTestimonial(Request $request){


    $validated = $request->validate([
        'client_name' => 'required|max:8',
        'image' => 'required|image|mimes:jpeg,png,jpg',
        'description' => 'required',
    ]);


    if ($request->hasFile('image')) {

        $testimonial=new Testimonial();
        $image = $request->file('image');
        $imageName = time() . '_testimonial' . $image->getClientOriginalName();
        $image->storeAs('images', $imageName); 
        $testimonial->client_name=$request->client_name;
        $testimonial->image=$imageName;
        $testimonial->description=$request->description;
        $testimonial->save();
        return redirect('/testimonials')->with('message','Testimonial Added');


     }

   }
   public function viewTestimonialTable(){

    $testimonials=Testimonial::all();
    return view('testimonial.testimonial-table',compact('testimonials'));

   }

   public function deleteTestimonial($id){
    $id=decrypt($id);
    $testimonial=Testimonial::find($id);
    $testimonial->delete();
    return redirect('/testimonials')->with('error','Testimonial Deleted');

   }

   public function updateTestimonial($id){

    $id=decrypt($id);
    $testimonial=Testimonial::find($id);
    return view('testimonial.testimonial-edit',compact('testimonial'));

}
public function editTestimonial(Request $request,$id){

    $validated = $request->validate([
        'client_name' => 'required|max:8',
        'image' => 'required|image|mimes:jpeg,png,jpg',
        'description' => 'required',
    ]);

    if ($request->hasFile('image')) {

        $id=decrypt($id);
        $testimonial=Testimonial::find($id);

        $image = $request->file('image');
        $imageName = time() . '_testimonial' . $image->getClientOriginalName();
        $image->storeAs('images', $imageName); 
        $testimonial->client_name=$request->client_name;
        $testimonial->image=$imageName;
        $testimonial->description=$request->description;
        $testimonial->save();
        return redirect('/testimonials')->with('message','Testimonial Updated');

     }

}
}
