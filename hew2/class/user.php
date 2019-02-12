<?php
class users {
    private $name = '';
    private $login_id = '';
    private $email = '';
    private $password = '';

    private $err_name = '';
    private $err_login_id = '';
    private $err_email = '';
    private $err_password = '';

    public function set_name($str) {
        $this->name = strval($str);
    }
    public function set_login_id($str) {
        $this->login_id = strval($str);
    }
    public function set_email($str) {
        $this->email = strval($str);
    }
    public function set_password($str) {
        $this->password = strval($str);
    }

    public function get_name() {
        return $this->name;
    }
    public function get_login_id() {
        return $this->login_id;
    }
    public function get_email() {
        return $this->email;
    }
    public function get_password() {
        return $this->password;
    }

    public function get_err_name() {
        return $this->err_name;
    }
    public function get_err_login_id() {
        return $this->err_login_id;
    }
    public function get_err_email() {
        return $this->err_email;
    }
    public function get_err_password() {
        return $this->err_password;
    }


    // index.phpの入力欄のエラーチェック用メソッド群
    // is_fall_~:正常値であればtrue(bgcolor:null),それ以外はfalse(bgcolor:gray)
    public function is_fall_name() {
        return ($this->check_strlen($this->name, '氏名') === '');
    }
    public function is_fall_login_id() {
        return ($this->check_strlen($this->login_id, 'ログインID') === '');
    }
    public function is_fall_email() {
        return ($this->check_email($this->email) === '');
    }
    public function is_fall_password() {
        return ($this->check_password($this->password) === '');
    }

    // check_error:エラー文をプロパティに代入しfalse,エラー文が無ければtrue
    public function check_error() {
        // name欄チェック
        $this->err_name = $this->check_strlen($this->name, '氏名');
        // login_id欄チェック
        $this->err_login_id = $this->check_strlen($this->login_id, 'ログインID');
        // email欄チェック
        $this->err_email = $this->check_email($this->email);
        // password欄チェック
        $this->err_password = $this->check_password($this->password);

        // 1項目でもエラーがあればfalse,無ければtrueを戻す
        if ($this->err_name === '' && $this->err_login_id === '' && $this->err_email === '' && $this->err_password === '') {
            return true;
        }
        return false;
    }
    private function check_strlen($value, $value_name) {
        if ($value == '') {
            return $value_name.'が入力されていません。';
        }
        elseif (mb_strlen($value) > 20) {
            return $value_name.'が長すぎます。';
        }
        return '';
    }
    private function check_email($email) {
        if ($email === '') {
            return 'メールアドレスが入力されていません。';
        }
        elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return 'メールアドレスの形式が正しくありません';
        }
        return '';
    }
    private function check_password($password) {
        if ($password === '') {
            return 'パスワードが入力されていません。';
        }
        return '';
    }
}