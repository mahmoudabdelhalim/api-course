<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Course;
use App\Models\Round;
use App\Models\Applicant;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
class AdminHomeController extends Controller
{
    
    
    
    
    public function __construct()
    {
        
        $this->middleware('auth');
    }
    
    public function home(){
      
      
 return view('layouts.main');
        
    }
}
