<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RuangMeetingResource extends JsonResource
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
            "nama_tempat"   =>$this->nama_tempat,
            "kapasitas"     =>$this->kapasitas,
            "harga_sewa"    =>$this->harga_sewa,
            "foto"          =>$this->foto,
            "keterangan"    =>$this->keterangan,
            "status"        =>$this ->status ? true : false,
            "promo"         => new PromoResource($this->promo)
            //"mitra"      => new MitraResource($this->mitra),
        ];
    }
}
