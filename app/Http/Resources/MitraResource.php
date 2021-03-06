<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MitraResource extends JsonResource
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
            "id"            => $this->id,
            "nama_mitra"    =>$this->nama_mitra,
            "no_hp"         =>$this->no_hp,
            "status"        => $this->status,
            "alamat"        => $this->profile->alamat ?? null,
            "jam_buka"      => date('H:i', strtotime($this->profile->jam_buka ?? "00:00")),
            "jam_tutup"     => date('H:i', strtotime($this->profile->jam_tutup?? "00:00")),
            "lat"           =>$this->profile->latitude ?? null,
            "lng"           =>$this->profile->longitude ?? null,
            "foto"          => $this->profile->foto ?? null,
            //"makanan"       => MakananResource::collection($this->makanans)
        ];
    }
}
