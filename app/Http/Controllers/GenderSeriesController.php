<?php

namespace App\Http\Controllers;

use App\Http\Requests\GenderSeriesRequest;
use App\Repository\Interfaces\GenderSeriesRepositoryInterface;
use App\Services\GenderSeriesService;
use Illuminate\Http\Request;
use Exception;

class GenderSeriesController extends AuthController
{
    private $gender;

    public function __construct(GenderSeriesRepositoryInterface $gender)
    {
        parent::__construct();
        $this->gender = $gender;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->canView($this->gender->model());

        try {
            $genders = $this->gender->get();  //Get all holidays
            return view('event.gender-series.index',compact('genders'));
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
        $this->canCreate($this->gender->model());
        try {
            $genderSeries = $this->gender->model();  //Get all holidays
            return view('event.gender-series.create',compact('genderSeries'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GenderSeriesRequest $request)
    {
        $this->canCreate($this->gender->model());
        try {
            $this->gender->create($request->validated());  //Get all holidays
            return $this->success('Gender Series created');
        }
        catch (Exception $e) {
            return $this->errorWithInput($request);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $this->canUpdate($this->gender->model());
        try {
            $genderSeries = $this->gender->find($id);  //Get all holidays
            return view('event.gender-series.edit',compact('genderSeries'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GenderSeriesRequest $request, $id)
    {
        $this->canUpdate($this->gender->model());
        try {
            $this->gender->updating($id,$request->validated());  //Get all holidays
            return $this->successRoute('genderSeries.index');
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
        $this->canDelete($this->gender->model());

        try {
            $this->gender->delete($id);
            return $this->success('Gender series deleted');
        }
        catch (\Exception $e) {
            return $this->error();
        }
    }
}
