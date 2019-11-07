<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SettingsBank[]|\Cake\Collection\CollectionInterface $settingsBanks
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Settings Bank'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Banks'), ['controller' => 'Banks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Bank'), ['controller' => 'Banks', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Settings'), ['controller' => 'Settings', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Setting'), ['controller' => 'Settings', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="settingsBanks index large-9 medium-8 columns content">
    <h3><?= __('Settings Banks') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('bank_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('setting_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('price') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('quantity') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($settingsBanks as $settingsBank): ?>
            <tr>
                <td><?= $this->Number->format($settingsBank->id) ?></td>
                <td><?= $settingsBank->has('bank') ? $this->Html->link($settingsBank->bank->name, ['controller' => 'Banks', 'action' => 'view', $settingsBank->bank->id]) : '' ?></td>
                <td><?= $settingsBank->has('setting') ? $this->Html->link($settingsBank->setting->name, ['controller' => 'Settings', 'action' => 'view', $settingsBank->setting->id]) : '' ?></td>
                <td><?= $this->Number->format($settingsBank->price) ?></td>
                <td><?= h($settingsBank->date) ?></td>
                <td><?= $this->Number->format($settingsBank->quantity) ?></td>
                <td><?= $this->Number->format($settingsBank->status) ?></td>
                <td><?= h($settingsBank->created) ?></td>
                <td><?= h($settingsBank->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $settingsBank->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $settingsBank->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $settingsBank->id], ['confirm' => __('Are you sure you want to delete # {0}?', $settingsBank->id)]) ?>
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
