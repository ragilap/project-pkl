<?php

namespace App\Http\Controllers;

use App\Models\footercontact;
use App\Models\social;
use Illuminate\Http\Request;

class ContactFooterController extends Controller
{
    public function crud(Request $request)
    {
        $q = $request->input('q');

        $query = footercontact::where('alamat', 'like', '%' . $q . '%');
        // ->orWhere('intro', 'like', '%' . $q . '%')

        $perPage = 5;
        $contactfoots = $query->paginate($perPage);
        $contactfoots->appends(['q' => $q]);

        return view('backend.Contact.crud', compact('contactfoots', 'q'));
    }

    public function edit($id)
    {
        $contact = footercontact::find($id);
        return view('backend.Contact.edit', compact('contact'));
    }

    public function update(Request $request,$id)
    {
        $contact = footercontact::find($id);
        $contact->alamat = $request->alamat;
        $contact->kota = $request->kota;
        $contact->provinsi = $request->provinsi;
        $contact->phone = $request->phone;
        $contact->email = $request->email;
        $contact->save();

        return redirect('/contactfooter/crud')->with('success','ContactFooter Telah di update');
    }
}
