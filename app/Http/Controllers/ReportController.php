<?php

namespace App\Http\Controllers;

use App\Services\ReportService;
use Inertia\Inertia;

class ReportController extends Controller
{
    protected $reportService;

    public function __construct(ReportService $reportService)
    {
        $this->reportService = $reportService;
    }

    public function index()
    {
        $data = $this->reportService->generate();

        return Inertia::render('Reports/Index',[
            'report'=>$data
        ]);
    }
}