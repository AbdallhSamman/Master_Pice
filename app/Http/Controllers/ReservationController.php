<?php


namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Trip;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller


{
    public function show()
    {
        $reservations = DB::table('trip_user')
            ->join('trips', 'trips.id', '=', 'trip_id')
            ->join('users', 'users.id', '=', 'user_id')
            ->where('guide_id', '=', Auth::user()->id)

            ->get(['*', 'trips.name As tirp_name', 'trip_user.id As reservation_id']);

        // select * from trip_user INNER join trips on (trip_id = trips.id) INNER JOIN users on (trips.guide_id = users.id) where (trips.guide_id = 4);

        return view('publicsite.reservations', compact('reservations'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return  view("admin.reservation", compact('users'));
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

    public function getGuide($id)
    {
        //

        $reservations = DB::table('trip_user')
            ->join('trips', 'trips.id', '=', 'trip_id')
            ->join('users', 'users.id', '=', 'user_id')
            ->where('guide_id', '=', $id)
            ->orderBy('trip_user.id', "asc")
            ->paginate(10, ['*', 'trips.name As tirp_name', 'trip_user.id As reservation_id']);

        $guide = User::find($id);
        $guide_course = $guide->trip;
        return  view("publicSite.reservations", [
            'reservations' => $reservations,
            'guide_course'  => $guide_course,
        ]);
    }
    public function tripFilter(Request $request, $id)
    {

        if ($request->trip == "All trips") {
            return redirect()->route("guideReservations", Auth::id());
        } else {
            $reservations =   DB::table('trip_user')
                ->join('trips', 'trips.id', '=', 'trip_id')
                ->join('users', 'users.id', '=', 'user_id')
                ->where('trips.name', '=', $request->trip)
                ->orderBy('trip_user.id', "asc")
                ->paginate(10, ['*', 'trips.name As tirp_name', 'trip_user.id As reservation_id']);
            $guide = User::find($id);
            $guide_course = $guide->trip;
        }
        return  view("publicSite.reservations", compact('reservations', 'guide_course'));
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
        $trip = Trip::find($request->trip_id);
        $trip->user()->attach([ //
            [
                'trip_id' => $request->trip_id,
                'user_id' => Auth::id(),
                'booking_date' => now(),
                'status' => 'Hold'
            ]
        ]);
        return redirect()->route("userprofile.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
