<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;
use App\Common\CRUDController;
use Illuminate\Validation\Rule;

class ServiceController extends CRUDController
{
    public function __construct(Service $model, Request $request)
    {
        parent::__construct();

        $this->resourceModel = $model;
        $this->validationRules = [
        	'store' => [
	            'service' => 'required|unique:services,service',
                'payment_type' => 'required',
	            'otp_price' => 'nullable',
                'annual_price' => 'nullable',
                'semi_annual_price' => 'nullable',
                'quarterly_price' => 'nullable',
                'monthly_price' => 'nullable'
        	],
        	'update' => [
        		'service' => [
                    Rule::unique('services', 'service')->ignore($request->route('service'))
                ],
                'payment_type' => 'required',
                'otp_price' => 'nullable',
                'annual_price' => 'nullable',
                'semi_annual_price' => 'nullable',
                'quarterly_price' => 'nullable',
                'monthly_price' => 'nullable'
        	]
        ];
    }

    public function beforeStore()
    {   
        if(request()->payment_type == 'subscription')
        {
            $this->validatedInput['otp_price'] = 0;
            $this->validatedInput['annual_price'] = str_replace(',', '', $this->validatedInput['annual_price']);
            $this->validatedInput['semi_annual_price'] = str_replace(',', '', $this->validatedInput['semi_annual_price']);
            $this->validatedInput['quarterly_price'] = str_replace(',', '', $this->validatedInput['quarterly_price']);
            $this->validatedInput['monthly_price'] = str_replace(',', '', $this->validatedInput['monthly_price']);
        }
        else if(request()->payment_type == 'one_time_payment')
        {
            $this->validatedInput['otp_price'] = str_replace(',', '', $this->validatedInput['otp_price']);
            $this->validatedInput['annual_price'] = 0;
            $this->validatedInput['semi_annual_price'] = 0;
            $this->validatedInput['quarterly_price'] = 0;
            $this->validatedInput['monthly_price'] = 0;
        }
    }

    public function beforeUpdate()
    {

        $this->beforeStore();
    }
}
