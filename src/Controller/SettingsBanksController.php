<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * SettingsBanks Controller
 *
 * @property \App\Model\Table\SettingsBanksTable $SettingsBanks
 *
 * @method \App\Model\Entity\SettingsBank[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SettingsBanksController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Banks', 'Settings']
        ];
        $settingsBanks = $this->paginate($this->SettingsBanks);

        $this->set(compact('settingsBanks'));
    }

    /**
     * View method
     *
     * @param string|null $id Settings Bank id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $settingsBank = $this->SettingsBanks->get($id, [
            'contain' => ['Banks', 'Settings']
        ]);

        $this->set('settingsBank', $settingsBank);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $settingsBank = $this->SettingsBanks->newEntity();
        if ($this->request->is('post')) {
            $settingsBank = $this->SettingsBanks->patchEntity($settingsBank, $this->request->getData());
            if ($this->SettingsBanks->save($settingsBank)) {
                $this->Flash->success(__('The settings bank has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The settings bank could not be saved. Please, try again.'));
        }
        $banks = $this->SettingsBanks->Banks->find('list', ['limit' => 200]);
        $settings = $this->SettingsBanks->Settings->find('list', ['limit' => 200]);
        $this->set(compact('settingsBank', 'banks', 'settings'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Settings Bank id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $settingsBank = $this->SettingsBanks->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $settingsBank = $this->SettingsBanks->patchEntity($settingsBank, $this->request->getData());
            if ($this->SettingsBanks->save($settingsBank)) {
                $this->Flash->success(__('The settings bank has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The settings bank could not be saved. Please, try again.'));
        }
        $banks = $this->SettingsBanks->Banks->find('list', ['limit' => 200]);
        $settings = $this->SettingsBanks->Settings->find('list', ['limit' => 200]);
        $this->set(compact('settingsBank', 'banks', 'settings'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Settings Bank id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $settingsBank = $this->SettingsBanks->get($id);
        if ($this->SettingsBanks->delete($settingsBank)) {
            $this->Flash->success(__('The settings bank has been deleted.'));
        } else {
            $this->Flash->error(__('The settings bank could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
