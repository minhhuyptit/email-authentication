<?php
    class Utils{
		public static function createLinkConfirmLogin($userInfo) {
            $link = 'http';

            if (!empty($_SERVER['HTTPS'])) {
                if ($_SERVER['HTTPS'] == 'on') {
                    $link .= "s";
                }
            }

            $link .= "://" . $_SERVER["HTTP_HOST"] . '/email-authentication/confirm_login.php?email=' . $userInfo['email'] . '&code=' . $userInfo['login_key'] . '&time=' . $userInfo['login_time'];
            return $link ;
        }
    }
?>