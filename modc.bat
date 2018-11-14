@echo off

rem -------------------------------------------------------------
rem  Mod command line script for Windows.
rem
rem  This is the bootstrap script for running modc on Windows.
rem
rem  @author Qiang Xue <qiang.xue@gmail.com>
rem  @link http://www.modframework.com/
rem  @copyright 2008 Mod Software LLC
rem  @license http://www.modframework.com/license/
rem  @version $Id$
rem -------------------------------------------------------------

@setlocal

set MOD_PATH=%~dp0

if "%PHP_COMMAND%" == "" set PHP_COMMAND=php.exe

"%PHP_COMMAND%" "%MOD_PATH%modc" %*

@endlocal