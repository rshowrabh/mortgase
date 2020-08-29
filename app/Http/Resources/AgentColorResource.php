<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AgentColorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        if ($this->lock_logo_color != 1) {
            return [
                'color_system' => $this->color_system,
                'logo' => $this->logo,
            ];
        } else {
            return [
                'color_system' => '#FFF',
                'logo' => 'logo.png',
            ];
        }
    }
}
