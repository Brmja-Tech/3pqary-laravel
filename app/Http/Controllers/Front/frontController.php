<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\Blog;
use App\Models\ClaintRates;
use App\Models\ContactUs;
use App\Models\courses;
use App\Models\Gallery;
use App\Models\Grade;
use App\Models\Subject;
use App\Models\teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class frontController extends Controller
{

    public function home()
    {
        $grades = Grade::query()->get();
        $courses = courses::take(4)->get();
        $claint_rates = ClaintRates::take(4)->get();

        return view('front.index', compact('grades', 'courses', 'claint_rates'));
    }

    public function aboutUs()
    {
        $teachers = teacher::query()->skip(1)->take(2)->get();
        $first_teacher = teacher::take(1)->get();
        $gallary = Gallery::query()->get();
        $vedios = Gallery::take(1)->get();
        return view('front.about_us', compact('gallary', 'teachers', 'first_teacher'));
    }

    public function blogs()
    {
        $blogs = Blog::query()->take(4)->get();
        $gallary = Gallery::query()->take(12)->get();
        return view('front.blogs', compact('blogs', 'gallary'));
    }

    public function blog_details($id)
    {
        $blogs = Blog::query()->take(4)->get();
        $gallary = Gallery::query()->take(12)->get();
        $blog = Blog::findOrFail($id);
        return view('front.blog_details', compact('blog', 'blogs', 'gallary'));
    }

    public function gallary()
    {
        $videos = Gallery::take(1)->get();
        $gallary = Gallery::query()->get();
        return view('front.gallary', compact('gallary', 'videos'));
    }

    public function subjects()
    {
        $courses = courses::query()->paginate(10);
        return view('front.subjects', compact('courses'));
    }

    public function show($id)
    {
        $courses = courses::with('videos')->take(1)->findOrFail($id);
        return view('front.subject_details', compact('courses'));
    }

    public function contact()
    {
        return view('front.contact_us');
    }

    public function registration()
    {
        return view('front.registration');
    }

    public function register(RegisterRequest $request)
    {

        $user = User::create([
            'child_name' => $request->child_name,
            'birth_date' => $request->birth_date,
            'parent_name' => $request->parent_name,
            // 'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        auth()->login($user);

        return redirect()->route('home')->with('success', 'Registration successful!');
    }

    public function login()
    {
        return view('front.login');
    }
    public function userLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ]);
    
        Log::info('Login attempt:', [
            'email' => $request->email,
            'password' => $request->password,
        ]);
    
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->intended('home')->with('success', 'Login successful!');
        }
    
        return redirect()->back()->withErrors(['error' => 'Invalid credentials. Please try again.']);
    }
}
