<?php

namespace Modules\Nintei\Http\Requests\Frontend\User;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Nintei\Rules\Auth\UnusedPassword;

/**
 * Class UpdatePasswordRequest.
 */
class UpdatePasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->canChangePassword();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'old_password' => 'required',
            'password' => ['required', 'min:6', 'confirmed', new UnusedPassword($this->user())],
        ];
    }
}
