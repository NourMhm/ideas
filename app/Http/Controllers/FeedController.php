<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Idea;
use App\Models\User;

class FeedController extends Controller
{
    /**user
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $user = auth()->user();

        $followingIDs = $user->followings()->pluck('user_id');

        $ideas = Idea::whereIn('user_id', $followingIDs)->latest();

        if(request()->has('search')){
            $ideas = $ideas->where('content','like','%' . request()->get('search','').'%');
        }

        return view('dashboard',[
            'ideas' => $ideas->paginate(5)

        ]);
    }
}
