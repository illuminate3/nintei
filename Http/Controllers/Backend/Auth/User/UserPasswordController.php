<?php

namespace Modules\Nintei\Http\Controllers\Backend\Auth\User;

use App\Http\Controllers\Controller;
use Modules\Nintei\Http\Requests\Backend\Auth\User\ManageUserRequest;
use Modules\Nintei\Http\Requests\Backend\Auth\User\UpdateUserPasswordRequest;
use Modules\Nintei\Models\Auth\User;
use Modules\Nintei\Repositories\Backend\Auth\UserRepository;

/**
 * Class UserPasswordController.
 */
class UserPasswordController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $userRepository;

    /**
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param ManageUserRequest $request
     * @param User              $user
     *
     * @return mixed
     */
    public function edit(ManageUserRequest $request, User $user)
    {
        return view('nintei::backend.auth.user.change-password')
            ->withUser($user);
    }

    /**
     * @param UpdateUserPasswordRequest $request
     * @param User                      $user
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function update(UpdateUserPasswordRequest $request, User $user)
    {
        $this->userRepository->updatePassword($user, $request->only('password'));

        return redirect()->route('admin.auth.user.index')->withFlashSuccess(__('alerts.backend.users.updated_password'));
    }
}
