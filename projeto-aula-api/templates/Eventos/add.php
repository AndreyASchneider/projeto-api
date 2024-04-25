<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $evento
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Eventos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="eventos form content">
            <?= $this->Form->create($evento) ?>
            <fieldset>
                <legend><?= __('Add Evento') ?></legend>
                <?php
                    echo $this->Form->control('nome');
                    echo $this->Form->control('data', ['empty' => true]);
                    echo $this->Form->control('hora', ['empty' => true]);
                    echo $this->Form->control('local');
                    echo $this->Form->control('descricao');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
