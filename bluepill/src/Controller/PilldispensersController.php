<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Pilldispensers Controller
 *
 * @property \App\Model\Table\PilldispensersTable $Pilldispensers
 */
class PilldispensersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $pilldispensers = $this->paginate($this->Pilldispensers);

        $this->set(compact('pilldispensers'));
        $this->set('_serialize', ['pilldispensers']);
    }

    /**
     * View method
     *
     * @param string|null $id Pilldispenser id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pilldispenser = $this->Pilldispensers->get($id, [
            'contain' => []
        ]);

        $this->set('pilldispenser', $pilldispenser);
        $this->set('_serialize', ['pilldispenser']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pilldispenser = $this->Pilldispensers->newEntity();
        if ($this->request->is('post')) {
            $pilldispenser = $this->Pilldispensers->patchEntity($pilldispenser, $this->request->data);
            if ($this->Pilldispensers->save($pilldispenser)) {
                $this->Flash->success(__('The pilldispenser has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pilldispenser could not be saved. Please, try again.'));
        }
        $this->set(compact('pilldispenser'));
        $this->set('_serialize', ['pilldispenser']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Pilldispenser id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pilldispenser = $this->Pilldispensers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pilldispenser = $this->Pilldispensers->patchEntity($pilldispenser, $this->request->data);
            if ($this->Pilldispensers->save($pilldispenser)) {
                $this->Flash->success(__('The pilldispenser has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pilldispenser could not be saved. Please, try again.'));
        }
        $this->set(compact('pilldispenser'));
        $this->set('_serialize', ['pilldispenser']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Pilldispenser id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pilldispenser = $this->Pilldispensers->get($id);
        if ($this->Pilldispensers->delete($pilldispenser)) {
            $this->Flash->success(__('The pilldispenser has been deleted.'));
        } else {
            $this->Flash->error(__('The pilldispenser could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
