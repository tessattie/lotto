<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SettingsBank $settingsBank
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Settings Banks'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Banks'), ['controller' => 'Banks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Bank'), ['controller' => 'Banks', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Settings'), ['controller' => 'Settings', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Setting'), ['controller' => 'Settings', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="settingsBanks form large-9 medium-8 columns content">
    <?= $this->Form->create($settingsBank) ?>
    <fieldset>
        <legend><?= __('Add Settings Bank') ?></legend>
        <?php
            echo $this->Form->control('bank_id', ['options' => $banks]);
            echo $this->Form->control('setting_id', ['options' => $settings]);
            echo $this->Form->control('price');
            echo $this->Form->control('date', ['empty' => true]);
            echo $this->Form->control('quantity');
            echo $this->Form->control('status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
