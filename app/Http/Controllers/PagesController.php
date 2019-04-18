<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;

class PagesController extends Controller
{



   public function page(Request $request, Page $page)
   {
      // $page = Page::whereSlug($slug)
       //            ->first();
      
       return view('Pages.Static', compact('page'));
   }

}
