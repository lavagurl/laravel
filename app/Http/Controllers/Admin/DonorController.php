<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Donor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DonorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $donors = Donor::all();
        return view('admin.donors.index')->with('donors', $donors);
    }

    public function showForm()
    {
        $eyes_color = ["Bleus", "Marrons", "Verts", "Gris"];
        $blood_type = ["A+", "A-", "B+", "B-", "AB+", "AB-", "O+", "O-"];
        $categories = ["Ovule", "Sperme"];
        return view('admin.donors.create')->with([
            "eyes_color"=>$eyes_color,
            "blood_type"=>$blood_type,
            "categories"=>$categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $donor = new Donor();
        $donor->fill($request->input());
        $donor->save();
        return back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Donor  $Donor
     * @return \Illuminate\Http\Response
     */
    public function show(Donor $donor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Donor  $Donor
     * @return \Illuminate\Http\Response
     */
    public function edit(Donor $donor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Donor  $Donor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Donor $donor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Donor  $Donor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Donor $donor)
    {
        DB::table('donors')->delete($donor->id);
        return back();
    }
}
