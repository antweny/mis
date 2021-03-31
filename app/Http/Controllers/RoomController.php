<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoomRequest;
use App\Repository\Interfaces\RoomRepositoryInterface;
use Exception;

class RoomController extends AuthController
{

    /**
     * @var
     */
    protected $roomService;

    /**
     * RoomController constructor.
     */
    public function __construct(RoomRepositoryInterface $roomService)
    {
        parent::__construct();
        $this->roomService = $roomService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->canView($this->roomService->model());

        try {
            $rooms = $this->roomService->get();  //Get all rooms
            return view('room.index',compact('rooms'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoomRequest $request)
    {
        $this->canCreate($this->roomService->model());

        try {
            $this->roomService->create($request->validated());
            return $this->success('Room created');
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
        $this->canUpdate($this->roomService->model());

        try {
            $room = $this->roomService->find($id);
            return view('room.edit',compact('room'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoomRequest $request, $id)
    {
        $this->canUpdate($this->roomService->model());

        try {
            $this->roomService->update($id,$request->validated());
            return $this->successRoute('rooms.index','Room updated');
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
        $this->canDelete($this->roomService->model());

        try {
            $this->roomService->delete($id);
            return $this->success('Room deleted');
        }
        catch (\Exception $e) {
            return $this->error();
        }
    }


}
