<?php

namespace App\Http\Controllers;

use App\Http\Requests\StroreSkillsRequest;
use App\Http\Resources\SkillsResource;
use App\Models\User;
use App\Models\Skills;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SkillsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response(
        [
            'result' => SkillsResource::collection(Skills::all()),
            'message' => 'Successful'
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StroreSkillsRequest $request)
    {
        $request->merge(array('created_by' => Auth::user()->id));
        if ( Auth::user()->type === User::TYPE_ADMIN || Auth::user()->type === User::TYPE_HR) {
            $request->merge(array('approved' => true));
        }

        $skill = Skills::create($request->all());

        return response(
        [
            'result' => new SkillsResource($skill), 
            'message' => 'Successful'
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Skills $skill)
    {
        return response(
        [
            'result' => new SkillsResource($skill), 
            'message' => 'Successful'
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Skills $skills)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Skills $skills)
    {
        //
    }

    public function approve(Request $request, Skills $skill)
    {
        if ( Auth::user()->type === User::TYPE_ADMIN || Auth::user()->type === User::TYPE_HR) {
            if ($skill->approved) {
                $skill->approved = false;
            }else{
                $skill->approved = true;
            }
            
            $skill->updated_by = auth()->user()->id;
            $skill->update();

            return response(
            [
                'result' => new SkillsResource($skill), 
                'message' => 'Skill has been updated! '
            ], 200);
        }

        return response(['result' => [], 'message' => "You are not authorized to perform this request."], 403);

    }
}
