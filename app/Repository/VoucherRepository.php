<?php

namespace App\Repositories;

use App\Models\Voucher;

class VoucherRepository extends BaseRepository
{
    public function __construct(Voucher $model)
    {
        parent::__construct($model);
    }

    /**
     * Get All voucher with relationship models
     */
    public function get()
    {
        return $this->model->with([
            'employee',
            'payment'=>function($query) {
                return $query->with(['payee',
                    'bank_account'=>function($query){
                        return $query->with(['currency'])->get();
                    }
                ])->get();
            },
        ])->get();
    }


}
