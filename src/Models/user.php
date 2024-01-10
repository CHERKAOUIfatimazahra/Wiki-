<?php

namespace MVC\Model;

use MVC\connexion\connexion;
use MVC\interfaces\Crud as CrudInterface;
use MVC\Model\Crud as CrudAlias;
use PDO;

class User extends CrudAlias
{
   private int $id;
   private string $username;
   private string $email;
   private string $password;
   private int $roleID;
   
   public function __construct(string $username="",string $email="",string $password="",int $roleID=0,int $id=0)
   {
     $this->username = $username;
     $this->email = $email;
     $this->password = $password;
     $this->roleID = $roleID;
     $this->id = $id;
   }

   public function getUsername():string
   {
        return $this->username;
   }
   public function setUsername(string $username)
   {
        $this->username = $username;
   }
   public function getEmail():string
   {
        return $this->email;
   }
   public function setEmail(string $email)
   {
        $this->email = $email;
   }
   public function getPassword():string
   {
        return $this->password;
   }
   public function setPassword(string $password)
   {
        $this->password = $password;
   }
   public function getRoleID(): int
   {
        return $this->roleID;
   }
   public function setRoleID(int $roleID)
   {
        $this->roleID = $roleID;
   }
   public function getId():int
   {
        return $this->id;
   }
   public function setId(int $id)
   {
        $this->id = $id;
   }

//model
public function edit():void
{
    $this->update('user', $this->id, ['username' => $this->username,'email' => $this->email,'password'=> $this->password,'roleID'=>$this->roleID]);
}
public function add_user(): void
{
    $this->id = $this->insert('user',['username' => $this->username,'email' => $this->email,'password'=> $this->password,'roleID'=>$this->roleID]); 
}
public function destroy():void
{
    $this->delete('user', $this->id);
}
public function show(): object
{
    return $this->select('user', $this->id); 
}
public function showAll(): array
{
    return $this->selectAll('user');
}

}