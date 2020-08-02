<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Republics extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
        'nameRepublic' => $this->nameRepublic,
        'address' => $this->address,
        'bedroom' => $this->bedroom,
        'telephoneRepublic' => $this->telephoneRepublic,
        'description' => $this->description,
        'acessibility' => $this->acessibility,
        'bathroom' => bathroomResource::collection($this->bathroom),
        'rules' => $this->rules,
        'gender' => $this->gender,
        'facillity' => $this->facillity,
        ];
    }
}
