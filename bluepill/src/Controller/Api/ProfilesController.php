<?php
namespace App\Controller\Api;

use Cake\Event\Event;
use Cake\Network\Exception\UnauthorizedException;
use Cake\Utility\Security;
use Firebase\JWT\JWT;

class ProfilesController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow([]);
    }


}