<?php
namespace Filix\PushBundle\Util;

use Filix\PushBundle\Model\NoticeMessageInterface;
use Filix\PushBundle\User\UserInterface;

interface PusherInterface
{
    public function getSdkInstance();
    
    
    public function getType();
    
    /*
     * 向应用推送通知
     */
    public function pushNoticeToApp();
    
    /*
     * 向单个用户推送通知
     */
    public function pushNoticeToUser(NoticeMessageInterface $message, UserInterface $user);
    
    /*
     * 向一组用户推送通知
     */
    public function pushNoticeToUsers();
    
    /*
     * 向某个客户端推送通知
     */
    public function pushNoticeToClient();
    
    /*
     * 向应用推送消息
     */
    public function pushMessageToApp();
    
    /*
     * 向单个用户推送消息
     */
    public function pushMessageToUser();
    
    /*
     * 向一组用户推送消息
     */
    public function pushMessageToUsers();
    
    /*
     * 向某个客户端推送消息
     */
    public function pushMessageToClient();
    
    /*
     * 打标签
     */
    public function addTag();
    
    /*
     * 向标签推送通知
     */
    public function sendNoticeToTag();
    
    /*
     * 向标签推送消息
     */
    public function sendMessageToTag();
    
}
