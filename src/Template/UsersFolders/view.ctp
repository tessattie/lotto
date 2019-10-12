<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UsersFolder $usersFolder
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Users Folder'), ['action' => 'edit', $usersFolder->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Users Folder'), ['action' => 'delete', $usersFolder->id], ['confirm' => __('Are you sure you want to delete # {0}?', $usersFolder->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users Folders'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Users Folder'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Folders'), ['controller' => 'Folders', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Folder'), ['controller' => 'Folders', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="usersFolders view large-9 medium-8 columns content">
    <h3><?= h($usersFolder->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $usersFolder->has('user') ? $this->Html->link($usersFolder->user->id, ['controller' => 'Users', 'action' => 'view', $usersFolder->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Folder') ?></th>
            <td><?= $usersFolder->has('folder') ? $this->Html->link($usersFolder->folder->name, ['controller' => 'Folders', 'action' => 'view', $usersFolder->folder->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($usersFolder->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $this->Number->format($usersFolder->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($usersFolder->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($usersFolder->modified) ?></td>
        </tr>
    </table>
</div>
