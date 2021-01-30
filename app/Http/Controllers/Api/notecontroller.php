<?php

namespace App\Http\Controllers;
use App\Models\notes;
use App\Models\presents;
use Illuminate\Http\Request;

class notecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
    {
        $notes = notes::orderby('id', 'desc') -> paginate(3);

        return view('notes.index', compact('notes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('notes.create');
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
            'description' => 'required|unique:notes|max:255',
        ]);

        $note = new notes;

        $note->description = $request->description;
        $note->save();

        return redirect('/notes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $note = notes::where('id', $id)->first();
        return view('notes.show', ['note' => $note]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $note = notes::where('id', $id)->first();
        return view('notes.edit', ['note' => $note]);
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
       notes::find($id)->update([
            'description' => $request->description,
        ]);

        return redirect('/notes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        notes::find($id)->delete();
        return redirect('/notes');
    }

    public function addmember($id)
    {
        $present = presents::where('notes_id', '=', 0)->get();
        $present = presents::where('id', $id)->first();
        return view('notes.addmember', ['note' => $note, 'present' => $present]);
    }

    public function updateaddmember(Request $request, $id)
    {
        $present = presents::where('id', $request->present_id)->first();
        presents::find($present->id)->update([
            'notes_id' => $id
        ]);

        return redirect('/notes/addmember/'. $id);
    }

    public function deleteaddmember(Request $request, $id)
    {

        presents::find($id)->update([
            'notes_id' => 0
        ]);

        return redirect('/notes');
    }

}