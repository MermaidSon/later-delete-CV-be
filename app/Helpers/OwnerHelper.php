<?php

namespace App\Helpers;

use App\Models\Contact;
use App\Models\Owner;

class OwnerHelper
{
    public static function getOwnerData()
    {
        $owner = Owner::orderBy('id', 'DESC')->first();
        $contacts = Contact::all();

        if(!$owner || !$contacts)
            return null;

        return [
            'owner' => [
                'name' => $owner->name,
                'position' => $owner->position,
                'contacts' => $contacts->map(fn($contact) => [
                    'platform' => $contact->platform,
                    'link' => $contact->link,
                    'text' => $contact->text,
                ]),
            ],
        ];
    }

    public static function getOwnerDataPanel()
    {
        $owner = Owner::orderBy('id', 'DESC')->first();
        $contacts = Contact::all();

        if(!$owner || !$contacts)
            return null;

        return [
            'owner' => [
                'name' => $owner->name,
                'position' => $owner->position,
                'contacts' => $contacts->map(fn($contact) => [
                    'id' => $contact->id,
                    'platform' => $contact->platform,
                    'link' => $contact->link,
                    'text' => $contact->text,
                ]),
            ],
        ];
    }
}