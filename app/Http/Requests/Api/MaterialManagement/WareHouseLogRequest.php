<?php

namespace App\Http\Requests\Api\MaterialManagement;

use Dingo\Api\Http\FormRequest;

class WareHouseLogRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $routeName = $this->route()->getName();
        switch ($routeName) {
            case "api.warehouse.log.delete":
                $rule = [
                    "ids"               => "required",
                ];
                break;
            case "":
                $rule = [];
                break;
        };

        return $rule;
    }

    public function messages()
    {
        return [
            'ids.required'                   => '删除数据主键 ids 必须',
        ];
    }
}
