<?php
// Třída RoomsPolicy definuje autorizační policies pro model Room na základě uživatelovi role
namespace App\Policies;

use App\Room;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RoomsPolicy
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
