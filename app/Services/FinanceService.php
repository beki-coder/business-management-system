<?php

namespace App\Services;

use App\Models\Invoice;

class FinanceService
{
    public function totalRevenue()
    {
        return Invoice::sum('amount');
    }
}