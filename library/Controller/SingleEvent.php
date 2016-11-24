<?php
namespace HSO\Controller;

use \HSOEventManager\Event;

class SingleEvent extends \Municipio\Controller\BaseController
{
    public function init(){
        $event = new Event();
        $this->data['event_data'] = $event->get_event(get_the_ID());
    }
}
