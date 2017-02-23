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
        $this->Auth->allow(['add']);
    }


    public function basicinfo($id = null)
    {
    	if($id==null)
			$this->set(['success' => false, 'data' => [], '_serialize' => ['success', 'data']]);
		$profile =  $this->Profiles->find('all', ['fields'=>['name','surname','profile_picture']])->where('id_user = '.$id)->toArray();

		if($profile != null)
		$this->set(['success' => true, 
            'data' => ['picture' => $profile[0]->toArray()['profile_picture'],
                        'name'=> $profile[0]->toArray()['name'],
                        'surname'=> $profile[0]->toArray()['surname']
                        ],
             '_serialize' => ['success', 'data']]);
		else
		$this->set(['success' => false, 'data' => [], '_serialize' => ['success', 'data']]);
    }


}