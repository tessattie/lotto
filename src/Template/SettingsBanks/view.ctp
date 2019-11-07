<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SettingsBank $settingsBank
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Settings Bank'), ['action' => 'edit', $settingsBank->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Settings Bank'), ['action' => 'delete', $settingsBank->id], ['confirm' => __('Are you sure you want to delete # {0}?', $settingsBank->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Settings Banks'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Settings Bank'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Banks'), ['controller' => 'Banks', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Bank'), ['controller' => 'Banks', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Settings'), ['controller' => 'Settings', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Setting'), ['controller' => 'Settings', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="settingsBanks view large-9 medium-8 columns content">
    <h3><?= h($settingsBank->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Bank') ?></th>
            <td><?= $settingsBank->has('bank') ? $this->Html->link($settingsBank->bank->name, ['controller' => 'Banks', 'action' => 'view', $settingsBank->bank->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Setting') ?></th>
            <td><?= $settingsBank->has('setting') ? $this->Html->link($settingsBank->setting->name, ['controller' => 'Settings', 'action' => 'view', $settingsBank->setting->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($settingsBank->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Price') ?></th>
            <td><?= $this->Number->format($settingsBank->price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Quantity') ?></th>
            <td><?= $this->Number->format($settingsBank->quantity) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $this->Number->format($settingsBank->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date') ?></th>
            <td><?= h($settingsBank->date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($settingsBank->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($settingsBank->modified) ?></td>
        </tr>
    </table>
</div>
