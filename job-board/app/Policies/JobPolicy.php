<?php

namespace App\Policies;

use App\Models\Job;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class JobPolicy
{
    public function viewAny(?User $user): bool
    {
        return true;
    }

    public function view(?User $user, Job $job): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return false;
    }

    public function update(User $user, Job $job): bool
    {
        return false;
    }

    public function delete(User $user, Job $job): bool
    {
        return false;
    }

    public function restore(User $user, Job $job): bool
    {
        return false;
    }

    public function forceDelete(User $user, Job $job): bool
    {
        return false;
    }

    public function apply(User $user, Job $job): bool
    {
        return !$job->hasUserApplied($user);
    }
}
