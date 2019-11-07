<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Manager $manager
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Manager'), ['action' => 'edit', $manager->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Manager'), ['action' => 'delete', $manager->id], ['confirm' => __('Are you sure you want to delete # {0}?', $manager->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Managers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Manager'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sellers'), ['controller' => 'Sellers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Seller'), ['controller' => 'Sellers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="managers view large-9 medium-8 columns content">
    <h3><?= h($manager->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('First Name') ?></th>
            <td><?= h($manager->first_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Last Name') ?></th>
            <td><?= h($manager->last_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phone') ?></th>
            <td><?= h($manager->phone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address') ?></th>
            <td><?= h($manager->address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ci') ?></th>
            <td><?= h($manager->ci) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nif') ?></th>
            <td><?= h($manager->nif) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Contrat') ?></th>
            <td><?= h($manager->contrat) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($manager->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Frais Fonctionnement') ?></th>
            <td><?= $this->Number->format($manager->frais_fonctionnement) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($manager->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($manager->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Sellers') ?></h4>
        <?php if (!empty($manager->sellers)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('First Name') ?></th>
                <th scope="col"><?= __('Last Name') ?></th>
                <th scope="col"><?= __('Phone') ?></th>
                <th scope="col"><?= __('Address') ?></th>
                <th scope="col"><?= __('Nif') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Manager Id') ?></th>
                <th scope="col"><?= __('Bank Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($manager->sellers as $sellers): ?>
            <tr>
                <td><?= h($sellers->id) ?></td>
                <td><?= h($sellers->first_name) ?></td>
                <td><?= h($sellers->last_name) ?></td>
                <td><?= h($sellers->phone) ?></td>
                <td><?= h($sellers->address) ?></td>
                <td><?= h($sellers->nif) ?></td>
                <td><?= h($sellers->created) ?></td>
                <td><?= h($sellers->modified) ?></td>
                <td><?= h($sellers->manager_id) ?></td>
                <td><?= h($sellers->bank_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Sellers', 'action' => 'view', $sellers->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Sellers', 'action' => 'edit', $sellers->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Sellers', 'action' => 'delete', $sellers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sellers->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
