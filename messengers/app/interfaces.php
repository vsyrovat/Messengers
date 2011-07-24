<?php
/**
 * Created by PhpStorm.
 * User: Master
 * Date: 30.12.2010
 * Time: 20:26:00
 */
 
interface iIMDriver {

	function getStatus();
	function login();
	function logout();
	function sendMessage();
	function receiveMessages();

}