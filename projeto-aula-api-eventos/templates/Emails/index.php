<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Email> $emails
 */
?>
<div class="emails index content">
    <?= $this->Html->link(__('New Email'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Emails') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('destinatario') ?></th>
                    <th><?= $this->Paginator->sort('assunto') ?></th>
                    <th><?= $this->Paginator->sort('data_envio') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($emails as $email): ?>
                <tr>
                    <td><?= $this->Number->format($email->id) ?></td>
                    <td><?= h($email->destinatario) ?></td>
                    <td><?= h($email->assunto) ?></td>
                    <td><?= h($email->data_envio) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $email->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $email->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $email->id], ['confirm' => __('Are you sure you want to delete # {0}?', $email->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
