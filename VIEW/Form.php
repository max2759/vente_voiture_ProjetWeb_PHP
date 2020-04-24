<?php

class Form
{
    public $form;

    public function __construct($method, $action, $name, $id, $enctype = null)
    {
        $this->form = '<form method=' . $method . ' action=' . $action . ' name=' . $name . ' id=' . $id . ' enctype=' . $enctype . '>';
    }

    public function setText($label, $placeHolder, $name, $id)
    {
        $this->form .= '<div class="form-group"><label>' . $label . '</label><input type="text" class="form-control" placeholder=' . $placeHolder . ' name=' . $name . ' id=' . $id . '></div>';
    }

    public function setEmail($label, $placeHolder, $name, $id)
    {
        $this->form .= '<div class="form-group"><label>' . $label . '</label><input type="email" class="form-control" placeholder=' . $placeHolder . ' name=' . $name . ' id=' . $id . '></div>';
    }

    public function setPassword($label, $placeHolder, $name, $id)
    {
        $this->form .= '<div class="form-group"><label>' . $label . '</label><input type="password" class="form-control" placeholder=' . $placeHolder . ' name=' . $name . ' id=' . $id . '></div>';
    }

    public function setNumber($label, $id, $name)
    {
        $this->form .= '<div class="form-group"><label>' . $label . '</label><input type="number" class="form-control" id=' . $id . ' name=' . $name . ' min="100" step="100" required></div>';
    }

    public function setHidden($name, $id, $value)
    {
        $this->form .= '<input type="hidden" name="' . $name . '" id="' . $id . '" value="' . $value . '"/>';
    }

    public function setOption($label, $id, $name, $value)
    {
        $this->form .= '<div class="form-group col-md-4">
                            <label>'.$label.'</label>
                                <select id="'.$id.'" name="'.$name.'" class="form-control">
                                   <option value="'.$value.'">$value</option>
                                </select>
                        </div>';
    }

    public function setDate()
    {
        $date = Date('Y-m-d');
        $this->form .= '<div class="form-group"><label>Date de la vente</label><input type="date" class="form-control" id="trip-start" name="trip-start" value="' . $date . '" min="' . $date . '"></div>';
    }

    public function setPicture($id)
    {
        $this->form .= '<div class="form-group"><input type="file" name="' . $id . '" id="' . $id . '"></div>';
    }

    public function submit($name, $text, $id)
    {
        $this->form .= '<button type="submit" class="btn btn-success" name=' . $name . ' id =' . $id . '>' . $text . '</button>';
    }

    public function modalSend($name, $id, $disabled = NULL)
    {
        $this->form .= '<div class="modal-footer"><button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        <input type="submit" name="' . $name . '" id="' . $id . '" class="btn btn-success" ' . $disabled . '>
                        </div>';
    }

    public function getForm()
    {
        $this->form .= "</form>";

        echo $this->form;
    }

}
