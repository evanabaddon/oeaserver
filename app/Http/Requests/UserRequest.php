<?php

namespace App\Http\Requests;

use App\Actions\Fortify\PasswordValidationRules;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    use PasswordValidationRules;
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
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'alamat' => ['required', 'string', 'max:255'],
            'provinsi' => ['required', 'string', 'max:255'],
            'kota' => ['required', 'string', 'max:255'],
            'roles' => ['required', 'string', 'max:255', 'in:USER,ADMIN'],
            'hp' => ['required', 'string', 'max:13'],
            'nik' => ['required', 'string', 'max:16'],
            'asalSma' => ['required', 'string', 'max:255'],
            'alamatSma' => ['required', 'string', 'max:255'],
        ];
    }
}