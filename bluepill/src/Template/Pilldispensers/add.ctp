<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Pilldispensers'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="pilldispensers form large-9 medium-8 columns content">
    <?= $this->Form->create($pilldispenser) ?>
    <fieldset>
        <legend><?= __('Add Pilldispenser') ?></legend>
        <?php
            echo $this->Form->input('code');
            echo $this->Form->input('id_user');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
