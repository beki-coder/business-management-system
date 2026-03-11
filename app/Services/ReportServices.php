<?php

namespace App\Services;

use App\Models\Project;
use App\Models\Invoice;

class ReportService
{
    public function generate()
    {
        return [
            'projects'=>Project::count(),
            'revenue'=>Invoice::sum('amount')
        ];
    }
}