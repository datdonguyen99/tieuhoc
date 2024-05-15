<?php
class User_Controller extends Frontend_Controller
{
    /**
     * summary
     */
    public function __construct()
    {
        parent::__construct();
        $user = User_model::GetAuthSession();
        if(empty($user))
        	redirect('/');
        $this->temp['data']['waring'] = User_model::CheckAuthIsConfirm($user);
        $this->temp['data']['user_info'] = $user;
    }
}
