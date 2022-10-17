<?php

class Model_loggin extends Model
{
    public static function getModel()
    {
        if(is_null(Model::$instance)) {
            Model::$instance = new Model_loggin();
        }
        return Model::$instance;
    }

    public function getUserIdsFromEmail($email) {
        $reqSlq = "SELECT id_user, email, password FROM user WHERE email = :email";
        $r = $this->db->prepare($reqSlq);
        $r->execute([
            ':email' => $email
        ]);
        return $r->fetch(PDO::FETCH_OBJ);
    }

    public function getEmailFromEmail($email) {
        $reqSlq = "SELECT email FROM user WHERE email = :email";
        $r = $this->db->prepare($reqSlq);
        $r->execute([
            ':email' => $email
        ]);
        return $r->fetch(PDO::FETCH_OBJ);
    }

    public function insertUser($email, $hashedPassword, $name) {
        $reqSlq = "INSERT INTO user (email, password, name)
                    VALUES (:email, :password, :name)";
        $r = $this->db->prepare($reqSlq);
        $r->execute([
            ':email' => $email,
            ':password' => $hashedPassword,
            ':name' => $name
        ]);
    }

    public function getIdFromEmail($email) {
        $reqSlq = "SELECT id_user FROM user WHERE email = :email";
        $r = $this->db->prepare($reqSlq);
        $r->execute([
            ':email' => $email
        ]);
        return $r->fetch(PDO::FETCH_OBJ);
    }

    public function updatePassword($email, $newPassword) {
        $reqSlq = "UPDATE user SET password = :password WHERE email = :email";
        $r = $this->db->prepare($reqSlq);
        $r->execute([
            ':password' => $newPassword,
            ':email' => $email
        ]);
    }

    public function getPasswordFromId($userId) {
        $reqSlq = "SELECT password FROM user WHERE id_user = :id_user";
        $r = $this->db->prepare($reqSlq);
        $r->execute([
            ':id_user' => $userId
        ]);
        return $r->fetch(PDO::FETCH_OBJ);
    }

    public function updatePasswordFromId($userId, $newPassword) {
        $reqSlq = "UPDATE user SET password = :password WHERE id_user = :id_user";
        $r = $this->db->prepare($reqSlq);
        $r->execute([
            ':password' => $newPassword,
            ':id_user' => $userId
        ]);
    }

    public function deletePassedProducts($userId) {
        $reqSlq = "DELETE FROM user_product WHERE up_fk_user_id = :id_user AND (DATE(NOW()) - up_use_by_date > 6)";
        $r = $this->db->prepare($reqSlq);
        $r->execute([
            ':id_user' => $userId
        ]);
    }
}