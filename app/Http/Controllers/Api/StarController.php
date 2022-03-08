<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StarRequest;
use App\Http\Resources\StarResource;
use App\Models\Star;
use Illuminate\Http\Request;

class StarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return StarResource::collection(Star::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StarRequest $request)
    {
        $star = Star::create($request->validated());

        $newStar = new StarResource($star);

        $starName = time().'_'.$request->getClientOriginalName();
        $filePath = $request->file('image')->storeAs('uploads', $starName, 'public');
        $newStar->image = "/storage/" . $filePath;
        return $newStar;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Star  $star
     * @return \Illuminate\Http\Response
     */
    public function show(Star $star)
    {
        return new StarResource($star);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Star  $star
     * @return \Illuminate\Http\Response
     */
    public function update(StarRequest $request, Star $star)
    {
        $star->update($request->validated());

        return new StarResource($star);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Star  $star
     * @return \Illuminate\Http\Response
     */
    public function destroy(Star $star)
    {
        $star->delete();

        return response()->noContent();
    }
}
