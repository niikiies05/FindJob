<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\City;
use App\Models\Credit;
use App\Models\Job;
use App\Models\Jobtype;
use App\Models\Like;
use App\Models\Role;
use App\Models\Salarytype;
use App\Models\User;
use App\Notifications\AcceptJob;
use App\Notifications\AddJob;
use App\Notifications\AddUser;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class JobController extends Controller
{
    use RegistersUsers;

    public function boostAds(Request $request, $id)
    {
        // dd($day = $request->day1);

        $day = $request->day;

        $price = $request->price;
        // dd($day);
        // dd($price);

        $solde= Auth::user()->credit->solde;

        $job = Job::find($id);

        $expiration = $job->premium_delay;
        if ($job->premium) {
            return back()->with('warning', "Cette offre est déja premium et s'expire le " . $expiration);
        }
        // dd($status);
        if ($solde < $price) {
            return back()->with('danger', 'Votre credit est insuffisant pour cette offre');
        }
        $cost= $solde - $price;
        // dd($cost);
        $credit = Auth::user()->credit->update([
            'solde' => $cost
        ]);
        // dd($credit);

        $job = Job::find($id);

        if ($day) {
            $date = Carbon::now()->addDays($day);
        }

        $souscrit = $job->update([
            'premium' => 1,
            'premium_delay' => $date
        ]);
        // $expiration = $souscrit["premium_delay"];
        return redirect()->route('my-ads')->with('success', "Souscription réussie !, votre offre expire le ". $date);
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = Category::all();
        $jobTypes = Jobtype::orderby('name', 'ASC')->get();
        $salaryTypes = Salarytype::all();
        $cities = City::all();

        // $likeCount = Like::where('user_id', Auth::user()->id)->count();

        // $jobs = Job::where('status', 1)->paginate(2);
        // $jobs = Job::where('status', 1)->latest()->get();

        // return view('jobs.index', compact('jobs', 'categories', 'jobTypes', 'salaryTypes', 'cities'));    


        if (isset($request->brand) && $request->ajax()) {
            $brand = $request->brand;
            // dd($brand);
            $jobs = Job::whereIn('jobtype_id', explode(",", $brand))
                ->where('status', 1)
                ->get();

            response()->json($jobs);
            return view('jobs.searchAjaxCheckResult', compact('jobs', 'categories', 'jobTypes', 'salaryTypes', 'cities'));
        } elseif (isset($request->salary) && $request->ajax()) {

            $pay = $request->salary;
            $lui = json_decode($pay);
            $jobs = Job::where('status', 1)
                ->where('salary', '>=', $lui)->get();

            response()->json($jobs);
            // dd($jobs);
            return view('jobs.searchAjaxCheckResult', compact('jobs', 'categories', 'jobTypes', 'salaryTypes', 'cities'));
        } elseif (isset($request->all_salary)) {

            $date = Carbon::now()->subDay();
            $jobs = Job::where('created_at', '<=', $date)
                ->where('status', 1)
                ->get();

            response()->json($jobs);
            return view('jobs.searchAjaxCheckResult', compact('jobs', 'categories', 'jobTypes', 'salaryTypes', 'cities'));
        } elseif (isset($request->days) && $request->ajax()) {

            $days = $request->days;
            // dd($days);
            $date = Carbon::now()->subDays($days);
            $jobs = Job::where('created_at', '>=', $date)
                ->where('status', 1)->latest()
                ->paginate(5);

            response()->json($jobs);
            return view('jobs.searchAjaxCheckResult', compact('jobs', 'categories', 'jobTypes', 'salaryTypes', 'cities'));
        } elseif (isset($request->title) && $request->ajax()) {
            $query = $request->title;
            $jobs = Job::where('title', 'like', "%$query%")
                ->where('status', 1)
                ->get();
            response()->json($jobs);

            return view('jobs.searchAjaxCheckResult', compact('jobs', 'categories', 'jobTypes', 'salaryTypes', 'cities'));
        } elseif (isset($request->category) && isset($request->location) && isset($request->text) && $request->ajax()) {
            $cat = $request->category;
            $loc = $request->location;
            $q = $request->text;

            // dd($loc);   
            $jobs = Job::where('category_id', $cat)
                ->where('city_id', $loc)
                ->where('status', 1)
                ->Where('title', 'like', "%$q%")
                ->orWhere('description', 'like', "%$q%")
                ->get();
            // dd($jobs);
            return view('jobs.searchAjaxCheckResult', compact('jobs', 'categories', 'jobTypes', 'salaryTypes', 'cities'));
        } elseif (isset($request->category) && $request->ajax()) {
            $cato = $request->category;
            $jobs = Job::where('category_id', $cato)
                ->where('status', 1)
                ->latest()->get();
            // dd($jobs);
            return view('jobs.searchAjaxCheckResult', compact('jobs', 'categories', 'jobTypes', 'salaryTypes', 'cities'));
        } elseif (isset($request->location) && $request->ajax()) {
            $location = $request->location;
            $jobs = Job::where('city_id', $location)
                ->where('status', 1)
                ->latest()->get();
            // dd($jobs);
            return view('jobs.searchAjaxCheckResult', compact('jobs', 'categories', 'jobTypes', 'salaryTypes', 'cities'));
        }elseif (isset($request->minSalary) && isset($request->maxSalary) && $request->ajax()) {
            $min= $request->minSalary;
            $max =$request->maxSalary;
            $min = json_decode($min);
            $max = json_decode($max);

            // dd($min);
            $jobs= Job::whereBetween('salary', [$min, $max])
            ->where('status', 1)
            ->get();
            return view('jobs.searchAjaxCheckResult', compact('jobs', 'categories', 'jobTypes', 'salaryTypes', 'cities'));
        }elseif (isset($request->filterCity) && $request->ajax()) {
            $city= $request->filterCity;
            $city = json_decode($city);

            $jobs= Job::where('city_id', $city)
            ->where('status', 1)
            ->get();
            return view('jobs.searchAjaxCheckResult', compact('jobs', 'categories', 'jobTypes', 'salaryTypes', 'cities'));

        }

        $premiums= Job::where('premium', 1)
        ->where('status', 1)
        ->inRandomOrder()->limit(3)->get();
        // dd($premiums);

        // $categoryrang= 
        $jobs = Job::where('status', 1)
            ->latest()->paginate(5);
        return view('jobs.index', compact('jobs', 'categories', 'jobTypes', 'salaryTypes', 'cities', 'premiums'));
    }

    function fetch_data(Request $request)
    {
        $categories = Category::all();
        $jobTypes = Jobtype::orderby('name', 'ASC')->get();
        $salaryTypes = Salarytype::all();
        $cities = City::all();

        if ($request->ajax()) {
            if (request()->ajax()) {
                $jobs = Job::where('status', 1)
                    ->paginate(5);
                return view('jobs.searchAjaxCheckResult', compact('jobs', 'categories', 'jobTypes', 'salaryTypes', 'cities'))->render();
            }
        }
    }

    public function findByCategory($id)
    {
        $categories = Category::all();
        $jobTypes = Jobtype::all();
        $salaryTypes = Salarytype::all();
        $cities = City::all();

        $jobs = Job::where('category_id', $id)->get();

        return view('jobs.index', compact('jobs', 'categories', 'jobTypes', 'salaryTypes', 'cities'));
    }
    

    public function like(): JsonResponse
    {
        $job = Job::find(request()->id);

        if ($job->isLikedByLoggedInUser()) {

            $res = Like::where([
                'user_id' => auth()->user()->id,
                'job_id' => request()->id
            ])->delete();

            if ($res) {
                return response()->json([
                    'count' => Job::find(request()->id)->likes->count(),
                    'like' => "j'aime"
                ]);
            }
        } else {
            $like = new Like();

            $like->user_id = auth()->user()->id;
            $like->job_id = request()->id;

            $like->save();

            return response()->json([
                'count' => Job::find(request()->id)->likes->count(),
                'like' => "j'aime plus"
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::where('name', 'Recruiter')->get();

        $categories = Category::where('status', 1)->get();
        $jobTypes = Jobtype::where('status', 1)->get();
        $salaryTypes = Salarytype::where('status', 1)->get();
        $cities = City::where('status', 1)->get();
        return view('jobs.create', compact('categories', 'jobTypes', 'salaryTypes', 'cities', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //  dd($request->mobile);

        $request->validate([
            'jobTitle' => 'required|max:60',
            'category' => 'required',
            'description' => 'required|min:10|max:5000',
            'location' => 'required',
            'job_type' => 'required',
            'salary' => 'nullable|integer',
            'salary_type' => 'nullable',
            'image' => 'sometimes|image|max:2000'
        ]);
        // dd($request->all());

        if (!Auth::check()) {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'password_confirmation' => 'required',
                'role' => ['required',],
                'mobile' => ['required', 'min:8'],
                'about_yourself' => ['nullable', 'string',],
            ]);

            $users = User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
                'mobile' => $request['mobile'],
                'about_yourself' => $request['about_yourself'],
                // 'status' =>0,
            ]);
            // $users->notify(new AddUser($users)); 

            $users->assignRole($request['role']);

            $this->guard()->login($users);
        }

        if ($request->image) {

            $imgpath = $request->image->store('profile', 'public');

            $users = Job::create(array_merge(
                [
                    'title' => $request->jobTitle,
                    'category_id' => $request->category,
                    'description' => $request->description,
                    'city_id' => $request->location,
                    'jobtype_id' => $request->job_type,
                    'salary' => $request->salary,
                    'salarytype_id' => $request->salary_type,
                    'status' => 0,
                    'user_id' => Auth::user()->id,
                ],
                ['image' => $imgpath]
            ));

            $users->notify(new AddJob($users));

            return redirect()->route('jobs.index')
                ->with('success', 'Ads created successfully.');
        } else {
            $users = Job::create([
                'title' => $request->jobTitle,
                'category_id' => $request->category,
                'description' => $request->description,
                'city_id' => $request->location,
                'jobtype_id' => $request->job_type,
                'salary' => $request->salary,
                'salarytype_id' => $request->salary_type,
                'status' => 0,
                'user_id' => Auth::user()->id,
            ]);
            $users->notify(new AddJob($users));

            // dd($users);
            return redirect()->route('jobs.index')
                ->with('success', 'Votre annonce est maintenant en attente de validation.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $job = Job::find($id);
        // dd($job);
        return view('jobs.job-details', compact('job'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function edit(Job $job)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());

        $request->validate([
            'jobTitle' => 'required|max:60',
            'category' => 'required',
            'description' => 'required|min:10|max:5000',
            'location' => 'required',
            'job_type' => 'required',
            'salary' => 'nullable|integer',
            'salary_type' => 'nullable',
            'image' => 'sometimes|image|max:2000'
        ]);
        // dd($request->all());

        if ($request->image) {

            $imgpath = $request->image->store('profile', 'public');
            $job = Job::find($id);

            $jobs = $job->update(array_merge(
                [
                    'title' => $request->jobTitle,
                    'category_id' => $request->category,
                    'description' => $request->description,
                    'city_id' => $request->location,
                    'jobtype_id' => $request->job_type,
                    'salary' => $request->salary,
                    'salarytype_id' => $request->salary_type,
                    'status' => 1,
                    'user_id' => Auth::user()->id,
                ],
                ['image' => $imgpath]
            ));
            // dd($jobs);
            // session()->flash('notification.message', 'Ads updated successfully');
            // session()->flash('notification.type', 'danger');
            return redirect()->route('my-ads')
                ->with('success', 'Ads updated successfully.');
        } else {
            $job = Job::find($id);
            // dd($job);

            $jobs = $job->update([
                'title' => $request->jobTitle,
                'category_id' => $request->category,
                'description' => $request->description,
                'city_id' => $request->location,
                'jobtype_id' => $request->job_type,
                'salary' => $request->salary,
                'salarytype_id' => $request->salary_type,
                'status' => 1,
                'user_id' => Auth::user()->id,
            ]);
            // dd($users);
            return redirect()->route('my-ads')
                ->with('success', 'Ads updated successfully.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $job = Job::find($id);
        $job->delete();

        return back()->with('success', 'Deleted successfully');
    }

    public function updateJobStatus(Request $request)
    {
        $job = Job::find($request->id);
        $job->status = $request->status;
        $job->save();

        $job->notify(new AcceptJob($job));
    }
}
