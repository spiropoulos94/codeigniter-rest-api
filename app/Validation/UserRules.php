<?php

namespace App\Validation;

use App\Models\UserModel;
use Exception;

class UserRules
{
    public function validateUser(string $str, string $fields, array $data): bool
    {

        // $str einai to input to opoio ginetai validate (edw einai to password1234)
        // $fields einai ta fields pou pernaei mesa to validateUser([email, password]) diladi => email, password
        // $data einai all of the data that was submitted the form.

        //ETSI EINAI BY DEFAULT, DEN ALLAZEI. ETSI THA TO XRISIMOPOIHSEI TO CI STO CONFIG VALIDATION

        // echo "<pre>";
        // echo  $str;
        // echo "<br>";
        // echo  $fields;
        // echo "<br>";
        // print_r ($data);
        // echo "<br>";
        // echo "telos";
        // die();

        try {
            $model = new UserModel();
            $user = $model->findUserByEmailAddress($data['email']);
            return password_verify($data['password'], $user['password']);
        } catch (Exception $e) {
            return false;
        }
    }
}
