<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listNotApproved()
    {
        $users = User::where('approved', false)->with('jobs')->get();

        return view('admin.users-approve')->with(compact('users'));
    }

    /**
     * Display soft deleted users.
     *
     * @return \Illuminate\Http\Response
     */
    public function listTrashed()
    {
        $users = User::onlyTrashed()->with('jobs')->get();

        return view('admin.users-trash')->with(compact('users'));
    }

    /**
     * Approve user.
     *
     * @param  int $user
     * @return \Illuminate\Http\Response
     */
    public function approve(int $id) {
        $user = User::withTrashed()->find($id);
        $user->approved = true;

        if($user->trashed()) {
            $user->restore();
        }

        $user->save();

        return back();
    }

    /**
     * Soft delete user.
     *
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function trash(User $user)
    {
        $user->delete();

        return redirect()->route('users.notApproved');
    }

    /**
     * Delete user
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $user = User::onlyTrashed()->find($id);
        $user->forceDelete();

        return redirect()->route('users.listTrashed');
    }


}
