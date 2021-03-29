<?php

namespace App\Repositories;

use App\Models\ItemIn;
use Illuminate\Support\Facades\DB;

class ItemInRepository extends BaseRepository
{
    /**
     * @var
     */
    protected $item;

    /**
     * ItemInRepository constructor.
     */
    public function __construct(ItemIn $model)
    {
        parent::__construct($model);
    }

    /**
     * Get Model Collection with relationship
     */
    public function get()
    {
        return $this->model->with(['item'])->get();
    }


}
