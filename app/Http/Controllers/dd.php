<?php

/**
     * Update the specified resource in storage.
     */

use App\Http\Requests\UpdateUserGroupRequest;
use App\Models\UserGroup;

class dd
{
    public function update(UpdateUserGroupRequest $request, UserGroup $group)
    {
        $group->group_name = $request->validated('group_name');

        $roles = $request->post('roles', []);

        $preparedRoles = GroupRole::whereIn('role_id', $roles)
                                                ->where('group_id', $group->id)
                                                ->get();

        $extractedRoles = GroupRole::where('group_id', $group->id)->get();

        $roleToBeDeleted = $extractedRoles->diff($preparedRoles);

        $selectedRoles = Role::whereIn('id', $roles)->get();

        $previousRoles = $group->roles; 
        
        $roleToBeInserted = $selectedRoles->diff( $previousRoles); 

        if ($group->save()) {
            if ($roles !== null) {

                // Delete Deleted Roles
                foreach ($roleToBeDeleted as $deletedRole) {
                    RoleGroup::destroy($deletedRole->id);
                }

                // Insert New Roles
                foreach ($roleToBeInserted as $insertedRole) {
                    $groupRole = new RoleGroup();
                    $groupRole->group_id = $group->id;
                    $groupRole->Role_id = $insertedRole->id;
                    $groupRole->save();
                }
            }
        }
        
        $request->session()->flash('message', 'تم تعديل " ' . $group->group_name . ' " بنجاح');
        $request->session()->flash('messageType', 'success');

        return redirect()->route('groups.show', $group);
    }
}
