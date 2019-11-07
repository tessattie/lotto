<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bank $bank
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $bank->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $bank->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Banks'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Managers'), ['controller' => 'Managers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Manager'), ['controller' => 'Managers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sellers'), ['controller' => 'Sellers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Seller'), ['controller' => 'Sellers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="banks form large-9 medium-8 columns content">
    <?= $this->Form->create($bank) ?>
    <fieldset>
        <legend><?= __('Edit Bank') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('manager_id', ['options' => $managers, 'empty' => true]);
            echo $this->Form->control('address');
            echo $this->Form->control('lattitude');
            echo $this->Form->control('longitude');
            echo $this->Form->control('rooms');
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('rental_date', ['empty' => true]);
            echo $this->Form->control('price');
            echo $this->Form->control('expiration', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
