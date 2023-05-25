<?php
// Třída EmployeesPolicy definuje autorizační policies pro akce souvicející se zaměstnanci na základě role uživatele
namespace App\Policies;

use App\Employee;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class EmployeesPolicy
{
    use HandlesAuthorization;
		public function show(User $user){
			return $user;
		}
    public function edit(User $user)
    {
			return $user->admin;
		}
}
