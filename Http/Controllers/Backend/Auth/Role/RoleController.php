<?php

namespace Modules\Nintei\Http\Controllers\Backend\Auth\Role;

use App\Http\Controllers\Controller;
use Modules\Nintei\Events\Backend\Auth\Role\RoleDeleted;
use Modules\Nintei\Http\Requests\Backend\Auth\Role\ManageRoleRequest;
use Modules\Nintei\Http\Requests\Backend\Auth\Role\StoreRoleRequest;
use Modules\Nintei\Http\Requests\Backend\Auth\Role\UpdateRoleRequest;
use Modules\Nintei\Models\Auth\Role;
use Modules\Nintei\Repositories\Backend\Auth\PermissionRepository;
use Modules\Nintei\Repositories\Backend\Auth\RoleRepository;

/**
 * Class RoleController.
 */
class RoleController extends Controller
{
    /**
     * @var RoleRepository
     */
    protected $roleRepository;

    /**
     * @var PermissionRepository
     */
    protected $permissionRepository;

    /**
     * @param RoleRepository       $roleRepository
     * @param PermissionRepository $permissionRepository
     */
    public function __construct(RoleRepository $roleRepository, PermissionRepository $permissionRepository)
    {
        $this->roleRepository = $roleRepository;
        $this->permissionRepository = $permissionRepository;
    }

    /**
     * @param ManageRoleRequest $request
     *
     * @return mixed
     */
    public function index(ManageRoleRequest $request)
    {
        return view('nintei::backend.auth.role.index')
            ->withRoles($this->roleRepository
                    ->with('users', 'permissions')
                    ->orderBy('id', 'asc')
                    ->paginate(25));
    }

    /**
     * @param ManageRoleRequest $request
     *
     * @return mixed
     */
    public function create(ManageRoleRequest $request)
    {
        return view('nintei::backend.auth.role.create')
            ->withPermissions($this->permissionRepository->get());
    }

    /**
     * @param StoreRoleRequest $request
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function store(StoreRoleRequest $request)
    {
        $this->roleRepository->create($request->only('name', 'associated-permissions', 'permissions', 'sort'));

        return redirect()->route('admin.auth.role.index')->withFlashSuccess(__('alerts.backend.roles.created'));
    }

    /**
     * @param ManageRoleRequest $request
     * @param Role              $role
     *
     * @return mixed
     */
    public function edit(ManageRoleRequest $request, Role $role)
    {
        if ($role->isAdmin()) {
            return redirect()->route('admin.auth.role.index')->withFlashDanger('You can not edit the administrator role.');
        }

        return view('nintei::backend.auth.role.edit')
            ->withRole($role)
            ->withRolePermissions($role->permissions->pluck('name')->all())
            ->withPermissions($this->permissionRepository->get());
    }

    /**
     * @param UpdateRoleRequest $request
     * @param Role              $role
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        $this->roleRepository->update($role, $request->only('name', 'permissions'));

        return redirect()->route('admin.auth.role.index')->withFlashSuccess(__('alerts.backend.roles.updated'));
    }

    /**
     * @param ManageRoleRequest $request
     * @param Role              $role
     *
     * @return mixed
     * @throws \Exception
     */
    public function destroy(ManageRoleRequest $request, Role $role)
    {
        if ($role->isAdmin()) {
            return redirect()->route('admin.auth.role.index')->withFlashDanger(__('exceptions.backend.access.roles.cant_delete_admin'));
        }

        $this->roleRepository->deleteById($role->id);

        event(new RoleDeleted($role));

        return redirect()->route('admin.auth.role.index')->withFlashSuccess(__('alerts.backend.roles.deleted'));
    }
}
