<?php

namespace NorthBees\Settings\Policies;

use App\Models\Team;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use NorthBees\Settings\Models\Setting;

class SettingsPolicy
{
    use HandlesAuthorization;

    public function getTeam($teamName)
    {
        return Team::where('name' ,'=', $teamName)->first();
    }

    public function viewAny(User $user): bool
    {
        return $user->belongsToTeam($this->getTeam('Admin'));
    }

    public function view(User $user, Setting $setting): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return $user->belongsToTeam($this->getTeam('Admin'));
    }

    public function update(User $user, Setting $setting): bool
    {
        return $user->belongsToTeam($this->getTeam('Admin'));
    }

    public function delete(User $user, Setting $setting): bool
    {
        return $user->belongsToTeam($this->getTeam('Admin'));
    }

    public function restore(User $user, Setting $setting): bool
    {
        return $user->belongsToTeam($this->getTeam('Admin'));
    }

    public function forceDelete(User $user, Setting $setting): bool
    {
        return $user->belongsToTeam($this->getTeam('Admin'));
    }
}
