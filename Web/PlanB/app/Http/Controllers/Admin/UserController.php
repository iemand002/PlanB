<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Mail\Message;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $active='a-users';
        return view('admin.user.index', compact('users','active'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $user = new User();
        $this->saveUser($request, $user);

        return redirect(route('admin.user.index'))->with(['success' => 'Gebruiker "' . $user->fullname . '" opgeslagen!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($user)
    {
        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $user)
    {
        $this->saveUser($request, $user);

        return redirect(route('admin.user.index'))->with(['success' => 'Gebruiker "' . $user->fullname . '" gewijzigd!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($user)
    {
        if ($user!=Auth::user()){
            $user->delete();
            return redirect(route('admin.user.index'))->with(['success' => 'Gebruiker "' . $user->fullname . '" verwijderd!']);
        }
        return redirect(route('admin.user.index'))->withErrors(['Je kunt jezelf niet verwijderen!']);
    }

    /**
     * @param UserRequest $request
     * @param $user
     */
    private function saveUser(UserRequest $request, $user)
    {
        $user->name = $request['name'];
        $user->surname = $request['surname'];
        $user->email = $request['email'];
        if ($request['password'] != '') {
            $user->password = bcrypt($request['password']);
        }
        $user->admin = ($request->has('admin') ? 1 : 0);
        $user->save();
    }

    /**
     * Send a reset link to the given user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function sendResetLinkEmail(Request $request)
    {
        $this->validate($request, ['email' => 'required|email']);

        $broker = $this->getBroker();

        $response = Password::broker($broker)->sendResetLink(
            $request->only('email'), $this->resetEmailBuilder()
        );

        return redirect()->back()->with('status', trans($response));
    }

    /**
     * Get the broker to be used during password reset.
     *
     * @return string|null
     */
    public function getBroker()
    {
        return property_exists($this, 'broker') ? $this->broker : null;
    }

    /**
     * Get the Closure which is used to build the password reset email message.
     *
     * @return \Closure
     */
    protected function resetEmailBuilder()
    {
        return function (Message $message) {
            $message->subject('Uw wachtwoord reset link');
        };
    }
}
