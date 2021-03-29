<?php

namespace App\Repositories;

use App\Models\Currency;

class CurrencyRepository extends BaseRepository
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
        $this->model->create($request);
        return true;
    }

    /**
     * Update existing resource
     */
    public function update($id, $request)
    {
        $currency = $this->find($id);
        //dd($currency->main);

        if($currency->main != $request['main'] && $request['main'] == 1) {
            $this->singleActiveMain();
        }

        $currency->name = $request['name'];
        $currency->acronym = $request['acronym'];
        $currency->symbol = $request['symbol'];
        $currency->main = $request['main'];
        $currency->desc = $request['desc'];

        return $currency->save();
    }

    /**
     * Limit to one number of active currency
     */
    protected function singleActiveMain() : void
    {
        $currency = $this->model->where('main',1)->first();

        if(!is_null($currency)) {
            $currency->main = 0;
            $currency->save();
        }
    }

    protected function getMainStatus($id)
    {
        $currency = $this->find($id);

        return $currency->main;
    }


}
