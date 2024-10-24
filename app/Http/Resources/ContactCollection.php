<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ContactCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => $this->collection->transform(function ($contact) {
                return [
                    'id' => $contact->id,
                    'first_name' => $contact->first_name,
                    'last_name' => $contact->last_name,
                    'email' => $contact->email,
                    'phone' => $contact->phone,
                    'address' => $contact->address,
                    'city' => $contact->city,
                    'region' => $contact->region,
                    'country' => $contact->country,
                    'postal_code' => $contact->postal_code,
                    'company_id' => $contact->company_id,
                    'created_at' => $contact->created_at ? $contact->created_at->toDateTimeString() : null,
                    'updated_at' => $contact->updated_at ? $contact->updated_at->toDateTimeString() : null,
                ];
            }),
            'meta' => [
                'total_contacts' => $this->collection->count(),
                'links' => [
                    'self' => url('/api/contacts'),
                ],
            ],
        ];
    }
}