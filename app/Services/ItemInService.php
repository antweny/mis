<?php

namespace App\Services;

use App\Repositories\ItemInRepository;
use App\Repositories\ItemRepository;
use Illuminate\Support\Facades\DB;

class ItemInService extends BaseService
{
    private $item;

    public function __construct(ItemInRepository $repo, ItemRepository $item)
    {
        parent::__construct($repo);
        $this->item = $item;
    }


    /**
     * Create new Resource
     */
    public function create($request)
    {
        DB::beginTransaction();
        try {
            $this->repo->create($request);
            $this->item->adjustQuantity($request['item_id'],$request['quantity_in'],'increment');
            DB::commit();
        }
        catch (\Exception $e) {
           DB::rollBack();
           throw $e;
        }
    }

    /**
     * Updating existing Resource
     */
    public function update($id, $request)
    {
        DB::beginTransaction();
        try {
            $itemIn = $this->repo->find($id);
            $this->item->adjustQuantity($request['item_id'],$itemIn->quantity_in,'decrement');
            $this->repo->update($id,$request);
            $this->item->adjustQuantity($request['item_id'],$request['quantity_in'],'increment');
            DB::commit();
        }
        catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        DB::beginTransaction();
        try {
            $itemIn = $this->repo->find($id);
            $this->repo->delete($id);
            $this->item->adjustQuantity($itemIn->item_id,$itemIn->quantity_in,'decrement');
            DB::commit();
        }
        catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
