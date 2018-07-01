<?php

namespace Modules\Nintei\Http\Requests\Backend\Auth\User;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Nintei\Rules\Auth\UnusedPassword;

/**
 * Class UpdateUserPasswordRequest.
 */
class UpdateUserPasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->isAdmin();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'password' => ['required', 'min:6', 'confirmed', new UnusedPassword((int) $this->segment(4))],
        ];
    }
}
