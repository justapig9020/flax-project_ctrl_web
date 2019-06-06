<?php
if (!isset ($__DBCONF__)) {
    $__DBCONF__ = 1;
    function getDBUser () 
    {
        return ur_user;
    }
    function getDBPw ()
    {
        return ur_pw;
    }
    function getDBPort ()
    {
        return ur_port_default_3306;
    }
}
?>
