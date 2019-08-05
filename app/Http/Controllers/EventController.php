<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Http\Requests\EventRequest;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{

    public function __construct()
    {
        return $this->middleware("Connection");
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $events = Auth::user()->events()->orderBy('created_at', 'desc')->paginate(5);

        return view("pages.events.index", compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view("pages.events.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventRequest $request)
    {

        $event = new Event;
        $event->user_id = Auth::user()->id;
        $event->titre = $request->titre;
        $event->description = $request->description;

        $event->save();
        flash("vote event créer avec succeee", "success", "Successfly ");

        return redirect()->route("event.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $event = Event::find($id);
        $this->authorize("update", $event);


        return view("pages.events.edit", compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EventRequest $request, $id)
    {

        $event = Event::find($id);

        $event->titre = $request->titre;
        $event->description = $request->description;

        $event->save();
        flash("vote event editer avec succeee", "info", "Félicitation ");

        return redirect()->route("event.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $event = Event::find($id);
        $this->authorize("delete", $event);
        flash("vote event supprimer avec succeee", "danger", "Ok ");

        $event->delete();
        return redirect()->route("event.index");
    }
}