<?php

namespace App\Services;

use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;

class CVService
{
    /**
     * Get all data needed for CV export
     */
    public function getExportData($user): array
    {
        // Load relationships
        $user->load(['department', 'projects.category', 'rating']);

        // Auto collect skills from projects
        $autoSkills = $user->projects->pluck('project_technology')
            ->flatMap(function ($item) {
                return preg_split('/[,\n]+/', $item);
            })
            ->map(fn($s) => trim($s))
            ->filter()
            ->unique()
            ->implode(', ');

        // Calculate internship duration
        $start = Carbon::parse($user->join_date);
        $end = Carbon::parse($user->end_date);
        $totalDays = $start->diffInDays($end);
        $months = floor($totalDays / 30);
        $remainingDays = $totalDays - ($months * 30);

        return [
            'user' => $user,
            'auto_skills' => $autoSkills,
            'duration' => [
                'months' => $months,
                'days' => $remainingDays,
            ],
            'generated_at' => Carbon::now()->format('d F Y'),
        ];
    }

    /**
     * Generate PDF from export data
     */
    public function generatePdf(array $data): \Barryvdh\DomPDF\PDF
    {
        $pdf = Pdf::loadView('exports.cv_export', $data);
        $pdf->setPaper('a4', 'portrait');

        return $pdf;
    }

    /**
     * Get filename for CV export
     */
    public function getFilename(string $userName): string
    {
        return 'CV_' . str_replace(' ', '_', $userName) . '.pdf';
    }
}
