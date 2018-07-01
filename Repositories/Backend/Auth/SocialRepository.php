<?php

namespace Modules\Nintei\Repositories\Backend\Access\User;

use App\Exceptions\GeneralException;
use Modules\Nintei\Events\Backend\Auth\User\UserSocialDeleted;
use Modules\Nintei\Models\Auth\SocialAccount;
use Modules\Nintei\Models\Auth\User;

/**
 * Class SocialRepository.
 */
class SocialRepository
{
    /**
     * @param User        $user
     * @param SocialAccount $social
     *
     * @return bool
     * @throws GeneralException
     */
    public function delete(User $user, SocialAccount $social)
    {
        if ($user->providers()->whereId($social->id)->delete()) {
            event(new UserSocialDeleted($user, $social));

            return true;
        }

        throw new GeneralException(__('exceptions.backend.access.users.social_delete_error'));
    }
}
