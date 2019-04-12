<?php
namespace modulos\base\Form;

class deleteForm extends \vendor\form\Form
{
    public function __construct($name)
    {

        parent::__construct();

       $this->setAtributos(array(
            'name' => $name,
            'action' => "/public/php/registro/delete.profile.php",
            'method' => 'post'
        ));




         $this->add(array(
                'name' => 'guardar',
                'type'  => 'submit',
                'atributos' => array(
                    'class'       => '_btn _primary',
                    'value' => "Eliminar Mi cuenta"
                 )

            )
        );

    }

    public function addContrasenaAnterior()
    {
         $this->add(array(
                'name' => 'contrasena_ant',
                'label' => "Contrase&ntilde;a actual",
                'type'  => 'password',
                'required'  => true,
                'atributos' => array(
                    'class'       => 'required',
                    'maxlength' => 15
                 ),
                'label_atributos' => array(
                    'class'       => 'desc_form_obligatorio'
                 )
            )
        );

    }

}
?>
