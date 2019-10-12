<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UsersFolder[]|\Cake\Collection\CollectionInterface $usersFolders
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Users Folder'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Folders'), ['controller' => 'Folders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Folder'), ['controller' => 'Folders', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="usersFolders index large-9 medium-8 columns content">
    <h3><?= __('Users Folders') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('folder_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usersFolders as $usersFolder): ?>
            <tr>
                <td><?= $this->Number->format($usersFolder->id) ?></td>
                <td><?= $usersFolder->has('user') ? $this->Html->link($usersFolder->user->id, ['controller' => 'Users', 'action' => 'view', $usersFolder->user->id]) : '' ?></td>
                <td><?= $usersFolder->has('folder') ? $this->Html->link($usersFolder->folder->name, ['controller' => 'Folders', 'action' => 'view', $usersFolder->folder->id]) : '' ?></td>
                <td><?= $this->Number->format($usersFolder->status) ?></td>
                <td><?= h($usersFolder->created) ?></td>
                <td><?= h($usersFolder->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $usersFolder->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $usersFolder->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $usersFolder->id], ['confirm' => __('Are you sure you want to delete # {0}?', $usersFolder->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
