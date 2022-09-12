<?php

namespace App\Http\Requests\Branches;

use Illuminate\Foundation\Http\FormRequest;


class CreateBranchesRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            "name"      => 'required|string|max:150',
            "lan_ip"        => 'required|string|max:150',
            "wan_ip"        => 'required|string|max:150',
            "tunnel_ip"     => 'required|string|max:150',
            "ips"       => 'required|string|max:150',
            'isp'       => 'required|string|max:150',
        ];
    }
}
