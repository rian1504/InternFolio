<?php

namespace App\Http\Controllers;

use App\Services\CVService;
use Illuminate\Support\Facades\Auth;

class ExportCVController extends Controller
{
    public function __construct(
        protected CVService $cvService
    ) {
    }

    public function export()
    {
        $user = Auth::user();

        $data = $this->cvService->getExportData($user);
        $pdf = $this->cvService->generatePdf($data);
        $filename = $this->cvService->getFilename($user->user_name);

        return $pdf->download($filename);
    }
}
