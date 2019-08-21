<?php
/**
 * RegisterTermForm class.
 * RegisterTermForm is the data structure for keeping
 * user register form data. It is used by the 'register' action of 'SiteController'.
 */

class RegisterTermForm extends CFormModel
{
    public $agree;

    /**
     * Declares the validation rules.
     * The rules state that username and password are required,
     * and password needs to be authenticated.
     */
    public function rules()
    {
        return array(
            // agree are required
            array('agree', 'required'),
            // agree needs to be a boolean
            array('agree', 'boolean'),

        );
    }
    /**
     * Declares attribute labels.
     */
    public function attributeLabels()
    {
        return array(
            'agree'=>'I have read and agree to the Terms and Conditions and Privacy Policy',
        );
    }
}