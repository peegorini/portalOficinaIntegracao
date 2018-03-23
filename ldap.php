<?php

$ldap_server = "200.134.18.102";
$user = "1343416";
$ldap_porta = "636";
$ldap_pass   = "";

$ldapcon = ldap_connect($ldap_server, $ldap_porta) or die("Could not connect to LDAP server.");

// ldap_set_option($ldapcon, useSSL, true);
// ldap_set_option($ldapcon, ignorecerticates, true);
// ldap_set_option($ldapcon, basedn, "dc=utfpr,dc=edu,dc=br");
// ldap_set_option($ldapcon, varUid, "uid");


// ldap_set_option($ldapcon, useSSL, true);
// ldap_set_option($ldapcon, ignorecerticates, true);
ldap_set_option($ldapcon, LDAP_OPT_MATCHED_DN, "dc=utfpr,dc=edu,dc=br");
// ldap_set_option($ldapcon, varUid, "uid");

if ($ldapcon){

	// binding to ldap server
	//$ldapbind = ldap_bind($ldapconn, $user, $ldap_pass);

	$bind = ldap_bind($ldapcon, $user, $ldap_pass);

	// verify binding
	if ($bind) {
	echo "LDAP bind successful…";
	} else {
	echo "LDAP bind failed…";
	}

}

?>

