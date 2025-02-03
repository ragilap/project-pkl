<?php

namespace App\Http\Controllers;

use App\Models\contact;
use Illuminate\Http\Request;

class ContactContrroller extends Controller
{
    private $contactTypes = [
        'geo-alt' => 'Address',
        'telephone' => 'Phone',
        'envelope' => 'Email',
        'clock' => 'Open Hours',
        // Add more types as needed
    ];
    // public function index()
    // {
    //     $contacts = Contact::orderBy('order', 'desc')->get();
    //     $contactTypes = $this->contactTypes;
    //     return view('about.information.index', compact('contacts', 'contactTypes'));
    // }

    public function crud(Request $request)
    {
        $q = $request->input('q');

        $query = contact::where('type', 'like', '%' . $q . '%')
            // ->orWhere('intro', 'like', '%' . $q . '%')
            ->orderBy('order', 'desc');

        $perPage = 5;

        $currentPage = $request->query('page', 1);
        $startingIndex = ($currentPage - 1) * $perPage;

        $contacts = $query->paginate($perPage);
        $contacts->appends(['q' => $q]);
        $contactTypes = $this->contactTypes;


        $contacts->startingIndex = $startingIndex;
        return view('about.contact.crud', compact('contacts', 'q', 'startingIndex', 'contactTypes'));
    }

    public function create()
    {
        return view('about.contact.create', ['contactTypes' => $this->contactTypes]);;
    }

    public function store(Request $request)
    {
        $request->validate([
            // 'type' => 'required|string|in:' . implode(',', array_keys($this->contactTypes)),
            'value' => 'required|string',
        ]);

        Contact::create($request->all());

        return redirect('/About-us/crud')->with('Success', 'Kolom-informasi telah di perbarui');
    }

    public function edit($id)
    {
        $contact = contact::find($id);
        return view('about.contact.edit', ['contact' => $contact, 'contactTypes' => $this->contactTypes]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'type' => 'required|string|in:' . implode(',', array_keys($this->contactTypes)),
            'value' => 'required|string',
        ]);

        $contact = contact::find($id);
        $contact->type = $request->type;
        $contact->value = $request->value;
        $contact->save();
        return redirect()->route('contact.crud')->with('success', 'Contact updated successfully.');
    }

    public function destroy($id)
    {
        $contact = contact::find($id);

        $contact->delete();

        return redirect()->route('contact.crud')->with('success', 'Contact deleted successfully.');
    }
    public function moveUp(contact $contact)
    {
        // dd($album->order);
        $contact->moveOrderUp();
        // dd($album);
        return redirect()->back();
    }

    public function moveDown(contact $contact)
    {
        $contact->moveOrderDown();
        return redirect()->back();
    }
}
