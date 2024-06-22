<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use App\Models\Job;
use Illuminate\Http\Request;
use App\Http\Requests\StoreJobRequest;
use App\Http\Requests\UpdateJobRequest;
use App\Models\Tag;
use Illuminate\Support\Arr;
use Illuminate\Validation\Rule;
use Auth;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('jobs.index', [
            'jobs' => Job::latest()
                            ->with(['employer', 'tags'])
                            ->where(['featured' => false])
                            ->paginate(12),

            'featured' => Job::latest()
                            ->with(['employer', 'tags'])
                            ->where(['featured' => true])
                            ->get(),
                                        
            'tags' => Tag::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = request()->validate([
            'title' => 'required',
            'salary' => 'required|integer',
            'location' => 'required',
            'schedule' => ['required', Rule::in(['Part time', 'Full time'])],
            'url' => ['required', 'active_url'],
            'tags' => 'nullable',
        ]);

        $validated['featured'] = request()->has('featured');

        $job = Auth::user()->employer->jobs()->create(Arr::except($validated, 'tags'));

        $tags = request()->tags ?
            array_unique(array_filter(explode(',', request()->tags), fn ($value) => !empty(trim($value)))) : false;

        $job->tag($tags);

        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $job)
    {
        if (!session()->has('referral_url')) {
            session()->put('referral_url', url()->previous());
        }

        return view('jobs.edit', [
            'job' => $job,
            'tags' => count($job->tags) ? implode(', ', $job->tags->pluck('name')->toArray()) : ''
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Job $job)
    {
        $validated = request()->validate([
            'title' => 'required',
            'salary' => 'required|integer',
            'location' => 'required',
            'schedule' => ['required', Rule::in(['Part time', 'Full time'])],
            'url' => ['required', 'active_url'],
            'tags' => 'nullable',
        ]);

        $validated['featured'] = request()->has('featured');

        $job->update(Arr::except($validated, 'tags'));
        $job->detachTags();

        $tags = request()->tags ?
            array_unique(array_filter(explode(',', request()->tags), fn ($value) => !empty(trim($value)))) : false;

        $job->tag($tags);

        $referralUrl = session()->get('referral_url');
        session()->forget('referral_url');

        return redirect($referralUrl)->with('success', 'Update successful!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job)
    {
        $job->delete();

        return back();
    }
}
