<?php
namespace App\Controller\Api;

use Cake\Event\Event;
use Cake\Network\Exception\UnauthorizedException;
use Cake\Utility\Security;
use Firebase\JWT\JWT;

class UsersController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['add', 'token']);
    }

    public function add()
	{
	    $this->Crud->on('afterSave', function(Event $event) {
	        if ($event->subject->created) {
	            $this->set('data', [
	                'id' => $event->subject->entity->id,
	                'token' => JWT::encode(
	                    [
	                        'sub' => $event->subject->entity->id,
	                        'exp' =>  time() + 604800
	                    ],
	                Security::salt())
	            ]);
	            $this->Crud->action()->config('serialize.data', 'data');
	        }
	    });
	    return $this->Crud->execute();
	}



	public function token()
	{
	    $user = $this->Auth->identify();
	    if (!$user) {
	        throw new UnauthorizedException('Invalid username or password');
	    }

	    $this->set([
	        'success' => true,
	        'data' => [
	          	'id' => $user['id'],
	            'token' => JWT::encode([
	                'sub' => $user['id'],
	                'exp' =>  time() + 604800
	            ],
	            Security::salt())
	        ],
	        '_serialize' => ['success', 'data']
	    ]);
	}


	public function doctor($id = null)
	{
		$is_doc = false;
		if($id==null)
			$this->set(['success' => false, 'data' => [], '_serialize' => ['success', 'data']]);

		$user =  $this->Users->find('all', ['fields'=>'doctor'])->where('id = '.$id)->toArray();
		if($user!=null)
		{
			$is_doc = $user[0]->toArray()['doctor'];
			if($is_doc)
				$this->set(['success' => true, 'data' => ['doctor' => true], '_serialize' => ['success', 'data']]);
		 	else 
			    $this->set(['success' => true, 'data' => ['doctor' => false], '_serialize' => ['success', 'data']]);			
		}else
			$this->set(['success' => false, 'data' => [], '_serialize' => ['success', 'data']]);		

	}
}