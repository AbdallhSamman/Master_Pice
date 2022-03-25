<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Trip;

class TourController extends Controller
{
    //

    public function index()
    {
        $guides = User::where('role_type', 'guide')->get();
        return view("publicSite.tour_guide", compact('guides'));
    }

    public function getGuide($id)
    {
        $user = User::find($id);
        // $guide_trips = Trip::where('guide_id', $id)->get();
        $guide_trips = $user->trip; //sol:2
        return view('publicSite/guide_profile', compact('user', 'guide_trips'));
    }
}
