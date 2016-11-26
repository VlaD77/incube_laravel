<?php

namespace App\Http\Controllers\Frontend;

use App\Notifications\RegisterSuccess;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Status;
use App\Models\TableType;
use App\Models\UserForm;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\Article;
use App\Models\Category;

class SiteController extends Controller {

    public function index() {
        $allMaterials = UserForm::withAll()->where([
                    'status_id' => Status::PUBLISHED,
                ])->orderBy('id', 'desc')->take(10)->get();
        $articles = Article::where([
                    'status_id' => Status::PUBLISHED,
                    
                ])->orderBy('id', 'desc')->get();
        $categories = Category::orderBy('id', 'desc')->get();
        return view('frontend.site.index')->with([
                    'allMaterials' => $allMaterials,
                    'articles' => $articles,
        ]);
    }

    public function contacts() {
        return view('frontend.site.contacts');
    }

    public function about() {
        return view('frontend.site.about');
    }

    public function ourrules() {
        return view('frontend.site.rules');
    }

}
