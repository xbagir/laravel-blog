<?php

namespace App\Http\Controllers;

use App\Dto\StoreDiscussionCommentDto;
use App\Http\Requests\StoreDiscussionCommentRequest;
use App\Services\DiscussionService;

class DiscussionCommentController extends Controller
{
    /**
     * @param StoreDiscussionCommentRequest $request
     * @param DiscussionService             $discussionService
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreDiscussionCommentRequest $request, DiscussionService $discussionService)
    {
        $dto = StoreDiscussionCommentDto::fromRequest($request);
        $dto->setUserId(\Auth::id());

        $discussionService->storeComment($dto);

        return back();
    }

}
