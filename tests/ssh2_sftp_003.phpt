--TEST--
ssh2_sftp - SFTP tests (user:pass in uri)
--SKIPIF--
<?php
require('ssh2_skip.inc');
ssh2t_needs_auth();
ssh2t_writes_remote();
?>
--FILE--
<?php
require('ssh2_test.inc');

$ssh = ssh2_connect(TEST_SSH2_HOSTNAME, TEST_SSH2_PORT);
ssh2t_auth($ssh);

$filename = ssh2t_tempnam();
file_put_contents('ssh2.sftp://'.TEST_SSH2_USER.':'.TEST_SSH2_PASS.'@'.TEST_SSH2_HOSTNAME.':'.TEST_SSH2_PORT.'/$filename', "test data");
readfile('ssh2.sftp://'.TEST_SSH2_USER.':'.TEST_SSH2_PASS.'@'.TEST_SSH2_HOSTNAME.':'.TEST_SSH2_PORT.'/$filename');

unlink('ssh2.sftp://'.TEST_SSH2_USER.':'.TEST_SSH2_PASS.'@'.TEST_SSH2_HOSTNAME.':'.TEST_SSH2_PORT.'/$filename');
?>
--EXPECT--
test data
