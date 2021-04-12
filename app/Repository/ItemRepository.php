<?php

namespace App\Repository;

use App\Models\Item;
use App\Repository\Interfaces\ItemRepositoryInterface;

class ItemRepository extends BaseRepository implements ItemRepositoryInterface
{

    public function __construct(Item $model)
    {
        parent::__construct($model);
    }



    /**
     * Get Item Where Quantity is greater than zero
     */
    public function quantityNotZero()
    {
        return $this->model->select('id','name')->where('quantity','>',0)->get();
    }

    /**
     * Increment the Quantity
     */
    public function adjustQuantity($id, $quantity,$condition = null) : void
    {
        $item = $this->find($id);

        if($condition == 'increment') {
            $item->quantity = $item->quantity + $quantity;
        }
        elseif ($condition == 'decrement') {
            $item->quantity = $item->quantity - $quantity;
        }
        $item->save();
    }

}
