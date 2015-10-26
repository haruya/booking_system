<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('cake.generic');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
<style>
ul.timeline {
    margin-top: 20px;
    list-style-type: none;
}

ul.timeline li {
    padding-top: 10px;
    margin-top: 1px;
    margin-left: 0px;
    margin-right: 0px;
    width: 60px;
    height: 30px;
    text-align: center;
    background-color: #cccccc;
    cursor: default;
}

.appo-area1, .appo-area2, .appo-area3 {
    margin-top: -450px;
    width: 100px;
    height: 450px;
    background-color: #eeeeee;
}
.appo-area1 {
    margin-left: 80px;
}
.appo-area2 {
    margin-left: 200px;
}
.appo-area3 {
    margin-left: 320px;
}

.appo-area-p1, .appo-area-p2, .appo-area-p3 {
	position: absolute;
	margin-top: -470px;
}
.appo-area-p1 {
    margin-left: 110px;
}
.appo-area-p2 {
    margin-left: 230px;
}

.appo-area-p3 {
    margin-left: 350px;
}
.appo09, .appo10, .appo11, .appo12, .appo13,
.appo14, .appo15, .appo16, .appo17, .appo18 {
    position: absolute;
    padding-top: 0px;
    margin-left: 10px;
    width: 80px;
    text-align: center;
    background-color: gray;
}

.me {
    background-color: blue;
    color: #ffffff;
}

.appo10 {
    margin-top: 41px;
}
.appo11 {
    margin-top: 82px;
}
.appo12 {
    margin-top: 123px;
}
.appo13 {
    margin-top: 164px;
}
.appo14 {
    margin-top: 205px;
}
.appo15 {
    margin-top: 246px;
}
.appo16 {
    margin-top: 287px;
}
.appo17 {
    margin-top: 328px;
}
.appo18 {
    margin-top: 369px;
}


</style>
</head>
<body>
	<div id="container">
		<div id="header">
			<h1><?php echo $this->Html->link($cakeDescription, 'http://cakephp.org'); ?></h1>
		</div>
		<div id="content">

			<?php echo $this->Flash->render(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
			<?php echo $this->Html->link(
					$this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')),
					'http://www.cakephp.org/',
					array('target' => '_blank', 'escape' => false, 'id' => 'cake-powered')
				);
			?>
			<p>
				<?php echo $cakeVersion; ?>
			</p>
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
