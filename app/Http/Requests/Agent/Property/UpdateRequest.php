<?php

namespace App\Http\Requests\Agent\Property;

use App\Models\PriceType;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->guard('agent');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $defaultPriceTypes = PriceType::getDefaultPriceTypes();

        $priceTypeInput = $this->input('price_type_id');

        $rules = [
            'type_id'=>'required|numeric',
            'category_id'=>'required|numeric',
            'property_name'=>'required',
            'description'=>'required',
            'price_type_id'=>'required|numeric',
            'price'=>'required_unless:price_type_id,4|numeric',
            'area'=>'nullable|numeric',
            'project_id' => 'required|numeric'
        ];

        if($priceTypeInput == $defaultPriceTypes['priceGuide'])
        {
            $rules['price_to'] = 'required|numeric';
        }

        return $rules;
    }
}
