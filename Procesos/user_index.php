<?php


include_once 'Procesos/user_index.php';
include_once 'Procesos/index_session.php';
include_once 'Procesos/db.php';


class User extends DB{

public function userExists($user, $pass){
       
     
    $query = $this->connect()->prepare('SELECT * FROM usuario WHERE NombreU = :user and 
    ContraU = :pass');
    $query->execute(['user' => $user, 'pass'=> $pass]);

    if($query->rowCount()){
        return true;
    }else{
        return false;
    }

}
public function setUser($user){
        $query = $this->connect()->prepare('SELECT * FROM usuario WHERE NombreU = :user');
        $query->execute(['user' => $user]);

        foreach ($query as $currentUser) {
            $this->Nombre = $currentUser['Nombre'];
        }
    }
public function getNombre(){
        return $this->Nombre;
    }

}

?>