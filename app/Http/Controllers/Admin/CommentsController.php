<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentsRequest;
use App\Models\Comment;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    use GeneralTrait;

    ////////////////////////////////////////////////////////////////////
    /// index
    public function index($id = null)
    {
        if (!$id) {
                return redirect()->route('admin.not.found');
        }
        $title = trans('menu.comments');
        return view('admin.posts.comments.index', compact('title', 'id'));
    }

    ////////////////////////////////////////////////////////////////////
    /// getComments
    public function getComments($id = null)
    {
        $comments = Comment::select(
            'id',
            'person_ip',
            'person_name',
            'person_email',
            'commentary',
            'status',
            'post_id'
        )->where('post_id', $id)->get();

        if (!$comments) {
            return redirect()->route('admin.not.found');
        }

        $meta = new \stdClass();
        $meta->page = 1;
        $meta->pages = 2;
        $meta->perpage = 15;
        $meta->total = 16;
        $meta->sort = "dec";
        $meta->field = "id";
        $meta->sort = "des";
        $meta->field = "id";

        return response()->json(['meta' => $meta, 'data' => $comments]);
    }
    ////////////////////////////////////////////////////////////////////
    /// create
    public function create($id = null)
    {
        $title = trans('menu.add_new_comment');
        return view('admin.posts.comments.create', compact('title', 'id'));
    }

    ////////////////////////////////////////////////////////////////////
    /// store
    public function store(CommentsRequest $request)
    {

        Comment::create([
            'person_ip' => $request->person_ip,
            'person_name' => $request->person_name,
            'person_email' => $request->person_email,
            'commentary' => $request->commentary,
            'status' => $request->status,
            'post_id' => $request->post_id,
        ]);

        return $this->returnSuccessMessage(trans('general.add_success_message'));

    }

    ////////////////////////////////////////////////////////////////////
    /// destroy
    public function destroy(Request $request)
    {

        if ($request->ajax()) {
            $comment = Comment::find($request->id);
            if (!$comment) {
                return redirect()->route('admin.not.found');
            }
            $comment->delete();
            return $this->returnSuccessMessage(trans('general.delete_success_message'));

        }
    }


}
