<?php

namespace App\Http\Requests\Reservation;

use Illuminate\Foundation\Http\FormRequest;

class StoreReservationRequest extends FormRequest
{
    /**
     * تحديد ما إذا كان المستخدم مصرحاً له بهذا الطلب
     */
    public function authorize()
    {
        return true;
    }

    /**
     * قواعد التحقق من البيانات
     */
    public function rules()
    {
        return [
            'id' => 'required|exists:adahyt,id',
            'times' => 'required|string',
            'c_sak' => 'required|integer|min:1',
            'c_persons' => 'required|integer|min:1',
            'day' => 'required|string',
            
            // بيانات الأشخاص (Arrays)
            'city' => 'required|array|min:1',
            'city.*' => 'required|string|max:255',
            
            'gov' => 'required|array|min:1',
            'gov.*' => 'required|string|max:255',
            
            'address' => 'required|array|min:1',
            'address.*' => 'required|string|max:500',
            
            'name' => 'required|array|min:1',
            'name.*' => 'required|string|max:255',
            
            'mobile' => 'required|array|min:1',
            'mobile.*' => 'required|string|regex:/^[0-9]{11}$/',
            
            'mobile2' => 'nullable|array',
            'mobile2.*' => 'nullable|string|regex:/^[0-9]{11}$/',
            
            'mobile3' => 'nullable|array',
            'mobile3.*' => 'nullable|string|regex:/^[0-9]{11}$/',
            
            'notes' => 'nullable|array',
            'notes.*' => 'nullable|string|max:1000',
            
            'number' => 'required|array|min:1',
            'number.*' => 'required|integer|min:1|max:10',
            
            'description' => 'nullable|array',
            'description.*' => 'nullable|string|max:500',
            
            // بيانات الدفع
            'pay' => 'nullable|numeric|min:0',
            'types' => 'nullable|in:1,200',
            
            // أجزاء الأضحية (اختياري)
            'parts' => 'nullable|array',
            'parts.*' => 'nullable|array',
            'parts.*.*' => 'nullable|string|max:255',
        ];
    }

    /**
     * رسائل الأخطاء المخصصة
     */
    public function messages()
    {
        return [
            'id.required' => 'يجب اختيار الأضحية',
            'id.exists' => 'الأضحية المختارة غير موجودة',
            
            'times.required' => 'يجب اختيار الوقت',
            'c_sak.required' => 'يجب تحديد عدد الصكوك',
            'c_sak.min' => 'عدد الصكوك يجب أن يكون على الأقل 1',
            
            'c_persons.required' => 'يجب تحديد عدد الأشخاص',
            'c_persons.min' => 'عدد الأشخاص يجب أن يكون على الأقل 1',
            
            'day.required' => 'يجب اختيار اليوم',
            
            'city.required' => 'يجب إدخال المدينة',
            'city.*.required' => 'المدينة مطلوبة لكل شخص',
            
            'name.required' => 'يجب إدخال الاسم',
            'name.*.required' => 'الاسم مطلوب لكل شخص',
            'name.*.max' => 'الاسم يجب ألا يتجاوز 255 حرف',
            
            'mobile.required' => 'يجب إدخال رقم الهاتف',
            'mobile.*.required' => 'رقم الهاتف مطلوب لكل شخص',
            'mobile.*.regex' => 'رقم الهاتف يجب أن يكون 11 رقم',
            
            'mobile2.*.regex' => 'رقم الهاتف الثاني يجب أن يكون 11 رقم',
            'mobile3.*.regex' => 'رقم الهاتف الثالث يجب أن يكون 11 رقم',
            
            'address.required' => 'يجب إدخال العنوان',
            'address.*.required' => 'العنوان مطلوب لكل شخص',
            'address.*.max' => 'العنوان يجب ألا يتجاوز 500 حرف',
            
            'number.required' => 'يجب تحديد العدد',
            'number.*.required' => 'العدد مطلوب لكل شخص',
            'number.*.min' => 'العدد يجب أن يكون على الأقل 1',
            'number.*.max' => 'العدد يجب ألا يتجاوز 10',
            
            'pay.numeric' => 'المبلغ المدفوع يجب أن يكون رقم',
            'pay.min' => 'المبلغ المدفوع يجب أن يكون صفر أو أكثر',
        ];
    }

    /**
     * معالجة إضافية بعد التحقق
     */
    protected function passedValidation()
    {
        // تنظيف أرقام الهواتف
        if ($this->has('mobile')) {
            $this->merge([
                'mobile' => array_map(function($mobile) {
                    return preg_replace('/[^0-9]/', '', $mobile);
                }, $this->mobile),
            ]);
        }
    }
}
