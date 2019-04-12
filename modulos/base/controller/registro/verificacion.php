<?php
use modulos\base\vendor\model\USERS;
use modulos\base\vendor\entity\users as entityUser;
use modulos\base\vendor\model\VerificacionesPendientes;
use modulos\base\vendor\model\Emails;

$Emails = new Emails();

$VerificacionesPendientes   = new VerificacionesPendientes();
$MyUser             = new USERS();

$token  =   $MyRequest->getRequest('key');
$error = false;

$result = $VerificacionesPendientes->getVerificacion($token);
$registro = $VerificacionesPendientes->getRows();
$id =  $registro["id_user"];

if($result != REGISTRO_SUCCESS)
{
    $MyFlashMessage->setMsg("error",$MyMessageAlert->Message("error_token_verificacion_email"));
    $error = true;
}

if($error == false)
{
        $MyUserEntity    = new entityUser();
        $MyUserEntity->setVerificado(1);
        $MyUserEntity->setId($id);
        $MyUserEntity->setUltimoAcceso(date('Y-m-d'));
        if($MyUser->save( $MyUserEntity->getArrayCopy())==REGISTRO_SUCCESS)
        {
            $VerificacionesPendientes->deleteVerificacion($token);

            $MyUser->getData($id);
            $registro = $MyUser->getRows();
            $MyLogin = new \vendor\core\LOGIN("users",array("usuario","email"),"contrasena",array("status" => "1"));
            $MyLogin->setLogin($registro["usuario"], $registro["contrasena"]);


            $inputs = $MyLogin->getInputs();
            foreach($inputs as $k)
            {
                $MySession->SetVar($k,   	$MyLogin->{$k});
            }


            $MySession->SetVar('is_login',    true);
            $_SESSION["token_login"] = array();


            if($Emails->getMailV($registro["email"]) != REGISTRO_SUCCESS)
            {
                $Emails->setMailV($registro["email"]);
            }
            $MyFlashMessage->setMsg("success",$MyMessageAlert->Message("success_verificacion_email"));
        }
        else
        {
            $MyFlashMessage->setMsg("error",$MyMessageAlert->Message("error_verificacion_email"));
        }
}


$MyRequest->redirect();
?>
