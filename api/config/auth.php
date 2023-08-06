<?php
auth()->config("PASSWORD_ENCODE", false);
auth()->config('DB_TABLE', 'admin');
auth()->config("ID_KEY", "adminId");

auth()->config("PASSWORD_VERIFY", function ($input, $pass) {
    return $input == $pass;
});
