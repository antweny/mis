<?php

namespace App\Http\Controllers;

use App\Repository\Interfaces\OrganizationRepositoryInterface;
use App\Services\ExperienceService;
use App\Services\OrganizationService;
use Exception;

class KnowledgeCenterController extends AuthController
{
    /**
     * @var
     */
    private $organization;
    private $experience;

    /**
     * OrganizationController constructor.
     */
    public function __construct(OrganizationRepositoryInterface $organization)
    {
        parent::__construct();
        $this->organization = $organization;
        //$this->experience = $experienceService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->canView($this->organization->model());
        try {
            $organizations = $this->organization->getKCList();  //Get all organizations
            return view('organization.kc.index',compact('organizations'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /**
     * Display a listing of the resource.
     */
    public function member()
    {
        $this->canView($this->experience->model());
        try {
            $experiences = $this->experience->getKCMembersList();  //Get all experiences
            return view('kc.member',compact('experiences'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }


}
