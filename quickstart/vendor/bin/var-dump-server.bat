@ECHO OFF
setlocal DISABLEDELAYEDEXPANSION
SET BIN_TARGET=%~dp0/var-dump-server
php "%BIN_TARGET%" %*
