<?php

namespace App\Http\Controllers;

use App\Repository\Interfaces\IndividualExperienceRepositoryInterface;
use App\Repository\Interfaces\OrganizationRepositoryInterface;
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
    public function __construct(OrganizationRepositoryInterface $organization, IndividualExperienceRepositoryInterface $experience)
    {
        parent::__construct();
        $this->organization = $organization;
        $this->experience = $experience;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->canView($this->organization->model());
        try {
            $organizations = $this->organization->getOrganisationListByCategory('Knowledge Center');  //Get all organizations
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
        $this->canView($this->organization->model());
        try {
            $experiences = $this->experience->organizationMembersList('Knowledge Center');  //Get all experiences
            return view('organization.kc.member',compact('experiences'));
        }
        catch (Exception $e) {
            dd($e->getMessage());
            return $this->error();
        }
    }


}
