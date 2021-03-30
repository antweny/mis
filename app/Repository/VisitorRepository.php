<?php

namespace App\Repository;

use App\Models\Visitor;
use App\Repository\Interfaces\VisitorRepositoryInterface;

class VisitorRepository extends BaseRepository implements VisitorRepositoryInterface
{
    /**
     * Visitor Repository constructor.
     */
    public function __construct(Visitor $model)
    {
        parent::__construct($model);
    }










}
