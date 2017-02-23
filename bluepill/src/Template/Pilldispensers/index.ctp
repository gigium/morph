<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Pilldispenser'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pilldispensers index large-9 medium-8 columns content">
    <h3><?= __('Pilldispensers') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('code') ?></th>
                <th scope="col"><?= $this->Paginator->sort('id_user') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pilldispensers as $pilldispenser): ?>
            <tr>
                <td><?= $this->Number->format($pilldispenser->id) ?></td>
                <td><?= h($pilldispenser->code) ?></td>
                <td><?= $this->Number->format($pilldispenser->id_user) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $pilldispenser->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pilldispenser->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pilldispenser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pilldispenser->id)]) ?>
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
