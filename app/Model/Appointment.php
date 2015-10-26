<?php

/**
 * Appointmentクラス
 */
class Appointment extends AppModel {
    // テーブル同士の関係性の定義
    public $belongsTo = array(
        'Order',
        'Time',
        'User'
    );
    
    // バリエーション
    public $validate = array(
    );
}