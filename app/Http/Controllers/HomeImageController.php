<?php

namespace App\Http\Controllers;

use App\Models\HomeImage;
use Illuminate\Http\Request;
use Carbon\Carbon;

class HomeImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images=HomeImage::get(['image','id']);
    
        
        return view('home', compact('images'));
    }

      //Listing Data Of City
  public function listing(){
    $data['images']= HomeImage::where('status',1)->get();
    $result = [];
    foreach ($data['images'] as $key=>$image) {
        $button = '';
        
            $button .= '<button class="remove_image btn btn-sm btn-danger m-1" data-id="'.encryptid($image['id']).'">
            <i class="mdi mdi-delete"></i>
            </button>';
    
        $result[] = array(
        "0"=>$key+1,
        "1"=>'<img src="'.asset('images/homeBanner/'.$image->image).'"  class="img-rounded previewImage" width="304" height="236" >',
        "2"=>Carbon::parse($image->created_at)->format('d-m-Y'),
        "3"=>$button,
        );
    }
    return response()->json(['data'=>$result]);
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
            $request->validate(
                [
                    'image' => 'required',
                   
                ]
            );

            if(isset($request->image))
            {
                $file=$request->image ; 
                $data = getimagesize($file);
                $width = $data[0];
                $height = $data[1];
                if($width > 1361)
                {
                    $name = time().rand(1,50).'.'.$file->extension();
                    $file->move(public_path('images/homeBanner/'), $name); 
 
                    HomeImage::insert(
                        [
                             'image' => $name,
                             'created_at' =>  Carbon::now()->format('Y-m-d H:i:s')
                        ] );

                        $response = [
                            'data'=> $width ,
                            'status' => true,
                            'message' => 'Home Banner Images Add Successfully',
                            'icon' => 'success',
                            'redirect_url' => "home",
                        ];
                }
                else
                {
                    $response = [
                        'status' => false,
                        'message' =>'Image width must be greater than 1361px',
                        'icon' => 'error',
                        'redirect_url' => "home",
                    ];

                }    
               
            }

            
        }catch (\Throwable $e) {
            $response = [
                'status' => false,
                'message' =>'Something Went Wrong! Please Try Again.',
                'icon' => 'error',
                'redirect_url' => "home",
            ];
        }
        return response($response);
    }

    public function deleteImage(Request $request)
    {
         

         try {
            $update['status'] = 2;
            HomeImage::where('id',decryptid($request->id))->update($update);;
            $response = [
                'status' => true,
                'message' => "Image Deleted Successfully",
                'icon' => 'success',
            ];
        }catch (\Throwable $e) {
            $response = [
                'status' => false,
                'message' => "Something Went Wrong! Please Try Again.",
                'icon' => 'error',
            ];
        }

         return response($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HomeImage  $homeImage
     * @return \Illuminate\Http\Response
     */
    public function show(HomeImage $homeImage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HomeImage  $homeImage
     * @return \Illuminate\Http\Response
     */
    public function edit(HomeImage $homeImage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HomeImage  $homeImage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HomeImage $homeImage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HomeImage  $homeImage
     * @return \Illuminate\Http\Response
     */
    public function destroy(HomeImage $homeImage)
    {
        //
    }
}
