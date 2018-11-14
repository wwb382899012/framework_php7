@echo off

rem -------------------------------------------------------------
rem  Mod command line script for Windows.
rem  This is the bootstrap script for running modc on Windows.
rem -------------------------------------------------------------

@setlocal

set BIN_PATH=%~dp0

if "%PHP_COMMAND%" == "" set PHP_COMMAND=php.exe

"%PHP_COMMAND%" "%BIN_PATH%modc.php" %*

@endlocal