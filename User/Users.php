<?php
namespace Filix\PushBundle\User;

use Filix\PushBundle\Common\ArrayCollection\ArrayCollection;
/**
 * Users
 *
 * @author Filix
 */
class Users implements UsersInterface
{
    protected $users;
    
    public function __construct()
    {
        $this->users = new ArrayCollection();
    }
    
    public function addUser(UserInterface $user)
    {
        $this->users->add($user);
        
        return $this;
    }

    public function getUsers()
    {
        return $this->users;
    }

}
