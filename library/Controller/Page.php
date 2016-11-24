<?php
namespace HSO\Controller;
class Page extends \Municipio\Controller\BaseController
{
    public function init()
    {
        $this->getHelperVariables();
    }

    public function getHelperVariables()
    {       
	    
        $this->data['hasRightSidebar'] = (isset($this->data['navigation']['sidebarMenu']) && strlen($this->data['navigation']['sidebarMenu']) > 0) || get_field('right_sidebar_always', 'option') || is_active_sidebar('right-sidebar');

        /*$this->data['hasRightSidebar'] = get_field('right_sidebar_always', 'option') || is_active_sidebar('right-sidebar');*/
        $this->data['hasLeftSidebar'] = is_active_sidebar('left-sidebar') || is_active_sidebar('left-sidebar-bottom');

        $contentGridSize = 'grid-xs-12';

        if ($this->data['hasLeftSidebar'] && $this->data['hasRightSidebar']) {
            $contentGridSize = 'grid-md-7 grid-lg-6';
        } elseif (!$this->data['hasLeftSidebar'] && $this->data['hasRightSidebar']) {
            $contentGridSize = 'grid-md-7 grid-lg-9';
        } elseif ($this->data['hasLeftSidebar'] && !$this->data['hasRightSidebar']) {
            $contentGridSize = 'grid-md-7 grid-lg-9';
        }


        $this->data['contentGridSize'] = $contentGridSize;
    }
}