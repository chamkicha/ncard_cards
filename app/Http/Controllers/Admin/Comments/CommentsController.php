<?php

namespace App\Http\Controllers\Admin\Comments;

use App\Http\Requests;
use App\Http\Requests\Comments\CreateCommentsRequest;
use App\Http\Requests\Comments\UpdateCommentsRequest;
use App\Repositories\Comments\CommentsRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use App\Models\Comments\Comments;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class CommentsController extends InfyOmBaseController
{
    /** @var  CommentsRepository */
    private $commentsRepository;

    public function __construct(CommentsRepository $commentsRepo)
    {
        $this->commentsRepository = $commentsRepo;
    }

    /**
     * Display a listing of the Comments.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {

        $this->commentsRepository->pushCriteria(new RequestCriteria($request));
        $comments = $this->commentsRepository->all();
        return view('admin.comments.comments.index')
            ->with('comments', $comments);
    }

    /**
     * Show the form for creating a new Comments.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.comments.comments.create');
    }

    /**
     * Store a newly created Comments in storage.
     *
     * @param CreateCommentsRequest $request
     *
     * @return Response
     */
    public function store(CreateCommentsRequest $request)
    {
        $input = $request->all();

        $comments = $this->commentsRepository->create($input);

        Flash::success('Comments saved successfully.');

        return redirect(route('admin.comments.comments.index'));
    }

    /**
     * Display the specified Comments.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $comments = $this->commentsRepository->findWithoutFail($id);

        if (empty($comments)) {
            Flash::error('Comments not found');

            return redirect(route('comments.index'));
        }

        return view('admin.comments.comments.show')->with('comments', $comments);
    }

    /**
     * Show the form for editing the specified Comments.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $comments = $this->commentsRepository->findWithoutFail($id);

        if (empty($comments)) {
            Flash::error('Comments not found');

            return redirect(route('comments.index'));
        }

        return view('admin.comments.comments.edit')->with('comments', $comments);
    }

    /**
     * Update the specified Comments in storage.
     *
     * @param  int              $id
     * @param UpdateCommentsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCommentsRequest $request)
    {
        $comments = $this->commentsRepository->findWithoutFail($id);

        

        if (empty($comments)) {
            Flash::error('Comments not found');

            return redirect(route('comments.index'));
        }

        $comments = $this->commentsRepository->update($request->all(), $id);

        Flash::success('Comments updated successfully.');

        return redirect(route('admin.comments.comments.index'));
    }

    /**
     * Remove the specified Comments from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
      public function getModalDelete($id = null)
      {
          $error = '';
          $model = '';
          $confirm_route =  route('admin.comments.comments.delete',['id'=>$id]);
          return View('admin.layouts/modal_confirmation', compact('error','model', 'confirm_route'));

      }

       public function getDelete($id = null)
       {
           $sample = Comments::destroy($id);

           // Redirect to the group management page
           return redirect(route('admin.comments.comments.index'))->with('success', Lang::get('message.success.delete'));

       }

}
