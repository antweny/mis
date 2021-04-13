<?php

namespace App\Repository;

use App\Models\ItemOut;
use App\Repository\Interfaces\ItemOutRepositoryInterface;

class ItemOutRepository extends BaseRepository implements ItemOutRepositoryInterface
{
    protected $item;

    public function __construct(ItemOut $model)
    {
        parent::__construct($model);
    }

    /**
     * Get Model Collection with relationship
     */
    public function get()
    {
        return $this->relationshipWithPagination(['item','employee']);
    }


    /**
     * Reject Request
     */
    public function reject($id)
    {
        $itemIssue = $this->find($id);
        $itemIssue->status = 'R';
        $itemIssue->quantity_out = 0;
        $itemIssue->save();
        return $itemIssue;
    }

}
