<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MakananResource extends JsonResource
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
            "id"        => $this->id,
            "nama"      => $this->nama,
            "harga"     => $this->harga,
            "deskripsi" => $this->deskripsi,
            "foto"      => $this->foto,
            "jenis"     => $this->jenis
        ];
    }
}
