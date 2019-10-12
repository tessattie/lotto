<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * UsersFolders Controller
 *
 * @property \App\Model\Table\UsersFoldersTable $UsersFolders
 *
 * @method \App\Model\Entity\UsersFolder[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersFoldersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Folders']
        ];
        $usersFolders = $this->paginate($this->UsersFolders);

        $this->set(compact('usersFolders'));
    }

    /**
     * View method
     *
     * @param string|null $id Users Folder id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $usersFolder = $this->UsersFolders->get($id, [
            'contain' => ['Users', 'Folders']
        ]);

        $this->set('usersFolder', $usersFolder);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $usersFolder = $this->UsersFolders->newEntity();
        if ($this->request->is('post')) {
            $usersFolder = $this->UsersFolders->patchEntity($usersFolder, $this->request->getData());
            if ($this->UsersFolders->save($usersFolder)) {
                $this->Flash->success(__('The users folder has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The users folder could not be saved. Please, try again.'));
        }
        $users = $this->UsersFolders->Users->find('list', ['limit' => 200]);
        $folders = $this->UsersFolders->Folders->find('list', ['limit' => 200]);
        $this->set(compact('usersFolder', 'users', 'folders'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Users Folder id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $usersFolder = $this->UsersFolders->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $usersFolder = $this->UsersFolders->patchEntity($usersFolder, $this->request->getData());
            if ($this->UsersFolders->save($usersFolder)) {
                $this->Flash->success(__('The users folder has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The users folder could not be saved. Please, try again.'));
        }
        $users = $this->UsersFolders->Users->find('list', ['limit' => 200]);
        $folders = $this->UsersFolders->Folders->find('list', ['limit' => 200]);
        $this->set(compact('usersFolder', 'users', 'folders'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Users Folder id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $usersFolder = $this->UsersFolders->get($id);
        if ($this->UsersFolders->delete($usersFolder)) {
            $this->Flash->success(__('The users folder has been deleted.'));
        } else {
            $this->Flash->error(__('The users folder could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
