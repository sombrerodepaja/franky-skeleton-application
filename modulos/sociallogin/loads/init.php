<?php
include 'constantes.php';
include 'util.php';
bindtextdomain("sociallogin", PROJECT_DIR .'/modulos/socialogin/locale');

if (function_exists('bind_textdomain_codeset')) 
{
    bind_textdomain_codeset("sociallogin", 'UTF-8');
}



$MyMetatag->setJs("/public/ajax/sociallogin/ajax.sociallogin.js");

if($MySession->LoggedIn() && $MySession->GetVar( 'social' ) == false)
{
    
    $MySocialLogin = new \modulos\sociallogin\vendor\model\socialLogin("users",array("usuario","email"),"contrasena",array("status" => "1"));
    $MySocialLogin->getSocial($MySession->GetVar('id'));
    
    $MySession->SetVar('social',     $MySocialLogin->m_social_data);
}

$MyUserSocial = new \modulos\sociallogin\vendor\model\UsersSocial();
?>