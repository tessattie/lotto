<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Furnitures Controller
 *
 * @property \App\Model\Table\FurnituresTable $Furnitures
 *
 * @method \App\Model\Entity\Furniture[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FurnituresController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $furnitures = $this->paginate($this->Furnitures);

        $this->set(compact('furnitures'));
    }

    /**
     * View method
     *
     * @param string|null $id Furniture id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $furniture = $this->Furnitures->get($id, [
            'contain' => []
        ]);

        $this->set('furniture', $furniture);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $furniture = $this->Furnitures->newEntity();
        if ($this->request->is('post')) {
            $furniture = $this->Furnitures->patchEntity($furniture, $this->request->getData());
            if ($this->Furnitures->save($furniture)) {
                $this->Flash->success(__('The furniture has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The furniture could not be saved. Please, try again.'));
        }
        $this->set(compact('furniture'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Furniture id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $furniture = $this->Furnitures->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $furniture = $this->Furnitures->patchEntity($furniture, $this->request->getData());
            if ($this->Furnitures->save($furniture)) {
                $this->Flash->success(__('The furniture has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The furniture could not be saved. Please, try again.'));
        }
        $this->set(compact('furniture'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Furniture id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete', 'get']);
        $furniture = $this->Furnitures->get($id);
        if ($this->Furnitures->delete($furniture)) {
            $this->Flash->success(__('The furniture has been deleted.'));
        } else {
            $this->Flash->error(__('The furniture could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
