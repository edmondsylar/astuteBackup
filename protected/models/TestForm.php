<?php
/**
 * TestForm class.
 * TestForm is the data structure for keeping
 * user register form data. It is used by the 'register' action of 'SiteController'.
 */

class TestForm extends CFormModel
{
//    public $names;
//    public $gender;
//    public $phone;
//    public $date_of_birth;
//    public $email;
//    public $password;
//    public $dial_code;
//
//    private $user;
//
//    /**
//     * Declares the validation rules.
//     * The rules state that names, gender, email, phone, date_of_birth and password are required,
//     * and email needs to be unique
//     */
//    public function rules()
//    {
//        return array(
//            // username and password are required
//            array('names, gender, email, phone, date_of_birth, password', 'required'),
//
//        );
//    }
//
//    /**
//     * unique  the email.
//     * This is the 'authenticate' validator as declared in rules().
//     * @param string $attribute the name of the attribute to be validated.
//     * @param array $params additional parameters passed with rule when being executed.
//     */
//    function is_email_available($email)
//    {
//        $this->db->where('email', $email);
//        $query = $this->db->get("t_users_register");
//        if($query->num_rows() > 0)
//        {
//            return true;
//        }
//        else
//        {
//            return false;
//        }
//    }
}