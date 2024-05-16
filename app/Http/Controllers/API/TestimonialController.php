<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonial;



class TestimonialController extends Controller
{

       public function viewTestimonialTable(){
    
        $testimonials=Testimonial::all();
        
        return response()->json(['testimonials' => $testimonials],200);
    
       }
    
}
