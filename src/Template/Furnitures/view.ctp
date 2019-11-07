<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Furniture $furniture
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Furniture'), ['action' => 'edit', $furniture->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Furniture'), ['action' => 'delete', $furniture->id], ['confirm' => __('Are you sure you want to delete # {0}?', $furniture->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Furnitures'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Furniture'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="furnitures view large-9 medium-8 columns content">
    <h3><?= h($furniture->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($furniture->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($furniture->id) ?></td>
        </tr>
    </table>
</div>
