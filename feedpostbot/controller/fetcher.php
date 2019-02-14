<?php
namespace ger\feedpostbot\controller;
use \Symfony\Component\HttpFoundation\Response;

class fetcher
{
    protected $feedpostbot;

    public function __construct(\ger\feedpostbot\classes\driver $feedpostbot)
    {
        $this->feedpostbot = $feedpostbot;
    }

    public function handle()
    {
        $mode = '';
        switch ($mode)
        {
        default:
            $this->feedpostbot->fetch_all();
            break;
        }
        trigger_error('Fetching Feed...');
    }

}
