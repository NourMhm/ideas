<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;
use App\Http\Requests\CreateIdeaRequest;
use App\Http\Requests\UpdateIdeaRequest;

class IdeaController extends Controller
{
    public function show(Idea $idea){
        return view('ideas.show',compact('idea'));
    }

    public function edit(Idea $idea){

        $this->authorize('update',$idea);

        $editing = true;

        return view('ideas.show',compact('idea','editing'));

    }

    public function update(UpdateIdeaRequest $request , Idea $idea){

        // if(auth()->id() !== $idea->user_id){
        //     abort(404);
        // }
        $this->authorize('update',$idea);

        $validated = $request->validated();
        // $validated = request()->validate([
        //     'content' => 'required|min:5|max:255'
        // ]);
        $idea->update($validated);

        // $idea->content = request()->get('content','');
        // $idea->save();

        return redirect()->route('ideas.show',$idea->id)->with('success','Idea updated successfuly');

    }

    public function store(CreateIdeaRequest $request){

        $validated  = $request->validated();
        // $validated = request()->validate([
        //     'content' => 'required|min:5|max:255|'
        // ]);

        $validated['user_id'] = auth()->id();

        Idea::create($validated);

        return redirect()->route('dashboard')->with('success','Idea created successfuly');


        // request()->validate([
        //     'content' => 'required|min:5|max:255|'
        // ]);

        // $idea = Idea::create([
        //     'content'=>request()->get('content',''),
        // ]);
        // return redirect()->route('dashboard')->with('success','Idea created successfuly');

    }
public function destroy(Idea $idea){
    // $idea = Idea::where('id', $id)->firstOrFail()  ;

    // if(auth()->id() !== $idea->user_id){
    //     abort(404);
    // }
    $this->authorize('delete',$idea);

    $idea->delete();

    return redirect()->route('dashboard')->with('success','Idea deleted successfully');
}
}
