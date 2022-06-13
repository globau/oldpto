<?php

$ldap_host = "ldap";
$ldap_port = 389;
$ldap_bind_user = "cn=admin,dc=mozilla";
$ldap_bind_pass = "secret";

$ENABLE_DB = TRUE;
$Database_Server = "mysql";
$Database_User = "pto";
$Database_Password = "secret";
$Database_Name = "pto";

$Enable_Mail = FALSE;
$Enable_Manager_Notifying = TRUE;
$SMTP_Server = "";

$Debug = TRUE;

$hr_managers = "";
$export_users = "";
$notified_people = "";
$mail_blacklist = "";

$_SERVER['PHP_AUTH_USER'] = "employee@mozilla.com";
