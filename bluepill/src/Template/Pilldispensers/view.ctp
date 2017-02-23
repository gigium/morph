<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Pilldispenser'), ['action' => 'edit', $pilldispenser->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Pilldispenser'), ['action' => 'delete', $pilldispenser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pilldispenser->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Pilldispensers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pilldispenser'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="pilldispensers view large-9 medium-8 columns content">
    <h3><?= h($pilldispenser->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Code') ?></th>
            <td><?= h($pilldispenser->code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($pilldispenser->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id User') ?></th>
            <td><?= $this->Number->format($pilldispenser->id_user) ?></td>
        </tr>
    </table>
</div>
