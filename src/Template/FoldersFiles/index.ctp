<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FoldersFile[]|\Cake\Collection\CollectionInterface $foldersFiles
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Folders File'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Folders'), ['controller' => 'Folders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Folder'), ['controller' => 'Folders', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Files'), ['controller' => 'Files', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New File'), ['controller' => 'Files', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="foldersFiles index large-9 medium-8 columns content">
    <h3><?= __('Folders Files') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('folder_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('file_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('position') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($foldersFiles as $foldersFile): ?>
            <tr>
                <td><?= $this->Number->format($foldersFile->id) ?></td>
                <td><?= $foldersFile->has('folder') ? $this->Html->link($foldersFile->folder->name, ['controller' => 'Folders', 'action' => 'view', $foldersFile->folder->id]) : '' ?></td>
                <td><?= $foldersFile->has('file') ? $this->Html->link($foldersFile->file->name, ['controller' => 'Files', 'action' => 'view', $foldersFile->file->id]) : '' ?></td>
                <td><?= $this->Number->format($foldersFile->position) ?></td>
                <td><?= h($foldersFile->created) ?></td>
                <td><?= h($foldersFile->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $foldersFile->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $foldersFile->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $foldersFile->id], ['confirm' => __('Are you sure you want to delete # {0}?', $foldersFile->id)]) ?>
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
