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

}
