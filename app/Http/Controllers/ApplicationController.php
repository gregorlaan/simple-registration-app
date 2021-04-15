<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\Sector;

class ApplicationController extends Controller
{
    /**
     * Constructor
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(auth()->user()->application) {
            return redirect(route('application.edit', auth()->user()->application->id));
        }

        $sectors = Sector::all();
        return view('application.create', compact('sectors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(auth()->user()->application) {
            return ;
        }

        $data = request()->validate([
            'name' => 'required',
            'sectors' => 'required',
            'agreement' => 'required',
        ]);

        $application = auth()->user()->application()->create($data);

        return redirect(route('application.show', $application->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function show(Application $application)
    {
        $this->authorize('view', $application);

        $sectors = Sector::find($application->sectors);
        return view('application.show', compact('application', 'sectors'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function edit(Application $application)
    {
        $this->authorize('update', $application);

        $sectors = Sector::all();
        return view('application.edit', compact('application', 'sectors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Application  $applications
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Application $application)
    {
        $this->authorize('update', $application);

        $data = request()->validate([
            'name' => 'required',
            'sectors' => 'required',
            'agreement' => 'required',
        ]);

        $application->update($data);

        return redirect(route('application.show', $application->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Application  $applications
     * @return \Illuminate\Http\Response
     */
    public function destroy(Application $applications)
    {
        //
    }
}
