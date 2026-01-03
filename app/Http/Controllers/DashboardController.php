<?php

namespace App\Http\Controllers;

use App\Services\InternService;
use App\Services\ProjectService;
use App\Services\SuggestionService;

class DashboardController extends Controller
{
    public function __construct(
        protected InternService $internService,
        protected ProjectService $projectService,
        protected SuggestionService $suggestionService
    ) {
    }

    public function index()
    {
        $interns = $this->internService->dashboard();
        $projects = $this->projectService->dashboard();
        $suggestions = $this->suggestionService->dashboard();

        $totalInterns = $this->internService->count();
        $totalProjects = $this->projectService->count();
        $totalSuggestions = $this->suggestionService->count();

        return view('home', [
            'interns' => $interns,
            'projects' => $projects,
            'suggestions' => $suggestions,
            'totalInterns' => $totalInterns,
            'totalProjects' => $totalProjects,
            'totalSuggestions' => $totalSuggestions,
        ]);
    }
}
