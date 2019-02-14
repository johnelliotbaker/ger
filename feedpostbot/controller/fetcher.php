<?php
namespace ger\feedpostbot\controller;
use \Symfony\Component\HttpFoundation\Response;
use \phpbb\auth\auth;
use \ger\feedpostbot\classes\driver;

class fetcher
{
    protected $feedpostbot;
    protected $auth;

    public function __construct(
        driver $feedpostbot,
        auth $auth
    )
    {
        $this->feedpostbot = $feedpostbot;
        $this->auth = $auth;
    }

    public function is_mod()
    {
        return $this->auth->acl_gets('a_', 'm_');
    }

    public function reject_non_moderator()
    {
        if (!$this->is_mod())
        {
            trigger_error('Only moderators can access this page.');
        }
    }

    public function handle()
    {
        $this->reject_non_moderator();
        $mode = '';
        switch ($mode)
        {
        default:
            $this->feedpostbot->fetch_all();
            break;
        }
        trigger_error('Done fetching.');
    }

}
