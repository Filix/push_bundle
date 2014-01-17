<?php
namespace Filix\PushBundle\Model;

use Filix\PushBundle\Model\NoticeMessageInterface;

/**
 * BaiduNoticeMessage
 *
 * @author Filix
 */
class BaiduNoticeMessage extends NoticeMessage
{
    public function getId(){
        return md5(urlencode($this->getTitle() . '_' .$this->getContent() . $this->getBasicStyle()));
    }
    
    public function getBasicStyle(){
        $style = 0;
        $style += $this->isRang() ? 4 : 0;
        $style += $this->isShake() ? 2 : 0;
        $style += $this->isClearable() ? 1 : 0;
        return $style;
    }
}
