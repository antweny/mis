<?php

namespace App\Repositories;

use App\Models\ItemOut;

class ItemIssueRepository extends BaseRepository
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
        return $this->model->with(['item','employee'])->get();
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
