<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FoldersFile $foldersFile
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Folders File'), ['action' => 'edit', $foldersFile->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Folders File'), ['action' => 'delete', $foldersFile->id], ['confirm' => __('Are you sure you want to delete # {0}?', $foldersFile->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Folders Files'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Folders File'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Folders'), ['controller' => 'Folders', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Folder'), ['controller' => 'Folders', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Files'), ['controller' => 'Files', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New File'), ['controller' => 'Files', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="foldersFiles view large-9 medium-8 columns content">
    <h3><?= h($foldersFile->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Folder') ?></th>
            <td><?= $foldersFile->has('folder') ? $this->Html->link($foldersFile->folder->name, ['controller' => 'Folders', 'action' => 'view', $foldersFile->folder->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('File') ?></th>
            <td><?= $foldersFile->has('file') ? $this->Html->link($foldersFile->file->name, ['controller' => 'Files', 'action' => 'view', $foldersFile->file->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($foldersFile->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Position') ?></th>
            <td><?= $this->Number->format($foldersFile->position) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($foldersFile->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($foldersFile->modified) ?></td>
        </tr>
    </table>
</div>
