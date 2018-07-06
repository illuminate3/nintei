<?php

namespace Modules\Nintei\Listeners\Backend\Auth\User;

/**
 * Class UserEventListener.
 */
class UserEventListener
{
    /**
     * @param $event
     */
    public function onCreated($event)
    {
        \Log::info('User Created');
    }

    /**
     * @param $event
     */
    public function onUpdated($event)
    {
        \Log::info('User Updated');
    }

    /**
     * @param $event
     */
    public function onDeleted($event)
    {
        \Log::info('User Deleted');
    }

    /**
     * @param $event
     */
    public function onConfirmed($event)
    {
        \Log::info('User Confirmed');
    }

    /**
     * @param $event
     */
    public function onUnconfirmed($event)
    {
        \Log::info('User Unconfirmed');
    }

    /**
     * @param $event
     */
    public function onPasswordChanged($event)
    {
        \Log::info('User Password Changed');
    }

    /**
     * @param $event
     */
    public function onDeactivated($event)
    {
        \Log::info('User Deactivated');
    }

    /**
     * @param $event
     */
    public function onReactivated($event)
    {
        \Log::info('User Reactivated');
    }

    /**
     * @param $event
     */
    public function onSocialDeleted($event)
    {
        \Log::info('User Social Deleted');
    }

    /**
     * @param $event
     */
    public function onPermanentlyDeleted($event)
    {
        \Log::info('User Permanently Deleted');
    }

    /**
     * @param $event
     */
    public function onRestored($event)
    {
        \Log::info('User Restored');
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param \Illuminate\Events\Dispatcher $events
     */
    public function subscribe($events)
    {
        $events->listen(
            \Modules\Nintei\Events\Backend\Auth\User\UserCreated::class,
            'Modules\Nintei\Events\Backend\Auth\User\UserEventListener@onCreated'
        );

        $events->listen(
            \Modules\Nintei\Events\Backend\Auth\User\UserUpdated::class,
            'Modules\Nintei\Events\Backend\Auth\User\UserEventListener@onUpdated'
        );

        $events->listen(
            \Modules\Nintei\Events\Backend\Auth\User\UserDeleted::class,
            'Modules\Nintei\Events\Backend\Auth\User\UserEventListener@onDeleted'
        );

        $events->listen(
            \Modules\Nintei\Events\Backend\Auth\User\UserConfirmed::class,
            'Modules\Nintei\Events\Backend\Auth\User\UserEventListener@onConfirmed'
        );

        $events->listen(
            \Modules\Nintei\Events\Backend\Auth\User\UserUnconfirmed::class,
            'Modules\Nintei\Events\Backend\Auth\User\UserEventListener@onUnconfirmed'
        );

        $events->listen(
            \Modules\Nintei\Events\Backend\Auth\User\UserPasswordChanged::class,
            'Modules\Nintei\Events\Backend\Auth\User\UserEventListener@onPasswordChanged'
        );

        $events->listen(
            \Modules\Nintei\Events\Backend\Auth\User\UserDeactivated::class,
            'Modules\Nintei\Events\Backend\Auth\User\UserEventListener@onDeactivated'
        );

        $events->listen(
            \Modules\Nintei\Events\Backend\Auth\User\UserReactivated::class,
            'Modules\Nintei\Events\Backend\Auth\User\UserEventListener@onReactivated'
        );

        $events->listen(
            \Modules\Nintei\Events\Backend\Auth\User\UserSocialDeleted::class,
            'Modules\Nintei\Events\Backend\Auth\User\UserEventListener@onSocialDeleted'
        );

        $events->listen(
            \Modules\Nintei\Events\Backend\Auth\User\UserPermanentlyDeleted::class,
            'Modules\Nintei\Events\Backend\Auth\User\UserEventListener@onPermanentlyDeleted'
        );

        $events->listen(
            \Modules\Nintei\Events\Backend\Auth\User\UserRestored::class,
            'Modules\Nintei\Events\Backend\Auth\User\UserEventListener@onRestored'
        );
    }
}
