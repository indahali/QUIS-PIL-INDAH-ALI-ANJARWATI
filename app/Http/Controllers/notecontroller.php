<?php

namespace App\Http\Controllers;
use App\models\notes;

use Illuminate\Http\Request;

class notecontroller extends controller
{
    
public function index()
{
    $notes = notes::OrderBy('id', 'desc')->paginate(3);

    return view('notes.index', compact('notes'));
}


public function create()
{
    return view('notes.create');
}
public function store(Request $request )
{
    // validate the request...
    $request->validate([
        'keterangan' => 'required|unique:notes|max:255',
       

    ]);

    $notes = new notes;

    $notes->keterangan = $request->keterangan; 


    $notes->save();

        return redirect('/notes');
    }

    public function show($id)
    {
        $note = notes::where('id', $id)->first();
        return view('notes.show', ['note' => $note]);
    }

    public function edit($id)
    {
        $note = notes::where('id', $id)->first();
        return view('notes.edit', ['note' => $note]);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'keterangan' => 'required|unique:notes|max:255',

        ]);

        notes::find($id)-> update([
            'keterangan' => $request->keterangan,
     
        ]);

        return redirect('/notes');
    }
    public function destroy($id)
    {
        notes::find($id)->delete();
        return redirect('/notes');
    }
}