<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bank $bank
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Bank'), ['action' => 'edit', $bank->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Bank'), ['action' => 'delete', $bank->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bank->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Banks'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Bank'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Managers'), ['controller' => 'Managers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Manager'), ['controller' => 'Managers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sellers'), ['controller' => 'Sellers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Seller'), ['controller' => 'Sellers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="banks view large-9 medium-8 columns content">
    <h3><?= h($bank->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($bank->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Manager') ?></th>
            <td><?= $bank->has('manager') ? $this->Html->link($bank->manager->id, ['controller' => 'Managers', 'action' => 'view', $bank->manager->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address') ?></th>
            <td><?= h($bank->address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lattitude') ?></th>
            <td><?= h($bank->lattitude) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Longitude') ?></th>
            <td><?= h($bank->longitude) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $bank->has('user') ? $this->Html->link($bank->user->id, ['controller' => 'Users', 'action' => 'view', $bank->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($bank->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rooms') ?></th>
            <td><?= $this->Number->format($bank->rooms) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Price') ?></th>
            <td><?= $this->Number->format($bank->price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($bank->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($bank->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rental Date') ?></th>
            <td><?= h($bank->rental_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Expiration') ?></th>
            <td><?= h($bank->expiration) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Sellers') ?></h4>
        <?php if (!empty($bank->sellers)): ?>
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
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Ci') ?></th>
                <th scope="col"><?= __('Contrat') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($bank->sellers as $sellers): ?>
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
                <td><?= h($sellers->user_id) ?></td>
                <td><?= h($sellers->ci) ?></td>
                <td><?= h($sellers->contrat) ?></td>
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
