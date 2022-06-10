<?php
function messageNotif($messagetype, $message) {
  $_SESSION['msg'] = '<div class="message" data-messageType=' . $messagetype . '>' . $message . '</div>';
}
