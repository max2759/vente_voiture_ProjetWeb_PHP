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

    public function setPassword($label, $placeHolder, $name, $id)
    {
        $this->form .= '<div class="form-group"><label>' . $label . '</label><input type="password" class="form-control" placeholder=' . $placeHolder . ' name=' . $name . ' id=' . $id . '></div>';
    }

    public function setNumber($label, $id, $name, $placeHolder, $min, $step, $value, $max)
    {

        $this->form .= '<div class="form-group"><label>' . $label . '</label><input type="number" class="form-control" value="'.$value.'" placeholder="'.$placeHolder.'" id=' . $id . ' name=' . $name . ' min="'.$min.'" step="'.$step.'" max="'.$max.'" required></div>';
    }

    public function setHidden($name, $id, $value)
    {
        $this->form .= '<input type="hidden" name="' . $name . '" id="' . $id . '" value="' . $value . '"/>';
    }


    public function setOptionBrands($label, $id, $name)
    {
        $this->form .= '<div class="form-group">
                            <label>'.$label.'</label>
                                <select id="'.$id.'" name="'.$name.'" class="form-control">
                                   <option value="1">Toyota</option>
                                   <option value="2">Ford</option>
                                   <option value="3">Kia</option>
                                   <option value="4">Mercedes</option>
                                   <option value="5">BMW</option>
                                   <option value="6">Volkswagen</option>
                                   <option value="7">Audi</option>
                                   <option value="8">Peugeot</option>
                                   <option value="9">Fiat</option>
                                   <option value="10">Nissan</option>
                                   <option value="11">Suzuki</option>
                                   <option value="12">Lexus</option>
                                </select>
                        </div>';
    }
    public function setOptionFuel($label, $id, $name)
    {
        $this->form .= '<div class="form-group">
                            <label>'.$label.'</label>
                                <select id="'.$id.'" name="'.$name.'" class="form-control">
                                   <option value="Essence">Essence</option>
                                   <option value="Diesel">Diesel</option>
                                   <option value="Hybrid">Hybrid</option>
                                   <option value="Plug-in">Plug-in hybrid</option>
                                   <option value="Gaz">Gaz</option>
                                   <option value="Electrique">Électrique</option>                                 
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
