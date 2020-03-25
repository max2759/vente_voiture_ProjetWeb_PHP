<?php

class Form
{
    public $form;

    public function __construct($method, $action, $name, $id)
    {
        $this->form = '<form method=' . $method . ' action=' . $action . ' name=' . $name . ' id=' . $id . '>';
    }

    public function setText($label, $placeHolder, $name, $id)
    {
        $this->form .= '<div class="form-group"><label>' . $label . '</label><input type="text" class="form-control" placeholder=' . $placeHolder . ' name=' . $name . ' id=' . $id.'></div>';
    }

    public function setEmail($label, $placeHolder, $name, $id)
    {
        $this->form .= '<div class="form-group"><label>' . $label . '</label><input type="email" class="form-control" placeholder=' . $placeHolder . ' name=' . $name . ' id=' . $id . '></div>';
    }

    public function setPassword($label, $placeHolder, $name, $id)
    {
        $this->form .= '<div class="form-group"><label>' . $label . '</label><input type="password" class="form-control" placeholder=' . $placeHolder . ' name=' . $name . ' id=' . $id . '></div>';
    }

    public function setHidden($name, $id){
        $this->form .= '<input type="hidden" name="'.$name.'" id="'.$id.'"/>';
    }

    public function submit($name, $text, $id)
    {
        $this->form .= '<button type="submit" class="btn btn-success" name=' . $name . ' id =' . $id . '>' . $text . '</button>';
    }

    public function modalSend($name,$id, $disabled){
        $this->form .= '<div class="modal-footer"><button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        <input type="submit" name="'.$name.'" id="'.$id.'" class="btn btn-success" disabled="'. $disabled .'">
                        </div>';
    }

    public function getForm()
    {
        $this->form .= "</form>";

        echo $this->form;
    }

}
