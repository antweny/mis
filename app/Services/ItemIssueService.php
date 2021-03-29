<?php

namespace App\Services;

use App\Repositories\ItemIssueRepository;
use App\Repositories\ItemRepository;
use Illuminate\Support\Facades\DB;

class ItemIssueService extends  BaseService
{
    private $item;

    public function __construct(ItemIssueRepository $repo, ItemRepository $item)
    {
        parent::__construct($repo);
        $this->item = $item;
    }


    public function update($id, $request)
    {
        DB::beginTransaction();
        try {
            $request['status'] = "I";
            $itemIssue = $this->find($id); //Get the resource
            $this->item->adjustQuantity($itemIssue->item_id,$itemIssue->quantity_out,'increment');
            $this->item->adjustQuantity($itemIssue->item_id,$request['quantity_out'],'decrement');
            $this->repo->update($id,$request);
            DB::commit();
            return true;
        }
        catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    /**
     * Reject Item Request from Employee
     */
    public function reject($id)
    {
        DB::beginTransaction();
        try {
            $itemIssue = $this->repo->find($id); //Get the resource
            $this->repo->reject($id);
            $this->item->adjustQuantity($itemIssue->item_id,$itemIssue->quantity_out, 'increment');
            DB::commit();
            return true;
        }
        catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
