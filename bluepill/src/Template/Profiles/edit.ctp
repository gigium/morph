<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $profile->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $profile->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Profiles'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="profiles form large-9 medium-8 columns content">
    <?= $this->Form->create($profile) ?>
    <fieldset>
        <legend><?= __('Edit Profile') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('surname');
            echo $this->Form->input('birthdate');
            echo $this->Form->input('address');
            echo $this->Form->input('birthplace');
            echo $this->Form->input('sex');
            echo $this->Form->input('profile_picture');
            echo $this->Form->input('id_user');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
