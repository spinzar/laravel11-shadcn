<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class UserCollection extends ResourceCollection
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
            'data' => $this->collection->transform(function ($user) {
                return [
                    'id' => $user->id,
                    'first_name' => $user->first_name,
                    'last_name' => $user->last_name,
                    'email' => $user->email,
                    'owner' => $user->owner,
                    'photo' => $user->photo,
                    'created_at' => $user->created_at ? $user->created_at->toDateTimeString() : null,
                    'updated_at' => $user->updated_at ? $user->updated_at->toDateTimeString() : null,
                ];
            }),
            'meta' => [
                'total_users' => $this->collection->count(),
                'links' => [
                    'self' => url('/api/users'),
                ],
            ],
        ];
    }
}