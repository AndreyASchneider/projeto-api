<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $inscrico
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $inscricao->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $inscricao->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Inscricoes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="inscricoes form content">
            <?= $this->Form->create($inscricao) ?>
            <fieldset>
                <legend><?= __('Edit Inscrico') ?></legend>
                <?php
                    echo $this->Form->control('usuario_id');
                    echo $this->Form->control('evento_id');
                    echo $this->Form->control('data_inscricao', ['empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
