<?php

namespace Modules\Nintei\Models\Auth\Traits;

use Modules\Nintei\Notifications\Frontend\Auth\UserNeedsPasswordReset;

/**
 * Class SendUserPasswordReset.
 */
trait SendUserPasswordReset
{
    /**
     * Send the password reset notification.
     *
     * @param string $token
     *
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new UserNeedsPasswordReset($token));
    }
}
