<?php

namespace Filix\PushBundle\Util;

use Filix\PushBundle\Util\PusherInterface;
use Filix\PushBundle\Util\Baidu\Baidu;
use Filix\PushBundle\Model\BaiduNoticeMessage;
use Filix\PushBundle\Model\UserInterface;
use Filix\PushBundle\Model\NoticeMessageInterface;
use Filix\PushBundle\Client\BaiduClient;

/**
 * Baidu Push Service
 *
 * @author Filix
 */
class BaiduPusher implements PusherInterface
{

    const TYPE = 'BAIDU';

    protected $sdk;

    public function getSdkInstance()
    {
        if ($this->sdk == null) {
            $this->sdk = new Baidu('heq6CDmdglKSNpd3uOMGWFlz', 'AXFkYDYBlMzphTPm6jazM4EsstiwtNuQ');
        }
        return $this->sdk;
    }

    public function addTag()
    {
        
    }

    public function getType()
    {
        return self::TYPE;
    }

    public function pushMessageToApp()
    {
        
    }

    public function pushMessageToClient()
    {
        
    }

    public function pushMessageToUser()
    {
        
    }

    public function pushMessageToUsers()
    {
        
    }

    public function pushNoticeToApp()
    {
        
    }

    public function pushNoticeToClient(BaiduNoticeMessage $message, BaiduClient $client)
    {
        $push_type = 1; //单个人
        $optional[Baidu::MESSAGE_TYPE] = 1; //指定消息类型为通知
        $optional[Baidu::MESSAGE_EXPIRES] = $message->getOfflineTime(); //秒
        $m = array(
            'title' => $message->getTitle(),
            'description' => $message->getContent(),
            'notification_builder_id' => 0,
            'notification_basic_style' => $message->getBasicStyle(),
        );
        if ($message->getClickAction() == NoticeMessageInterface::REDIRECT_ACTION) {
            $m = array_merge($m, array('open_type' => 1, 'url' => $message->getRedirectUrl()));
        }
        $result = false;
        $clients = $user->getClients();
        $message_key = "user_msg_key:" . $message->getId();

        $optional[Baidu::USER_ID] = $client->getUserId();
        $optional[Baidu::CHANNEL_ID] = $client->getChannelId();
        $r = $this->sdk->pushMessage($push_type, $m, $message_key . '_' . $key, $optional);
        return $r ? true : false;
    }

    public function pushNoticeToUser(BaiduNoticeMessage $message, UserInterface $user)
    {
        $clients = $user->getClients();
        foreach ($clients as $client) {
            $this->pushNoticeToClient($message, $client);
        }
        return $result;
    }

    public function pushNoticeToUsers()
    {
        
    }

    public function sendMessageToTag()
    {
        
    }

    public function sendNoticeToTag()
    {
        
    }

}
