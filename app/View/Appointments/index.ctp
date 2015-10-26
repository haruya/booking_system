<div class="appointments index">
<h2>予約一覧</h2>
<div class="paging">
<?php echo $this->Html->link('< 前日', array('action' => 'index', $prev)); ?>
<?php echo $this->Html->link('次日 >', array('action' => 'index', $next)); ?>
</div>
<h4><?php echo $strdate; ?>の予約</h4>
<ul class="timeline">
<li class="time9">09:00</li>
<li class="time10">10:00</li>
<li class="time11">11:00</li>
<li class="time12">12:00</li>
<li class="time13">13:00</li>
<li class="time14">14:00</li>
<li class="time15">15:00</li>
<li class="time16">16:00</li>
<li class="time17">17:00</li>
<li class="time18">18:00</li>
<li class="time19">19:00</li>
</ul>

<p class="appo-area-p1">1番席</p>
<div class="appo-area1">
<?php foreach($appointments as $appointment) : ?>
<?php if ($appointment['Appointment']['table'] == 1) : ?>
<div class="<?php echo $appointment['Appointment']['class']; ?>" style="height: <?php echo $appointment['Appointment']['height']; ?>px">
<p><?php echo $appointment['Appointment']['name']; ?></p>
</div>
<?php endif; ?>
<?php endforeach; ?>
</div>

<p class="appo-area-p2">2番席</p>
<div class="appo-area2">
<?php foreach($appointments as $appointment) : ?>
<?php if ($appointment['Appointment']['table'] == 2) : ?>
<div class="<?php echo $appointment['Appointment']['class']; ?>" style="height: <?php echo $appointment['Appointment']['height']; ?>px">
<p><?php echo $appointment['Appointment']['name']; ?></p>
</div>
<?php endif; ?>
<?php endforeach; ?>
</div>

<p class="appo-area-p3">3番席</p>
<div class="appo-area3">
<?php foreach($appointments as $appointment) : ?>
<?php if ($appointment['Appointment']['table'] == 3) : ?>
<div class="<?php echo $appointment['Appointment']['class']; ?>" style="height: <?php echo $appointment['Appointment']['height']; ?>px">
<p><?php echo $appointment['Appointment']['name']; ?></p>
</div>
<?php endif; ?>
<?php endforeach; ?>
</div>

</div>

<div class="actions">
<h3>メニュー</h3>
<ul>
<li><?php echo $this->Html->link('マイページ', array('controller' => 'users', 'action' => 'view', $user_id)); ?></li>
<li><?php echo $this->Html->link('予約する', array('action' => 'add', $link)); ?></li>
<li><?php echo $this->Html->link('ログアウト', array('controller' => 'users', 'action' => 'logout')); ?></li>
</ul>
</div>
