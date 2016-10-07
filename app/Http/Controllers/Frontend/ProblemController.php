<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\CreateRequest;
use App\Http\Requests\Customer\EditRequest;
use App\Http\Requests\Customer\UpdateRequest;
use App\Models\EconomicActivity;
use App\Models\ProblemForm;
use App\Models\Status;
use App\Models\TableType;
use App\Models\UserForm;
use App\Notifications\RegisterSuccess;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\User;

//use Illuminate\Support\Facades\Mail;

class ProblemController extends Controller
{
    public function __construct()
    {
        $this->middleware('checkOwner:problem',['except'=>['index','create','store']]);
    }

    public function index()
    {
        $problems = UserForm::withAll()->where([
            'status_id'    => Status::PUBLISHED,
            'form_type_id' => TableType::Problem
        ])->orderBy('id', 'desc')->take(10)->get();

        return view('frontend.problem.index')->with([
            'problems' => $problems,
        ]);
    }

    public function create()
    {
        $economicActivities = EconomicActivity::with('childrens')->where(['parent_id' => null])->get();

        return view('frontend.problem.create', compact('economicActivities'));
    }

    public function store(CreateRequest $request)
    {
        $model = new UserForm();
        $model->fill($request->all());
        $model->form_type_id = TableType::Problem;
        $email               = $request->get('email');
        $pass                = str_random(10);

        if (isset($email) && ! empty($email)) {
            $user           = User::firstOrNew([
                'email' => $email,
            ]);
            $user->password = bcrypt($pass);
            $user->save();

            $user->notify(new RegisterSuccess($pass));
        }
        $model->author_id = Auth::check() ? Auth::user()->id : $user->id;

        if ($request->hasFile('logo_img_file')) {
            $filename = uniqid('problem', true) . '.' . $request->file('logo_img_file')->getClientOriginalExtension();
            $request->file('logo_img_file')->storeAs('documents', $filename);
            $model->logo = $filename;
        }

        $model->save();

        if ( ! Auth::check()) {
            Auth::attempt(['email' => $email, 'password' => $pass]);
        }

        return redirect(route('personal_area.index'));
    }

    public function edit(UserForm $problem)
    {
        $economicActivities = EconomicActivity::with('childrens')->where(['parent_id' => null])->get();
        return view('frontend.problem.edit', compact('problem', 'economicActivities'));
    }

    public function update(UpdateRequest $request, UserForm $problem)
    {
        $problem->fill($request->all());
        $problem->status_id = Status::EDITED;
         if ($request->hasFile('logo_img_file')) {
            $filename = uniqid('problem', true) . '.' . $request->file('logo_img_file')->getClientOriginalExtension();
            $request->file('logo_img_file')->storeAs('documents', $filename);
            Storage::disk('documents')->delete($problem->logo);
            $problem->logo = $filename;
        }
        $problem->save();

        return back()->with(['message' => 'Відредаговано']);
    }

    public function show(UserForm $problem)
    {
        return view('frontend.problem.show', compact('problem'));
    }

    public function delete(UserForm $problem)
    {
        $problem->delete();
        return redirect(route('problem.index'));
    }

}
