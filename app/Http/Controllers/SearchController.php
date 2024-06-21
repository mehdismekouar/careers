<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __invoke(Request $request) {
        // dd(request()->all());
        $validated = request()->validate([
            'search' => 'required|min:3'
        ]);

        $jobs = Job::where('title', 'LIKE', '%'. $request['search'] .'%')->with('employer')->with('tags')->paginate(12);

        return view('results', ['jobs' => $jobs]);
    }
}
