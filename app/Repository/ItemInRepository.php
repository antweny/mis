<?php

namespace App\Repository;

use App\Models\Item;
use App\Models\ItemIn;
use App\Repository\Interfaces\ItemInRepositoryInterface;
use App\Services\ItemQuantityService;
use Illuminate\Support\Facades\DB;

class ItemInRepository extends BaseRepository implements ItemInRepositoryInterface
{
    /**
     * @var
     */
    protected $item;

    /**
     * ItemInRepository constructor.
     */
    public function __construct(ItemIn $model, Item $item)
    {
        parent::__construct($model);
        $this->item = $item;
    }

    /**
     * Get Model Collection with relationship
     */
    public function get()
    {
        return $this->relationshipWithPagination(['item']);
    }

    /**
     * Create new Resource
     */
    public function create($request)
    {
        DB::beginTransaction();
        try {
            $this->model->create($request);
            $this->item->incrementQuantity($request['item_id'],$request['quantity_in']);
            DB::commit();
            return true;
        }
        catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    /**
     * Updating existing Resource
     */
    public function updating($id, $request)
    {
//        dd($request);
        DB::beginTransaction();
        try {
            $itemIn = $this->find($this->decode($id));
            $this->item->decrementQuantity($itemIn->item_id, $itemIn->quantity_in);
            $this->update($id,$request);
            $this->item->incrementQuantity($itemIn->item_id,$request['quantity_in']);
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
            $itemIn = $this->find($this->decode($id));
            $this->item->decrementQuantity($itemIn->item_id,$itemIn->quantity_in);
            $itemIn->delete();
            DB::commit();
        }
        catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }





}
