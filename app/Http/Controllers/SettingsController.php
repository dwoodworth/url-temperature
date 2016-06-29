<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\Http\Requests;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the settings dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Pass the user's perfered zip if it exists in the DB
        $user = Auth::user();
        $zip = null;
        if ($user->zip) {
	        $zip = $user->zip;
        }
        return view('settings')->with('zip', $zip);
    }
    
    /**
	 * Save a new setting for the user.
	 *
	 * @param  Request  $request
	 * @return Response
	 */
	public function store(Request $request)
	{
	    $this->validate($request, [
	        'zip' => 'integer|numeric',
	    ]);
	    
	    DB::table('users')
	    	->where('id', Auth::user()->id)
	    	->update(['zip' => $request->zip]);
	
	    return redirect('/');
		}
}
