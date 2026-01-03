<?php

namespace App\Http\Controllers;

use App\Http\Requests\IndexRequest;
use App\Models\User;
use App\Models\ShortLink;
use App\Services\InternService;
use App\Services\MasterService;

class InternController extends Controller
{
    public function __construct(
        protected InternService $internService,
        protected MasterService $masterService
    ) {
    }

    public function index(IndexRequest $request)
    {
        $validated = $request->validated();
        $interns = $this->internService->index($validated);
        $stats = $this->internService->stats();
        $departments = $this->masterService->list_master_department([]);

        return view('interns.index', compact('interns', 'departments', 'stats'));
    }

    public function show(User $user)
    {
        $intern = $this->internService->show($user);

        $shortLink = ShortLink::createForModel(
            $user,
            route('intern.show', $user->user_uuid)
        );

        return view('interns.show', compact('intern', 'shortLink'));
    }
}
