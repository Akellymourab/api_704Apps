<?php

namespace App\Services\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService
{

    protected $user;

    /**
     * Undocumented function
     *
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Undocumented function
     *
     * @param array $data
     * @return void
     */
    public function login(array $data)
    {
        $user = $this->user->where('email','=',$data['email'])->first();

        if(!$user || !Hash::check($data['password'] , $user->password)){
            return false;
        }

        return $user;

    }

    /**
     * Undocumented function
     *
     * @param array $data
     * @return void
     */
    public function create(array $data)
    {
        return $this->user->create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => bcrypt($data['password'])
        ]);
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function show()
    {
        return $this->user->get();
    }


}
