<?php

namespace App\Http\Controllers;

use App\Services\MasterService;
use App\Http\Requests\IndexRequest;
use App\Services\SuggestionService;
use App\Models\Suggestion;
use App\Models\ShortLink;

class SuggestionController extends Controller
{
    public function __construct(
        protected SuggestionService $suggestionService,
        protected MasterService $masterService
    ) {
    }

    public function index(IndexRequest $request)
    {
        $validated = $request->validated();
        $suggestions = $this->suggestionService->index($validated);
        $stats = $this->suggestionService->stats();
        $departments = $this->masterService->list_master_department([]);
        $categories = $this->masterService->list_master_category([
            'type' => 'Suggestion',
        ]);

        return view('suggestions.index', compact('suggestions', 'departments', 'categories', 'stats'));
    }

    public function show(Suggestion $suggestion)
    {
        $suggestionData = $this->suggestionService->show($suggestion);

        $shortLink = ShortLink::createForModel(
            $suggestion,
            route('suggestion.show', $suggestion->suggestion_uuid)
        );

        return view('suggestions.show', [
            'suggestion' => $suggestionData,
            'shortLink' => $shortLink
        ]);
    }
}
