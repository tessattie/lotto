<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FoldersFile $foldersFile
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $foldersFile->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $foldersFile->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Folders Files'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Folders'), ['controller' => 'Folders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Folder'), ['controller' => 'Folders', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Files'), ['controller' => 'Files', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New File'), ['controller' => 'Files', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="foldersFiles form large-9 medium-8 columns content">
    <?= $this->Form->create($foldersFile) ?>
    <fieldset>
        <legend><?= __('Edit Folders File') ?></legend>
        <?php
            echo $this->Form->control('folder_id', ['options' => $folders]);
            echo $this->Form->control('file_id', ['options' => $files]);
            echo $this->Form->control('position');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
