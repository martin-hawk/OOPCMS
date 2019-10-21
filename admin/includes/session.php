<?php

class Session
{

    private $signed_in = FALSE;

    public $user_id;

    public $message;

    public $count;

    function __construct()
    {
        session_start();
        $this->visitors_count();
        $this->check_login();
        $this->check_message();
    }

    private function check_login()
    {
        if (isset($_SESSION['user_id'])) {
            $this->user_id = $_SESSION['user_id'];
            $this->signed_in = TRUE;
        } else {
            unset($this->user_id);
            $this->signed_in = FALSE;
        }
    }

    public function is_signed_in()
    {
        return $this->signed_in;
    }

    public function login($user)
    {
        if ($user) {
            $this->user_id = $_SESSION['user_id'] = $user->id;
            $this->signed_in = TRUE;
        }
    }

    public function logout()
    {
        unset($_SESSION['user_id']);
        $this->user_id = "";
        unset($_SESSION['count']);
        $this->count = 0;
        $this->signed_in = FALSE;
    }

    public function message($msg = "")
    {
        if (! empty($msg)) {
            $_SESSION['message'] = $msg;
        } else {
            return $this->message;
        }
    }

    private function check_message()
    {
        if (isset($_SESSION['message'])) {
            $this->message = $_SESSION['message'];
            unset($_SESSION['message']);
        } else {
            $this->message = "";
        }
    }

    public function visitors_count()
    {
        if (isset($_SESSION['count'])) {
            $_SESSION['count'] ++;
            $this->count = $_SESSION['count'];
            return $this->count;
        } else {
            $_SESSION['count'] = 1;
            $this->count = $_SESSION['count'];
            return $this->count;
        }
    }
}

$session = new Session();
$message = $session->message();

?>