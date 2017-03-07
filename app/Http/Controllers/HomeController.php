<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Announcement;
use DB;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userAnnouncement = DB::table('announcements')
            ->select(
            'users.*',
                DB::raw('hris_users.name as "announcername"'),
            'announcements.*',
                DB::raw('hris_announcements.message as "announcermessage"'),
                DB::raw('hris_announcements.created_at as "dateAnnounced"'))
            ->leftJoin('users', function($join) {
                $join->on('users.id', '=', 'announcements.user_id');
            })->latest('announcements.created_at')->first();

        return view('home', compact('userAnnouncement'));
    }
}
