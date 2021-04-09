<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventRequest;
use App\Repository\Interfaces\EventRepositoryInterface;
use Exception;

class EventController extends AuthController
{
    protected $event;

    public function __construct(EventRepositoryInterface $eventService)
    {
        parent::__construct();
        $this->event = $eventService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $events = $this->event->eventWithParticipants();  //Get all eventCategories
            return view('event.index', compact('events'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            $event = $this->event->model();  //Get all eventCategories
            return view('event.create',compact('event'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EventRequest $request)
    {
        try {
            $this->event->create($request->except('_token'));
            return $this->success('Event created');
        }
        catch (Exception $e) {
            return $this->errorWithInput($request);
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        try {
            $event = $this->event->find($id);
            return view('event.edit',compact('event'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EventRequest $request, $id)
    {
        try {
            $this->event->updating($id, $request->except('_token'));
            return $this->successRoute('events.index','Event updated');
        }
        catch (Exception $e) {
            return $this->errorWithInput($request);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $this->event->delete($id);
            return $this->success('Event deleted');
        }
        catch (\Exception $e) {
            return $this->error();
        }
    }
}
