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
            <?= $this->Html->link(__('Edit Email'), ['action' => 'edit', $email->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Email'), ['action' => 'delete', $email->id], ['confirm' => __('Are you sure you want to delete # {0}?', $email->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Emails'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Email'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="emails view content">
            <h3><?= h($email->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Destinatario') ?></th>
                    <td><?= h($email->destinatario) ?></td>
                </tr>
                <tr>
                    <th><?= __('Assunto') ?></th>
                    <td><?= h($email->assunto) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($email->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Data Envio') ?></th>
                    <td><?= h($email->data_envio) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Corpo') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($email->corpo)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
