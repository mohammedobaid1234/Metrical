<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class PropertyCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name_ar,
            'area' => $this->area,
            'reference' => $this->reference,
            'feminizations' => $this->feminizations,
            'type' => $this->type,
            'offer_type' => $this->offer_type,
            'bedroom' => $this->bedroom,
            'bathroom' => $this->bathroom,
            'date_added' => $this->date_added,
            'address' => $this->address,
            'status' => $this->status,
            'price' => $this->price,
            'gate' => $this->gate,
            'community_id' => $this->community_id,
            'owner_id' => $this->owner_id,
            'city' => $this->city,
        ];
    }
}
