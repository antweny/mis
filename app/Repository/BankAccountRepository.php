<?php

namespace App\Repository;

use App\Models\BankAccount;
use App\Repository\Interfaces\BankAccountRepositoryInterface;

class BankAccountRepository extends BaseRepository implements BankAccountRepositoryInterface
{

    public function __construct(BankAccount $model)
    {
        parent::__construct($model);
    }


    /**
     * Get all Stakeholder belongs to bank group
     */
    public function get ()
    {
        return $this->model->with([
                'currency',
                'stakeholder'=>function($query) {
                    return $query->with('organization');
                }
            ])->get();
    }

    /**
     * Get Bank Account Number
     */
    public function bankNumber()
    {
        return $this->model->select('id','stakeholder_id','name')->with([
            'stakeholder'=>function($query) {
                return $query->with('organization');
            }
        ])->get();
    }

    /**
     * Get Bank Account Number and Currency
     */
    public function bankNumberCurrency()
    {
        return $this->model->select('id','currency_id','stakeholder_id','name')->with([
            'currency',
            'stakeholder'=>function($query) {
                return $query->with('organization');
            }
        ])->get();
    }



}
