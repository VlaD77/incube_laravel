<?php

namespace App\Http\Controllers\Frontend;

//use App\Http\Requests\PersonalArea\CreateRequest;
use App\Http\Requests\PersonalArea\EditRequest;
use App\Http\Requests\PersonalArea\UpdateRequest;

use Illuminate\Http\Request;
use App\Models\ProblemForm;
use App\Models\InvestorForm;
use App\Models\ProjectForm;
use App\Models\ExecutorForm;
use App\Models\WorkForm;
use App\Models\Country;
use App\Models\EconomicActivities;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PersonalAreaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        
        $thisUser = Auth::user();
        $usersCustomerProjects = ProblemForm::orderBy('id', 'desc')->where('author_id',$thisUser->id)->get();
        $usersInvestorProjects = InvestorForm::orderBy('id', 'desc')->where('author_id',$thisUser->id)->get();
        $usersDesignerProjects = ProjectForm::orderBy('id', 'desc')->where('author_id',$thisUser->id)->get();
        $usersExecutorProjects = ExecutorForm::orderBy('id', 'desc')->where('author_id',$thisUser->id)->get();
        $usersEmployerProjects = WorkForm::orderBy('id', 'desc')->where('author_id',$thisUser->id)->get();
        return view('frontend.personal_area.index')->with([
        'thisUser'              => $thisUser,
        'usersCustomerProjects' => $usersCustomerProjects, 
        'usersInvestorProjects' => $usersInvestorProjects,
        'usersDesignerProjects' => $usersDesignerProjects,
        'usersExecutorProjects' => $usersExecutorProjects,
        'usersEmployerProjects' => $usersEmployerProjects,
            
        ]);
    }
    
     public function edit()
    {
         $myUser=Auth::user();
         
        $country = Country::orderBy('id', 'desc')->get();

        return view('frontend.personal_area.edit', compact('myUser', 'country'));
    }

    public function update(Request $request)
    {
       
        $myUser=Auth::user();

        $myUser->fill($request->all());
       
        $myUser->save();

        return back()->with(['message' => 'Редагування завершено']);
    }
     public function security(){
         
      return view('frontend.personal_area.security');
     }
}
