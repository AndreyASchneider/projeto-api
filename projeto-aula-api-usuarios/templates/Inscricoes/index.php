<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\Cake\Datasource\EntityInterface> $inscricoes
 */
?>
<div class="inscricoes index content">
    <?= $this->Html->link(__('New Inscrico'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Inscricoes') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('usuario_id') ?></th>
                    <th><?= $this->Paginator->sort('evento_id') ?></th>
                    <th><?= $this->Paginator->sort('data_inscricao') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($inscricoes as $inscricao): ?>
                <tr>
                    <td><?= $this->Number->format($inscricao->id) ?></td>
                    <td><?= $inscricao->usuario_id === null ? '' : $this->Number->format($inscricao->usuario_id) ?></td>
                    <td><?= $inscricao->evento_id === null ? '' : $this->Number->format($inscricao->evento_id) ?></td>
                    <td><?= h($inscricao->data_inscricao) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $inscricao->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $inscricao->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $inscricao->id], ['confirm' => __('Are you sure you want to delete # {0}?', $inscricao->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<!--    <div class="paginator">-->
<!--        <ul class="pagination">-->
<!--            --><?php //= $this->Paginator->first('<< ' . __('first')) ?>
<!--            --><?php //= $this->Paginator->prev('< ' . __('previous')) ?>
<!--            --><?php //= $this->Paginator->numbers() ?>
<!--            --><?php //= $this->Paginator->next(__('next') . ' >') ?>
<!--            --><?php //= $this->Paginator->last(__('last') . ' >>') ?>
<!--        </ul>-->
<!--        <p>--><?php //= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?><!--</p>-->
<!--    </div>-->
</div>
