<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class liveSearchContoller extends Controller
{
    public function liveStudentSearch(Request $request)
    { 

        $search_text = $request->search_text;
        $results = DB::table('students')
                  ->where('name', 'LIKE', $search_text . '%')
                  ->orWhere('roll','LIKE',$search_text . '%')
                  ->get();
        return response()->json([                      
                    'results' => $results
                  ]);
    }
}
