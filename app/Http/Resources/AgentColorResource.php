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
                'agent_license_number' => $this->agent_license_number,
                'name' => $this->name,
                'phone' => $this->phone,
            ];
        } else {
            return [
                'color_system' => '#FFF',
                'logo' => 'logo.png',
                'agent_license_number' => null,
                'name' => null,
                'phone' => null,
            ];
        }
    }
}
