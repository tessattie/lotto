<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Managers Controller
 *
 * @property \App\Model\Table\ManagersTable $Managers
 *
 * @method \App\Model\Entity\Manager[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ManagersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $managers = $this->paginate($this->Managers);

        $this->set(compact('managers'));
    }

    /**
     * View method
     *
     * @param string|null $id Manager id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $manager = $this->Managers->get($id, [
            'contain' => ['Sellers']
        ]);

        $this->set('manager', $manager);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $manager = $this->Managers->newEntity();
        if ($this->request->is('post')) {
            // debug($this->request->data); die();
            $manager = $this->Managers->patchEntity($manager, $this->request->getData());
            $manager->user_id = $this->Auth->user()['id'];
            $manager->ci = '';
            $manager->contrat = '';
            if ($id = $this->Managers->save($manager)) {
                $new = $this->Managers->get($id['id']);
                if(!empty($this->request->data['ci']['tmp_name'])){
                    $ci = $this->checkFile($this->request->data['ci'], "mci_".$id['id'], 1); 
                    $new->ci = $ci;
                }

                if(!empty($this->request->data['contrat']['tmp_name'])){
                    $contrat = $this->checkFile($this->request->data['contrat'], "mcontrat_".$id['id'], 1); 
                    $new->contrat = $contrat;
                }

                
                $this->Managers->save($new);                

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The manager could not be saved. Please, try again.'));
        }
        $this->set(compact('manager'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Manager id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $manager = $this->Managers->get($id, [
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

            $manager = $this->Managers->patchEntity($manager, $this->request->getData());

            if(!empty($this->request->data['ci']['tmp_name'])){
                $ci = $this->checkFile($this->request->data['ci'], "mci_" . $manager->id, 1);
                $manager->ci = $ci;
            }

            if(!empty($this->request->data['contrat']['tmp_name'])){
                $contrat = $this->checkFile($this->request->data['contrat'], "mcontrat_" . $manager->id, 1);
                $manager->contrat = $contrat;
            }

            if ($this->Managers->save($manager)) {
                $this->Flash->success(__('The manager has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The manager could not be saved. Please, try again.'));
        }
        $this->set(compact('manager'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Manager id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete', 'get']);
        $manager = $this->Managers->get($id);
        if ($this->Managers->delete($manager)) {
            $this->Flash->success(__('The manager has been deleted.'));
        } else {
            $this->Flash->error(__('The manager could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
