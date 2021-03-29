<?php

namespace App\Services;

use App\Repositories\EventCategoryRepository;

class EventCategoryService extends BaseService
{
    public function __construct(EventCategoryRepository $repo)
    {
        parent::__construct($repo);
    }








}
