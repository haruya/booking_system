<div class="users view">
<h2>マイページ</h2>
<dl>
<dt>名前</dt>
<dd><?php echo h($user['User']['name']); ?></dd>
<dt>email</dt>
<dd><?php echo h($user['User']['email']); ?></dd>
<dt>登録日</dt>
<dd><?php echo $this->Time->format($user['User']['created'], '%Y年%m月%d日'); ?></dd>
</dl>
<br />
<h3>予約リスト</h3>
<?php if (!empty($appointments)) : ?>
<table>
<tr>
<th>予約日</th>
<th>オーダー</th>
<th>開始時間</th>
<th>操作</th>
</tr>
<?php foreach($appointments as $appointment) : ?>
<tr>
<td><?php echo $this->Time->format($appointment['Appointment']['appo_date'], '%Y年%m月%d日'); ?></td>
<td><?php echo h($appointment['Order']['order']); ?></td>
<td><?php echo substr(h($appointment['Time']['start_time']), 0, 5); ?></td>
<td class="actions" style="text-align: left"><?php echo $this->Form->postLink('削除', array('controller' => 'appointments', 'action' => 'delete', $appointment['Appointment']['id']), array('confirm' => '本当に予約をキャンセルしますか？')); ?></td>
</tr>
<?php endforeach; ?>
</table>
<?php else : ?>
<p>予約がありません。</p>
<?php endif; ?>
</div>
<div class="actions">
<h3>メニュー</h3>
<ul>
<li><?php echo $this->Html->link('予約一覧', array('action' => 'index')); ?></li>
<li><?php echo $this->Html->link('ログアウト', array('controller' => 'users', 'action' => 'logout')); ?></li>
</ul>
</div>