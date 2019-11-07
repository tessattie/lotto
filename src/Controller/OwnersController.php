<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Owners Controller
 *
 * @property \App\Model\Table\OwnersTable $Owners
 *
 * @method \App\Model\Entity\Owner[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OwnersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $owners = $this->paginate($this->Owners);

        $this->set(compact('owners'));
    }

    /**
     * View method
     *
     * @param string|null $id Owner id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $owner = $this->Owners->get($id, [
            'contain' => []
        ]);

        $this->set('owner', $owner);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $owner = $this->Owners->newEntity();
        if ($this->request->is('post')) {
            // debug($this->request->data); die();
            $owner = $this->Owners->patchEntity($owner, $this->request->getData());
            $owner->ci = '';
            $owner->contrat = '';
            if ($id = $this->Owners->save($owner)) {
                $new = $this->Owners->get($id['id']);
                if(!empty($this->request->data['ci']['tmp_name'])){
                    $ci = $this->checkFile($this->request->data['ci'], "oci_".$id['id'], 1); 
                    $new->ci = $ci;
                }

                if(!empty($this->request->data['contrat']['tmp_name'])){
                    $contrat = $this->checkFile($this->request->data['contrat'], "ocontrat_".$id['id'], 1); 
                    $new->contrat = $contrat;
                }

                
                $this->Owners->save($new);                

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The owner could not be saved. Please, try again.'));
        }
        $this->set(compact('owner'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Owner id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $owner = $this->Owners->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            // debug($this->request->data); die();
            if(empty($this->request->data['ci']['tmp_name'])){
                unset($this->request->data['ci']);
            }

            if(empty($this->request->data['contrat']['tmp_name'])){
                unset($this->request->data['contrat']);
            }

            $owner = $this->Owners->patchEntity($owner, $this->request->getData());

            if(!empty($this->request->data['ci']['tmp_name'])){
                $ci = $this->checkFile($this->request->data['ci'], "oci_" . $owner->id, 1);
                $owner->ci = $ci;
            }

            if(!empty($this->request->data['contrat']['tmp_name'])){
                $contrat = $this->checkFile($this->request->data['contrat'], "ocontrat_" . $owner->id, 1);
                $owner->contrat = $contrat;
            }

            if ($this->Owners->save($owner)) {
                $this->Flash->success(__('The owner has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The owner could not be saved. Please, try again.'));
        }
        $this->set(compact('owner'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Owner id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete', 'get']);
        $owner = $this->Owners->get($id);
        if ($this->Owners->delete($owner)) {
            $this->Flash->success(__('The owner has been deleted.'));
        } else {
            $this->Flash->error(__('The owner could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
