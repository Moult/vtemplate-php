<?php

class View_Cms extends View_Layout
{
    public function logged_in()
    {
        return (bool) Session::instance()->get('cms_logged_in', FALSE);
    }
}
