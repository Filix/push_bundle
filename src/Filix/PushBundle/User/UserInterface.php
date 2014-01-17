<?php
namespace Filix\PushBundle\User;

use Filix\PushBundle\Client\ClientInterface;

/**
 * UserInterface
 *
 * @author Filix
 */
interface UserInterface
{
//    public function getUserId();
//    
//    public function setUserId();
    
    public function addClient(ClientInterface $client);
    
    public function getClients();
    
}
