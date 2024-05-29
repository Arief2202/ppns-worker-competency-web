<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWorkerCompetencyRequest;
use App\Http\Requests\UpdateWorkerCompetencyRequest;
use App\Models\WorkerCompetency;
use Illuminate\Support\Facades\Auth; 
use App\Models\User;
use Illuminate\Http\Request;

class WorkerCompetencyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreWorkerCompetencyRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(WorkerCompetency $workerCompetency)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WorkerCompetency $workerCompetency)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWorkerCompetencyRequest $request, WorkerCompetency $workerCompetency)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WorkerCompetency $workerCompetency)
    {
        //
    }
}
