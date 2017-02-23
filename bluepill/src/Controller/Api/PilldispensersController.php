<?php
namespace App\Controller\Api;

use Cake\Event\Event;
use Cake\Network\Exception\UnauthorizedException;
use Cake\Utility\Security;
use Firebase\JWT\JWT;

class PilldispensersController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['activatepilldispenser']);
    }


    public function activatepilldispenser($code = null)
    {
        if($code == null)throw new Exception("Error Processing Request", 1);


    
        $pilldispenser =   $this->Pilldispensers->find("all")->where('code = '.$code)->first();
        $pilldispenser = $this->Pilldispensers->patchEntity($pilldispenser, $this->request->data);
        if ($this->Pilldispensers->save($pilldispenser)) 
           $this->set(['success' => true, 'data' => ['pill' => $pilldispenser], '_serialize' => ['success', 'data']]);
        else
            $this->set(['success' => false, 'data' => [], '_serialize' => ['success', 'data']]);
            
    }

}