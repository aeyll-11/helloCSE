<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StarRequest;
use App\Http\Resources\StarResource;
use App\Models\Star;
use Illuminate\Support\Facades\Storage;
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
        $image = $request->file('image')->store('public');
        $url = Storage::url($image);
        $request->data = $request->all();
        $request->data['image'] = $url;
        $star = Star::create($request->data);
        return new StarResource($star);
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
