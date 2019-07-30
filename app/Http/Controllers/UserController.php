<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Events\UserEvent;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $this->validate(
            $request,
            [
                "Email" => "required|email",
                "Password" => "required|min:6",
            ]
        );

        $email = $request->Email;
        $password = $request->Password;

        if (Auth::attempt(['email' => $email, 'password' => $password])) {

            return redirect()->route("event.index");
        }
        flash("Votre login ou mot de passe incorrect", "danger", "Attention");
        return back();
    }
    public function logOut()
    {
        Auth::logout(Auth::user());
        return redirect()->route('user.index');
    }
    public function index()
    {
        //
        return view("auth.login");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("auth.register");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        //
        $user = new User;
        $user->nom = $request->Name;

        if ($request->has("Image")) {
            $user->image = $request->Image->store("images", "public");
        }

        $user->email = $request->Email;
        $user->password = bcrypt($request->Password);

        $user->save();

        event(new UserEvent($user));

        return redirect()->route("user.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $user = User::find($id);
        return view("pages.users.profile", compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = User::find($id);

        return view("pages.users.edit", compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate(
            $request,
            [
                "Name" => "required|string|min:2",
                "Image" => "required|image",
                "Password" => "required|min:6",
                "Repeat_password" => "required_with:Password|same:Password|min:6",
            ]
        );

        $user = User::find($id);
        $user->nom = $request->Name;
        $old_image = $user->image;
        if ($request->has('Image')) {
            File::delete("images/" . $old_image);
            $user->image = $request->Image->store('images', 'public');
        }

        $user->password = bcrypt($request->Password);

        $user->save();
        flash("Votre profile a été modifier avec succée", "info", "Félicitation");
        return redirect()->route('user.show', $user->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}