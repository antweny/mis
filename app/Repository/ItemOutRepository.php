<?php

namespace App\Repository;

use App\Models\Item;
use App\Models\ItemOut;
use App\Repository\Interfaces\ItemOutRepositoryInterface;
use Illuminate\Support\Facades\DB;

class ItemOutRepository extends BaseRepository implements ItemOutRepositoryInterface
{
    protected $item;

    public function __construct(ItemOut $model, Item $item)
    {
        parent::__construct($model);
        $this->item = $item;
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
        DB::beginTransaction();
        try {
            $request['status'] = "R";
            $itemOut = $this->find($this->decode($id));
            //Reduce item quantity
            $this->item->incrementQuantity($itemOut->item_id,$itemOut->quantity_out); //Get the resource
            //Set to null quantity out
            $request['quantity_out'] = null;
            //
            $this->update($id,$request);
            DB::commit();
            return true;
        }
        catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    /*
     * Issue and Item
     */
    public function issue($id, $request)
    {
        DB::beginTransaction();
        try {
            $request['status'] = "I";
            $itemOut = $this->find($this->decode($id)); //Get the resource
            //Reduce item quantity
            $this->item->decrementQuantity($itemOut->item_id,$request['quantity_out']);
            $this->update($id,$request);
            DB::commit();
            return true;
        }
        catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }



}
