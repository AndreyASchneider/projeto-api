<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $inscricoes
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Inscrico'), ['action' => 'edit', $inscricoes->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Inscrico'), ['action' => 'delete', $inscricoes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $inscricoes->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Inscricoes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Inscrico'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="inscricoes view content">
            <h3><?= h($inscricoes->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($inscricoes->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Usuario Id') ?></th>
                    <td><?= $inscricoes->usuario_id === null ? '' : $this->Number->format($inscricoes->usuario_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Evento Id') ?></th>
                    <td><?= $inscricoes->evento_id === null ? '' : $this->Number->format($inscricoes->evento_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Data Inscricao') ?></th>
                    <td><?= h($inscricoes->data_inscricao) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
