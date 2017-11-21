<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 15.11.2017
 * Time: 22:40
 */

namespace App\Services;

use App\Repositories\UserRepository;
use Illuminate\Database\Eloquent\Collection;

class UserService
{
    /** @var UserRepository  */
    protected $userRepository;

    /**
     * UserService constructor.
     *
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Get all users from database.
     *
     * @return Collection|static[]
     */
    public function getAll() : Collection
    {
        return $this->userRepository->getAll();
    }

}