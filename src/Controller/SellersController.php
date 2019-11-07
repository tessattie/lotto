<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Sellers Controller
 *
 * @property \App\Model\Table\SellersTable $Sellers
 *
 * @method \App\Model\Entity\Seller[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SellersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $sellers = $this->Sellers->find("all")->contain(['Managers', 'Banks', 'Users']);

        $this->set(compact('sellers'));
    }

    /**
     * View method
     *
     * @param string|null $id Seller id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $seller = $this->Sellers->get($id, [
            'contain' => ['Managers', 'Banks', 'Users']
        ]);

        $this->set('seller', $seller);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $seller = $this->Sellers->newEntity();
        if ($this->request->is('post')) {
            // debug($this->request->data); die();
            $seller = $this->Sellers->patchEntity($seller, $this->request->getData());
            $seller->ci = '';
            $seller->contrat = '';
            $seller->user_id = $this->Auth->user()['id'];
            if ($id = $this->Sellers->save($seller)) {
                $new = $this->Sellers->get($id['id']);
                if(!empty($this->request->data['ci']['tmp_name'])){
                    $ci = $this->checkFile($this->request->data['ci'], "sci_".$id['id'], 1); 
                    $new->ci = $ci;
                }

                if(!empty($this->request->data['contrat']['tmp_name'])){
                    $contrat = $this->checkFile($this->request->data['contrat'], "scontrat_".$id['id'], 1); 
                    $new->contrat = $contrat;
                }
                
                $this->Sellers->save($new);                

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The owner could not be saved. Please, try again.'));
        }
        $managers = $this->Sellers->Managers->find('list', ['limit' => 200]);
        $banks = $this->Sellers->Banks->find('list', ['limit' => 200]);
        $users = $this->Sellers->Users->find('list', ['limit' => 200]);
        $this->set(compact('seller', 'managers', 'banks', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Seller id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $seller = $this->Sellers->get($id, [
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

            $seller = $this->Sellers->patchEntity($seller, $this->request->getData());

            if(!empty($this->request->data['ci']['tmp_name'])){
                $ci = $this->checkFile($this->request->data['ci'], "oci_" . $seller->id, 1);
                $seller->ci = $ci;
            }

            if(!empty($this->request->data['contrat']['tmp_name'])){
                $contrat = $this->checkFile($this->request->data['contrat'], "ocontrat_" . $seller->id, 1);
                $seller->contrat = $contrat;
            }

            if ($this->Sellers->save($seller)) {
                $this->Flash->success(__('The seller has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The seller could not be saved. Please, try again.'));
        }
        $managers = $this->Sellers->Managers->find('list', ['limit' => 200]);
        $banks = $this->Sellers->Banks->find('list', ['limit' => 200]);
        $users = $this->Sellers->Users->find('list', ['limit' => 200]);
        $this->set(compact('seller', 'managers', 'banks', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Seller id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete', 'get']);
        $seller = $this->Sellers->get($id);
        if ($this->Sellers->delete($seller)) {
            $this->Flash->success(__('The seller has been deleted.'));
        } else {
            $this->Flash->error(__('The seller could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
