<div class="appointments form">
<h2>予約する</h2>
<?php echo $this->Form->create('Appointment', array('action' => 'add', 'novalidate' => true)); ?>
<h3><?php echo $user_name; ?>様</h3>
<?php echo $this->Form->input('user_id', array('type' => 'hidden', 'value' => $user_id)); ?>
<?php echo $this->Form->input('appo_date', array('type' => 'hidden', 'value' => $date)); ?>
<h4><?php echo $strdate; ?>の予約</h4>
<?php echo $this->Form->input('time_id', array('type' => 'select', 'options' => $times, 'after' => '～')); ?>
<?php echo $this->Form->input('order_id', array('type' => 'radio', 'options' => $orders, 'value' => 1)); ?>
<?php echo $this->Form->end('予約'); ?>
</div>
<div class="actions">
<h3>メニュー</h3>
<ul>
<li><?php echo $this->Html->link('マイページ', array('controller' => 'users', 'action' => 'view', $user_id)); ?></li>
<li><?php echo $this->Html->link('予約一覧', array('action' => 'index', $link)); ?></li>
<li><?php echo $this->Html->link('ログアウト', array('controller' => 'users', 'action' => 'logout')); ?></li>
</ul>
</div>