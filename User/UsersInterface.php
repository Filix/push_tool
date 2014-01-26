<?php
namespace Filix\PushBundle\User;

/**
 * UsersInterface
 *
 * @author Filix
 */
interface UsersInterface
{
    /*
     * add user
     * 
     * @param $user user
     * 
     * @return self
     */
    public function addUser(UserInterface $user);
    
    
    /*
     * get users
     * 
     * @return ArrayCollection
     */
    public function getUsers();
}
