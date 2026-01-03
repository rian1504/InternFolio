<?php

namespace App\Http\Controllers;

use App\Services\MasterService;
use App\Services\ProjectService;
use App\Http\Requests\IndexRequest;
use App\Models\Project;
use App\Models\ShortLink;

class ProjectController extends Controller
{
    public function __construct(
        protected ProjectService $projectService,
        protected MasterService $masterService
    ) {
    }

    public function index(IndexRequest $request)
    {
        $validated = $request->validated();
        $projects = $this->projectService->index($validated);
        $stats = $this->projectService->stats();
        $departments = $this->masterService->list_master_department([]);
        $categories = $this->masterService->list_master_category([
            'type' => 'Project',
        ]);

        return view('projects.index', compact('projects', 'departments', 'categories', 'stats'));
    }

    public function show(Project $project)
    {
        $projectData = $this->projectService->show($project);

        $shortLink = ShortLink::createForModel(
            $project,
            route('project.show', $project->project_uuid)
        );

        return view('projects.show', [
            'project' => $projectData,
            'shortLink' => $shortLink
        ]);
    }
}
