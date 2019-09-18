<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Billet; 

class BilletController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $billets = Billet::orderBy('id', 'desc')->paginate(3);
        $posts = Billet::withCount('comments')->get();
        return view('billet.show', compact('billets', 'posts')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('billet.create'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=> 'required|max:255',
            'content' => 'required|string', 
            'tags' => 'required|string',
        ]); 

        Billet::create([
            'title' => request('title'),
            'content' => request('content'),
            'user_id' => auth()->id(), 
            'tags'=> request('tags')
        ]);

        return redirect('/billet')->with('success',  'Billet is successfully saved'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $billet = Billet::findOrFail($id); 
        return view('billet.showUnit', compact('billet')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $billet = Billet::findOrFail($id); 
        return view('billet.edit', compact('billet')); 
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
        $validate = $request->validate([
            'title'=> 'required|max:255',
            'content' => 'required|string', 
            'tags' => 'required|string',
        ]);

        Billet::whereId($id)->update([
            'title' => request('title'),
            'content' => request('content'),
            'user_id' => auth()->id(), 
            'tags'=> request('tags')
        ]);

        return redirect('billet')->with('success', 'Ads is successfully updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $billet = Billet::findOrFail($id);
        $billet->delete();
        return redirect('/billet')->with('success', 'billet is successfully deleted');
    }
}
