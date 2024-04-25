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
            <?= $this->Html->link(__('Edit Evento'), ['action' => 'edit', $evento->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Evento'), ['action' => 'delete', $evento->id], ['confirm' => __('Are you sure you want to delete # {0}?', $evento->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Eventos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Evento'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="eventos view content">
            <h3><?= h($evento->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nome') ?></th>
                    <td><?= h($evento->nome) ?></td>
                </tr>
                <tr>
                    <th><?= __('Local') ?></th>
                    <td><?= h($evento->local) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($evento->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Data') ?></th>
                    <td><?= h($evento->data) ?></td>
                </tr>
                <tr>
                    <th><?= __('Hora') ?></th>
                    <td><?= h($evento->hora) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Descricao') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($evento->descricao)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
