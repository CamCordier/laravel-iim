<?php

namespace App\Http\Controllers;

use App\Contacts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class ContactController extends Controller
{
    public function create()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        $contacts = new Contacts();
        $input = $request->input();
        $input['user_id'] = Auth::user()->id;

        $this->validate($request,
            [
                'name' => 'required',
                'email' => 'required|email',
                'message' => 'required',
            ]);

        $contacts->name = $request->name;
        $contacts->email = $request->email;
        $contacts->message = $request->message;

        $contacts
            ->fill($input)
            ->save();

        return redirect()->route('contact')
            ->with('message', 'Message bien envoyé');

    }
}