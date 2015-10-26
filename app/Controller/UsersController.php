<?php

/**
 * Usersコントローラー
 */
class UsersController extends AppController {
    // 利用するモデルの定義
    public $uses = array('User', 'Appointment');

    /**
     * ログイン処理
     */
    public function login() {
        // フォーム入力があった場合にログイン処理後に予約一覧へ
        if ($this->request->isPost()) {
            if ($this->Auth->login()) {
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->set('メールアドレスまたはパスワードが正しくありません。');
            }
        }
    }

    /**
     * 予約一覧へ飛ばす
     */
    public function index() {
        // var_dump($this->Auth->user());exit;
        // ログインされた場合、予約一覧へ飛ぶ
        $this->redirect(array('controller' => 'appointments', 'action' => 'index'));
    }

    /**
     * マイページ
     */
    public function view($id = null) {
        // ユーザ情報取得
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException();
        }
        if ($id != $this->Auth->user('id')) {
            throw new ForbiddenException();
        }
        // 予約データ取得
        $appo = $this->Appointment->find('all', array(
            'conditions' => array('user_id' => $id),
            'order' => array('appo_date' => 'ASC', 'time_id' => 'ASC')
        ));
        // var_dump($appo);exit;
        // データ渡し
        $this->set('user', $this->User->read(null, $id));
        $this->set('appointments', $appo);
    }

    /**
     * ログアウト処理
     */
    public function logout() {
        $this->Auth->logout();
    }
}