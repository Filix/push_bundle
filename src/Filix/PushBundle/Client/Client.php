<?php
namespace Filix\PushBundle\Client;

use Filix\PushBundle\Model\ClientInterface;
/**
 * Description of Client
 *
 * @author Filix
 */
class Client implements ClientInterface
{
    protected $client_id;

    public function getClientId()
    {
        return $this->client_id;
    }

    public function setClientId($client_id)
    {
        $this->client_id = $client_id;
        
        return $this;
    }

}
