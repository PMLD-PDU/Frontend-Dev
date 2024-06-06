<?php

namespace App\Http\Controllers;
use App\Charts\MonthlyUsersChart;
use App\Charts\chart1;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(MonthlyUsersChart $chart, chart1 $chart1)
    {
        // $chart = $chart->build();
        // $chart1 = $chart1->build();
        // return view('dashboard', compact('chart'));
        return view('dashboard', ['chart' => $chart->build(), 'chart1' => $chart1->build()]);
    } 

    // public function index1(chart1 $chart1)
    // {
    //     $chart1 = $chart1->build();
    //     return view('dashboard', compact('chart1'));
    // } 

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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
