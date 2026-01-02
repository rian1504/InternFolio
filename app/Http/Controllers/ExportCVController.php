<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class ExportCVController extends Controller
{
    public function export()
    {
        $user = Auth::user();

        // Load relationships
        $user->load(['department', 'projects', 'rating']);

        // Calculate internship duration
        $start = Carbon::parse($user->join_date);
        $end = Carbon::parse($user->end_date);
        $totalDays = $start->diffInDays($end);
        $months = floor($totalDays / 30);
        $remainingDays = $totalDays - ($months * 30);

        $data = [
            'user' => $user,
            'duration' => [
                'months' => $months,
                'days' => $remainingDays,
            ],
            'generated_at' => Carbon::now()->format('d F Y'),
        ];

        $pdf = Pdf::loadView('exports.cv_export', $data);
        $pdf->setPaper('a4', 'portrait');

        $filename = 'CV_' . str_replace(' ', '_', $user->user_name) . '.pdf';

        return $pdf->download($filename);
    }
}
