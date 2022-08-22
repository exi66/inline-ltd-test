<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as FRequest;
use DB;


class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $search = FRequest::query('search');
        if (strlen($search) > 2) {
            $search_data = DB::table('comments')
                ->where('comments.name', 'like', '%' . $search . '%')
                ->orWhere('comments.email', 'like', '%' . $search . '%')
                ->orWhere('comments.body', 'like', '%' . $search . '%')
                ->pluck('comments.id')
                ->toArray();
            $data = Comment::whereIn('id', $search_data)->get();
            return view('home', compact('data', 'search'));
        } else {
            return view('home');
        }		
    }

}
