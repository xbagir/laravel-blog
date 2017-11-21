<?php

namespace App\Http\Controllers;

use App\Services\DiscussionService;

class DiscussionController extends Controller
{
    /**
     * @var DiscussionService
     */
    protected $discussionService;

    public function __construct(DiscussionService $discussionService)
    {
        $this->discussionService  = $discussionService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $discussions = $this->discussionService->getAll();

        return view('discussion.index', compact('discussions'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $discussion = $this->discussionService->getById($id);

        if ( ! $discussion) abort(404);

        return view('discussion.show', compact('discussion'));
    }

}
