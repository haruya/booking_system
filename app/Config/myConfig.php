<?php

/**
 * サイト全体の設定
 */

$siteNo = 1;

if ($siteNo == 0) { // 本番サーバー
    session_name('booking_system_production');
    $config['database'] = 'site0';
} elseif ($siteNo == 1) { // ローカル環境
    session_name('booking_system_local');
    $config['database'] = 'site1';
}