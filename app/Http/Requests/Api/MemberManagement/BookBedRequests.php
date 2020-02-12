<?php


namespace App\Http\Requests\Api\MemberManagement;


use Dingo\Api\Http\FormRequest;

class BookBedRequests extends FormRequest
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
            case "api.book-bed.store":
                $rule = [
                    "bed_number"        => "required",
                    "bed_cost"          => "required|numeric",
                    "check-in_date"     => "required|integer",
                    "contract_number"   => "required",
                    "appoint_person"    => "required",
                    "elderly_name"      => "required",
                    "elderly_gender"    => "required",
                    "self-care_ability" => "required",
                    "remark"            => "required"
                ];
                break;
            case "":
                $rule = [];
                break;
            default:
                $rule = [];
        };

        return $rule;
    }

    public function messages()
    {
        return [
            'bed_number.required'        => '床位号必须',
            'bed_cost.required'          => '床位价格必须',
            'bed_cost.numeric'           => '床位价格必须为数字',
            'check-in_date.required'     => '入住日期必须',
            'check-in_date.integer'      => '入住日期必须为整形',
            'contract_number.required'   => '联系人电话必须',
            'appoint_person.required'    => '联系人必须',
            'elderly_name.required'      => '老人姓名必须',
            'elderly_gender.required'    => '老人性别必须',
            'self-care_ability.required' => '老人自理能力必须',
        ];
    }

}