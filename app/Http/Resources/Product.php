<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class Product extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);

        return [
            'id' => $this->id,
            'name' => $this->name,
            'price' => $this->price,
            'amount' => $this->amount
        ];

    }

    public function with($request){
        return [
            'version' => '1.0.0',
            'author_url' => url('https://github.com/s2rgi0')
        ];
    }
}
