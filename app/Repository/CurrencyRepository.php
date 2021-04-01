<?php

namespace App\Repository;

use App\Models\Currency;
use App\Repository\Interfaces\CurrencyRepositoryInterface;

class CurrencyRepository extends BaseRepository implements CurrencyRepositoryInterface
{

    public function __construct(Currency $model)
    {
        parent::__construct($model);
    }

    /**
     * Create new resource
     */
    public function create($request)
    {
        if($request['main'] == 1) {
            $this->singleActiveMain();
        }
        return $this->model->create($request);
    }

    /**
     * Update existing resource
     */
    public function updating($id, $request)
    {
        if($request['main'] == 1) {
            $this->singleActiveMain();
        }
        return $this->update($id,$request);
    }

    /**
     * Limit to one number of active currency
     */
    private function singleActiveMain() : void
    {
        $currency = $this->model->where('main',1)->first();

        if(!is_null($currency)) {
            $currency->main = 0;
            $currency->save();
        }
    }


}
