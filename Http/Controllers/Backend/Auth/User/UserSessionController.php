<?php

namespace Modules\Nintei\Http\Controllers\Backend\Auth\User;

use Modules\Nintei\Models\Auth\User;
use App\Http\Controllers\Controller;
use Modules\Nintei\Repositories\Backend\Auth\SessionRepository;
use Modules\Nintei\Http\Requests\Backend\Auth\User\ManageUserRequest;

/**
 * Class UserSessionController.
 */
class UserSessionController extends Controller
{
    /**
     * @param ManageUserRequest $request
     * @param SessionRepository $sessionRepository
     * @param User              $user
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function clearSession(ManageUserRequest $request, SessionRepository $sessionRepository, User $user)
    {
        $sessionRepository->clearSession($user);

        return redirect()->back()->withFlashSuccess(__('alerts.backend.users.session_cleared'));
    }
}
