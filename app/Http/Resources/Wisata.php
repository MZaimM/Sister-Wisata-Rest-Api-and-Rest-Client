<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Wisata extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nama'=> $this->nama,
            'gambar'=>$this->gambar,
            'harga_masuk'=>$this->harga_masuk,
            'deskripsi'=>$this->deskripsi
        ];
    }
}
