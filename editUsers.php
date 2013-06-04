<?php
session_start();
require_once 'classes/Membership.php';
if ($_POST["type"]=="rm")
{
	$membership = new Membership();
	$user = $_POST["user"];
	$rank = $_POST["rank"];
	if ($membership->update_Rank($user,$rank-1))
	$response='1';
	else $response='2';
	echo $response;
}
else
if ($_POST["type"]=="am")
{
	$membership = new Membership();
	$user = $_POST["user"];
	$rank = $_POST["rank"];
	if ($membership->update_Rank($user,$rank+1))
	$response='1';
	else $response='2';
	echo $response;
}
else
if ($_POST["type"]=="tm")
{
	$membership = new Membership();
	$user = $_POST["user"];
	$tip = $_POST["tip"];
	if ($membership->update_Type($user,$tip-1))
	$response='1';
	else $response='2';
	echo $response;
}
else
if ($_POST["type"]=="ta")
{
	$membership = new Membership();
	$user = $_POST["user"];
	$tip = $_POST["tip"];
	if ($membership->update_Type($user,$tip+1))
	$response='1';
	else $response='2';
	echo $response;
}
else
if ($_POST["type"]=="deleteUser")
{
	$membership = new Membership();
	$user = $_POST["user"];
	if ($membership->delete_Member($user))
	$response='1';
	else $response='2';
	echo $response;
}