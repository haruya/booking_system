<?php

class AppointmentsController extends AppController {
    
    /**
     * 予約一覧
     */
    public function index($date_id = null) {
        // 指定した日付データを取得
        if ($date_id) {
            $strdate = date('Y年m月d日', strtotime($date_id));
            $date = date('Y-m-d', strtotime($date_id));
            $link = date('Ymd', strtotime($date_id));
        } else {
            $strdate = date('Y年m月d日');
            $date = date('Y-m-d');
            $link = date('Ymd');
        }
        // 予約データ取得
        $appo = $this->Appointment->find('all', array(
            'conditions' => array('appo_date' => $date),
            'order' => array('time_id' => 'ASC')
        ));
        // タイムライン追加用クラス名生成
        for ($i = 0; $i < count($appo); $i++) {
            $appo[$i]['Appointment']['class'] = 'appo' . mb_substr($appo[$i]['Time']['start_time'], 0, 2);
            $appo[$i]['Appointment']['height'] = $appo[$i]['Order']['total_time'] * 20;
            if ($appo[$i]['Appointment']['user_id'] == $this->Auth->user('id')) {
                $appo[$i]['Appointment']['class'] .= ' me';
                $appo[$i]['Appointment']['name'] = '自分';
            } else {
                $appo[$i]['Appointment']['name'] = 'Already';
            }
        }
        // データ渡し
        $this->set('user_id', $this->Auth->user('id'));
        $this->set('appointments', $appo);
        $this->set('strdate', $strdate);
        $this->set('link', $link);
        $this->set('prev', date('Ymd', strtotime($date . ' -1 day')));
        $this->set('next', date('Ymd', strtotime($date . ' +1 day')));
    }
    
    /**
     * 予約追加
     */
    public function add($date_id = null) {
        // 日付取得
        if ($date_id) {
            $strdate = date('Y年m月d日', strtotime($date_id));
            $date = date('Y-m-d', strtotime($date_id));
            $link = date('Ymd', strtotime($date_id));
        } else {
            $strdate = date('Y年m月d日');
            $date = date('Y-m-d');
            $link = date('Ymd');
        }
        
        // 時間帯取得
        $times = $this->Appointment->Time->find('list');
        // 時間を「09:00:00」の形式から「09:00」の形式にする
        foreach ($times as $k => $v) {
            $times[$k] = mb_substr($v, 0, 5);
        }
        // オーダー取得
        $orders = $this->Appointment->Order->find('list');
        
        if ($this->request->is('post')) {
            // 登録用データの生成
            $data['Appointment']['user_id'] = $this->request->data['Appointment']['user_id'];
            $data['Appointment']['order_id'] = $this->request->data['Appointment']['order_id'];
            $data['Appointment']['appo_date'] = $this->request->data['Appointment']['appo_date'];
            $data['Appointment']['time_id'] = $this->request->data['Appointment']['time_id'];
            $data['Appointment']['table'] = 1;
            
            // 予約したオーダーの詳細を取得
            $orderDetail = $this->Appointment->Order->find('all', array(
                'conditions' => array('id' => $data['Appointment']['order_id'])
            ));
            
            // 予約した時間の詳細を取得
            $timeDetail = $this->Appointment->Time->find('all', array(
                'conditions' => array('id' => $data['Appointment']['time_id'])
            ));
            
            // 予約済データ取得
            $appo = $this->Appointment->find('all', array(
                'conditions' => array('appo_date' => $data['Appointment']['appo_date']),
                'order' => array('time_id' => 'ASC')
            ));
            /**
             * 席が埋まっているかいないかのフラグ
             * 添字1が座席1、2が座席2、3が座席3
             * 初期値は全部空いている
             */
            $flgs = array(null, true, true, true);
            // 予約日に既に予約されているデータをループで回す
            foreach ($appo as $ap) {
                if ($ap['Appointment']['time_id'] == $data['Appointment']['time_id']
                    || ($ap['Order']['total_time']) >= 3 && (int)substr($ap['Time']['start_time'], 0, 2) == (int)substr($timeDetail[0]['Time']['start_time'], 0, 2) - 1
                    || ($orderDetail[0]['Order']['total_time'] >= 3 && (int)substr($ap['Time']['start_time'], 0, 2) - 1 == (int)substr($timeDetail[0]['Time']['start_time'], 0, 2))) {
                        $flgs[$ap['Appointment']['table']] = false;
                        if ($flgs[1]) {
                            $data['Appointment']['table'] = 1;
                        } else if ($flgs[2]) {
                            $data['Appointment']['table'] = 2;
                        } else if ($flgs[3]) {
                            $data['Appointment']['table'] = 3;
                        } else {
                            $this->Flash->set('この時間帯の予約はいっぱいです。予約できません。');
                            $this->redirect(array('action' => 'index', $link));
                        }
                }
            }
            $this->Appointment->create();
            if ($this->Appointment->save($data)) {
                $this->Flash->set('予約しました。');
                $this->redirect(array('action' => 'index', $link));
            } else {
                $this->Flash->set('予約に失敗しました。もう一度実行してください。');
            }
        }
        $this->set('user_id', $this->Auth->user('id'));
        $this->set('user_name', $this->Auth->user('name'));
        $this->set('date', $date);
        $this->set('strdate', $strdate);
        $this->set('times', $times);
        $this->set('orders', $orders);
        $this->set('link', $link);
    }
    
    /**
     * 予約キャンセル
     */
    public function delete($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        if ($this->Appointment->delete($id)) {
            $this->Flash->set('予約をキャンセルしました。');
            $this->redirect(array('controller' => 'users', 'action' => 'view', $this->Auth->user('id')));
        } else {
            $this->Flash->set('予約をキャンセルに失敗しました。');
            $this->redirect(array('controller' => 'users', 'action' => 'view', $this->Auth->user('id')));
        }
    }
}