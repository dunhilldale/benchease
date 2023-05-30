<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public static function check_user_access(?User $activeRecord = null)
    {
        $user = Auth::user();

        if ($activeRecord) {

            // admin trying to open hr/employee/own account = 200
            // hr tryin to open employee/own account = 200
            // employee trying to own = 200
            if (
                ($user->id === $activeRecord->id) ||
                ($user->type === User::TYPE_ADMIN) ||
                ($user->type === User::TYPE_HR && $activeRecord->type === User::TYPE_EMPLOYEE)
            ) {
                return true;
            }

            // hr trying to open admin = 403
            // employee trying to open other types = 403
            if (
                ($user->type === User::TYPE_HR && $activeRecord->type === User::TYPE_ADMIN) ||
                ($user->type === User::TYPE_EMPLOYEE && $user->id !== $activeRecord->id)
            ) {
                return false;
            }
        } else {
            if ($user->type !== User::TYPE_ADMIN) {
                return false;
            }
            return true;
        }
    }
}
