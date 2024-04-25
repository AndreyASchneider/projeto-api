<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Email $email
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $email->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $email->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Emails'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="emails form content">
            <?= $this->Form->create($email) ?>
            <fieldset>
                <legend><?= __('Edit Email') ?></legend>
                <?php
                    echo $this->Form->control('destinatario');
                    echo $this->Form->control('assunto');
                    echo $this->Form->control('corpo');
                    echo $this->Form->control('data_envio', ['empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
