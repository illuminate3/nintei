<?php

namespace Modules\Nintei\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use modules\Nintei\Http\Requests\Frontend\User\UpdatePasswordRequest;
use Modules\Nintei\Repositories\Frontend\Auth\UserRepository;

/**
 * Class PasswordExpiredController.
 */
class PasswordExpiredController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function expired()
    {
        return view('nintei::frontend.auth.passwords.expired');
    }

    /**
     * @param UpdatePasswordRequest $request
     * @param UserRepository        $userRepository
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function update(UpdatePasswordRequest $request, UserRepository $userRepository)
    {
        $userRepository->updatePassword($request->only('old_password', 'password'), true);

        return redirect()->route('frontend.user.account')->withFlashSuccess(__('strings.frontend.user.password_updated'));
    }
}
