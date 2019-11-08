<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Banks Controller
 *
 * @property \App\Model\Table\BanksTable $Banks
 *
 * @method \App\Model\Entity\Bank[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BanksController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Managers', 'Users']
        ];
        $banks = $this->Banks->find('all');

        $this->set(compact('banks'));
    }

    /**
     * View method
     *
     * @param string|null $id Bank id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $bank = $this->Banks->get($id, [
            'contain' => ['Managers', 'Users', 'Sellers', 'Photos', "Owners", "Settings" => [
        'sort' => ['Settings.type' => 'ASC']
    ]]
        ]);

        $this->set('bank', $bank);
    }

    /**
     * View method
     *
     * @param string|null $id Bank id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view2($id = null)
    {
        if($this->request->is(['post'])){
            $banks = $this->Banks->find('all', array('conditions' => array('name' => $this->request->data['name'])));
            foreach($banks as $bank){
                $id = $bank->id;
            }
        }
        if(!empty($id)){
            $bank = $this->Banks->get($id, [
            'contain' => ['Managers', 'Users', 'Sellers', 'Photos', "Owners", "Settings" => [
        'sort' => ['Settings.type' => 'ASC']
    ]]
        ]);
        }else{
            $this->redirect($this->referer());
        }
        

        $this->set('bank', $bank);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $bank = $this->Banks->newEntity();
        if ($this->request->is('post')) {
            // debug($this->request->data); debug($_FILES);
            $bank = $this->Banks->patchEntity($bank, $this->request->getData());
            $bank->settings = $this->request->data['settings'];
            if(!empty($this->request->data['manager_id'])){
                $bank->manager = $this->Banks->Managers->get($this->request->data['manager_id']);
            }else{
                $bank->manager->ci = "";
                $bank->manager->contrat = "";
            }

            if(!empty($this->request->data['owner_id'])){
                $bank->owner = $this->Banks->Owners->get($this->request->data['owner_id']);
            }else{
                $bank->owner->ci = "";
                $bank->owner->contrat = "";
            }

            if(!empty($this->request->data['seller_id'])){
                $bank->sellers[0] = $this->Banks->Sellers->get($this->request->data['seller_id']);
            }else{
                $bank->sellers[0]->user_id = $this->Auth->user()['id'];
                $bank->sellers[0]->ci = "";
                $bank->sellers[0]->contrat = "";
            }

            $bank->user_id = $this->Auth->user()['id'];

            if ($newBank = $this->Banks->save($bank, ['associated' => ['Managers', "Sellers", 'Owners', 'Settings']])) {
                $newestBank = $this->Banks->get($newBank['id']);
                $settingsList = array();
                foreach($this->request->data['settings'] as $setting){
                    $newSetting = $this->Banks->SettingsBanks->newEntity($setting);
                    $newSetting->bank_id = $newBank['id'];
                    $this->Banks->SettingsBanks->save($newSetting);
                }
                $this->Banks->Settings->link($newestBank, $settingsList);

                foreach($this->request->data['Photos']['location'] as $photo){
                    $location = $this->checkFile($photo, "photo_".rand(1000000,9999999), 1);
                    $newPhoto = $this->Banks->Photos->newEntity();
                    $newPhoto->bank_id = $newBank['id'];
                    $newPhoto->location = $location;
                    $this->Banks->Photos->save($newPhoto);
                }

                if(!empty($this->request->data['seller_id'])){
                    $seller = $this->Banks->Sellers->get($this->request->data['seller_id']);
                    $seller->bank_id = $newBank['id']; 
                    $this->Banks->Sellers->save($seller);
                }else{
                    $seller = $this->Banks->Sellers->get($newBank['sellers'][0]->id);
                    $seller->namager_id = $newBank['manager_id'];
                    $this->Banks->Sellers->save($seller);

                }

                if(!empty($this->request->data['manager']['ci']['tmp_name'])){
                    $ci = $this->checkFile($this->request->data['manager']['ci'], "mci_".$newBank['id'], 1); 
                    $manager = $this->Banks->Managers->get($newBank['manager_id']);
                    $manager->ci = $ci;
                    $this->Banks->Managers->save($manager);
                }

                if(!empty($this->request->data['manager']['contrat']['tmp_name'])){
                    $contrat = $this->checkFile($this->request->data['manager']['contrat'], "mcontrat_".$newBank['id'], 1); 
                    $manager = $this->Banks->Managers->get($newBank['manager_id']);
                    $manager->contrat = $contrat;
                    $this->Banks->Managers->save($manager);
                }

                if(!empty($this->request->data['sellers'][0]['ci']['tmp_name'])){
                    $ci = $this->checkFile($this->request->data['sellers'][0]['ci'], "sci_".$newBank['sellers'][0]->id, 1); 
                    $seller = $this->Banks->Sellers->get($newBank['sellers'][0]->id);
                    $seller->ci = $ci;
                    $this->Banks->Sellers->save($seller);
                }

                if(!empty($this->request->data['sellers'][0]['contrat']['tmp_name'])){
                    $contrat = $this->checkFile($this->request->data['sellers'][0]['contrat'], "scontrat_".$newBank['id'], 1); 
                    $seller = $this->Banks->Sellers->get($newBank['sellers'][0]->id);
                    $seller->contrat = $contrat;
                    $this->Banks->Sellers->save($seller);
                }

                $this->Flash->success(__('The bank has been saved.'));

                return $this->redirect(['action' => 'edit', $newBank['id']]);
            }
            $this->Flash->error(__('The bank could not be saved. Please, try again.'));
        }
        $managers = $this->Banks->Managers->find('list');
        $sellers = $this->Banks->Sellers->find('list');
        $owners = $this->Banks->Owners->find('list');
        $settings = $this->Banks->Settings->find('all', array("order" => array("type ASC", 'name ASC')));
        $this->set(compact('bank', 'managers', 'users', "sellers", "owners", 'settings'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Bank id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $bank = $this->Banks->get($id, [
            'contain' => ['Owners', "Sellers", "Managers", "Photos", "Settings"  => [
        'sort' => ['Settings.type' => 'ASC']] ]
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $bank = $this->Banks->get($id, [
            'contain' => []
        ]);
            $bank = $this->Banks->patchEntity($bank, $this->request->getData());

            // debug($bank); die();
            if ($newBank = $this->Banks->save($bank)) {
                if(!empty($this->request->data['seller_id'])){
                    $seller = $this->Banks->Sellers->get($this->request->data['seller_id']);
                    $seller->bank_id = $newBank['id'];
                    $this->Banks->Sellers->save($seller);
                }

                foreach($this->request->data['settings'] as $set){
                    $setting = $this->Banks->SettingsBanks->get($set['id']);
                    $setting = $this->Banks->SettingsBanks->patchEntity($setting, $set);
                    $this->Banks->SettingsBanks->save($setting);
                }
                foreach($this->request->data['Photos']['location'] as $photo){
                    if(!empty($photo['tmp_name'])){
                        $location = $this->checkFile($photo, "photo_".rand(1000000,9999999), 1);
                    $newPhoto = $this->Banks->Photos->newEntity();
                    $newPhoto->bank_id = $newBank['id'];
                    $newPhoto->location = $location;
                    $this->Banks->Photos->save($newPhoto);
                    }
                    
                }
                $this->Flash->success(__('The bank has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The bank could not be saved. Please, try again.'));
        }
        $managers = $this->Banks->Managers->find('list');
        $sellers = $this->Banks->Sellers->find('list');
        $owners = $this->Banks->Owners->find('list');
        $this->set(compact('bank', 'managers', 'sellers', "owners"));
    }

    /**
     * Delete method
     *
     * @param string|null $id Bank id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete', 'get']);
        $bank = $this->Banks->get($id);
        if ($this->Banks->delete($bank)) {
            $this->Flash->success(__('The bank has been deleted.'));
        } else {
            $this->Flash->error(__('The bank could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function map(){
         $banks = $this->Banks->find('all');
         $this->set(compact('banks'));
    }
}
