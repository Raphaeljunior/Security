<?php
class requestManager {
    private $ctId,$ctName,$ctPhoneNo,$ctEmail,$ctPassword,$activeConn,$query,$result,$response,$toReturn,$List;

     function register($setConn,$id,$name,$phone,$mail,$password){
         $this->activeConn = $setConn;
         $this->ctId=$id;
         $this->ctName=$name;
         $this->ctEmail = $mail;
         $this->ctPhoneNo = $phone;
         $this->ctPassword = $password;

         $this->query = "INSERT INTO citizendetails (citizenid,citizenName,phoneNo,email,password) VALUES
         ('$this->ctId','$this->ctName','$this->ctPhoneNo','$this->ctEmail','$this->ctPassword')";

         //query to insert values to database
         $this->result = mysqli_query($this->activeConn,$this->query);
         if ($this->result){
             $this->response = array();
             $this->response['success'] = 1;
             $this->response['message'] = "Registration successful";
             $this->toReturn = $this->response;
         }else{
             $this->response = array();
             $this->response['success'] = 0;
             $this->response['message'] = "Ooops! An error occured during registration.";
             $this->toReturn = $this->response;
         }
         return $this->toReturn;
     }

    function  GetEmptySpace($setConn){
        $this->activeConn = $setConn;
        $this->query = "SELECT * FROM parkingspace WHERE full = 'no'";
        $this->result = mysqli_query($this->activeConn,$this->query);

        if ($this->result){
            $this->response = array();
            $this->response["success"] = 1;
            $this->List = array();
            $this->response['message'] = array();
            while ($ro = mysqli_fetch_array($this->result)){

                $this->List["spaceName"] = $ro["spaceName"];
                $this->List["price"] = $ro["price"];
                $this->List["distance"] = $ro["distance"];
                $this->List["latitude"] = $ro["lat"];
                $this->List["longitude"] = $ro["lng"];
                $this->List["noofspaces"] = $ro["noOfSpaces"];
                array_push($this->response['message'],$this->List);
            }
        }//}else{
               // $this->response["success"] = 0;
                //$this->response["message"] = "All spaces are currently filled!";
        //}

        $this->toReturn = $this->response;
        return $this->toReturn;
    }

    function RegisterSpace($connCurr,$spaceName,$price,$distance,$lat,$lng,$noofspaces){
        $this->activeConn = $connCurr;
        $full = "no";
        $this->query = "INSERT INTO parkingspace (spaceName,price,lat,lng,noOfSpaces,full) VALUES
                        ('$spaceName','$price','$lat','$lng','$noofspaces','$full')";
        $this->result = mysqli_query($this->activeConn,$this->query);
        $this->response = array();
        if ($this->result){
            $this->response['success'] = 1;
            $this->response['message'] = "Parking space " . $spaceName . " successfully added with " . $noofspaces .  " spaces.";
        }else{
            $this->response['success'] = 0;
            $this->response['message'] = "Parking space " . $spaceName . " not successfully added.";
        }
        $this->toReturn = $this->response;
        return $this->toReturn;
    }
}
