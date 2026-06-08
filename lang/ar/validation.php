<?php
return [
    'required'    => 'حقل :attribute مطلوب.',
    'string'      => 'يجب أن يكون :attribute نصاً.',
    'email'       => 'يجب أن يكون :attribute بريداً إلكترونياً صحيحاً.',
    'min'         => [
        'string' => 'يجب أن يحتوي :attribute على :min أحرف على الأقل.',
    ],
    'max'         => [
        'string' => 'يجب ألا يتجاوز :attribute :max حرفاً.',
        'file'   => 'يجب ألا يتجاوز حجم :attribute :max كيلوبايت.',
    ],
    'in'          => 'القيمة المحددة لـ :attribute غير صالحة.',
    'exists'      => 'القيمة المحددة لـ :attribute غير موجودة.',
    'uuid'        => 'يجب أن يكون :attribute معرّفاً صحيحاً.',
    'date'        => 'يجب أن يكون :attribute تاريخاً صحيحاً.',
    'after_or_equal' => 'يجب أن يكون :attribute بعد أو يساوي :date.',
    'mimes'       => 'يجب أن يكون :attribute ملفاً من النوع: :values.',
    'array'       => 'يجب أن يكون :attribute مصفوفة.',
    'numeric'     => 'يجب أن يكون :attribute رقماً.',
    'integer'     => 'يجب أن يكون :attribute عدداً صحيحاً.',
    'boolean'     => 'يجب أن يكون :attribute صحيحاً أو خاطئاً.',
    'unique'      => ':attribute مستخدم بالفعل.',
    'confirmed'   => 'تأكيد :attribute غير متطابق.',

    'attributes'  => [
        'email'        => 'البريد الإلكتروني',
        'password'     => 'كلمة المرور',
        'name'         => 'الاسم',
        'session_date' => 'تاريخ الجلسة',
        'status'       => 'الحالة',
        'student_id'   => 'الطالب',
        'arrived_at'   => 'وقت الحضور',
        'left_at'      => 'وقت الانصراف',
        'reason'       => 'السبب',
        'records'      => 'السجلات',
    ],
];