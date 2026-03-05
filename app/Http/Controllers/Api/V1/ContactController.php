<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\UpdateContactRequest;
use App\Http\Resources\ContactResource;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * Details on Resources, Resource Collections etc.
     * https://laravel.com/docs/12.x/eloquent-resources
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        // Paginate the contacts
        $contacts = Contact::paginate(5);
        // Strangely when I remove the line below, the response data
        // is the full contact details, not our defined fields from the
        // contact resource...
        //
        // My thoughts are that it is filtering the contact data to be
        // just the fields we require, then when the data is JSONified
        // it uses this data.
        $resource = ContactResource::collection(resource: $contacts);

        return response()->json($contacts);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreContactRequest $request)
    {
        $validated = $request->validated();
        $contact = Contact::create($validated);
        return response()->json($contact, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        $result = $contact->toResource();
        return response()->json($result);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateContactRequest $request, Contact $contact)
    {
        $validated = $request->validated();
        $contact->update($validated);
        return response()->json($contact, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return response()->json(null, 204);
    }
}
