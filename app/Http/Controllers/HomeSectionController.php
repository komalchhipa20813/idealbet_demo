<?php

namespace App\Http\Controllers;

use App\Models\HomeSection;
use Illuminate\Http\Request;

class HomeSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['sections']=HomeSection::first();
        return view('sections', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
           

            HomeSection::updateOrCreate(
                [
                    'id' => decryptid($request->section_id),
                ],
                [
                    'section1' => $request->section1_html,
                    'section2' => $request->section2_html,
                    'section3' => $request->section3_html,
                    'section4' => $request->section4_html,
                    'section5' => $request->section5_html,
                   
                ]
            );
            $response = [
                'data'=> $request->all(),
				'status' => true,
				'message' => 'Sections Data Add Successfully',
				'icon' => 'success',
				'redirect_url' => "home-sections",
			];
        }catch (\Throwable $e) {
            $response = [
                'status' => false,
                'message' =>'Something Went Wrong! Please Try Again.',
                'icon' => 'error',
                'redirect_url' => "home-sections",
            ];
        }
        return response($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HomeSection  $homeSection
     * @return \Illuminate\Http\Response
     */
    public function show(HomeSection $homeSection)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HomeSection  $homeSection
     * @return \Illuminate\Http\Response
     */
    public function edit(HomeSection $homeSection)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HomeSection  $homeSection
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HomeSection $homeSection)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HomeSection  $homeSection
     * @return \Illuminate\Http\Response
     */
    public function destroy(HomeSection $homeSection)
    {
        //
    }
}
