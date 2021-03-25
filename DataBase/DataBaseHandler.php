<?php
//This is the DataBase Class (Basicly Connecting to dataBase and Hold all Info -S with Self Function's) -S
//Basic Idea is this PHP talk's with the DataBase and hold the Function's need'd for Function on the DataBase -S


//Class DataHandler Easy for use creating object Data each time New is call'd Get construct and Open "New Session" -S
class DataHandler {
    //the Host *Localhost wamp -S
    const DATAB_HOST = 'localhost';
    //In same Folder so Root -S
    const DATAB_USERNAME = 'root';
    //The PASSWORD for DataBase '' nothing -S
    const DATAB_PASSWORD = '';
    //FaceAfeka DataBase (CREATED IN FaceAfekaDataBase.sql -S
    const DATAB_NAME = 'FaceAfekaDATA';
    
    //Private ! Connection so no one else can access only the Handler -S
    private $connection;
    //
    function __construct()
    {

       // IN ORDER FOR THIS TO WORK FIRST NEED TO TAKE THE DATA .SQL -S
       // Press Wamp! phpMyAdmin -> userName root (ENTER) --> in the data base IMPORT --> chose the File --> GO! .sql Add'd to the Main Data! -S
        
        //when Call'd new Creates Connection with Our DataBase "FaceAfekaDATA" -S 
        //We use mySqli for Protection (Cant get injected i stand's for Improved) -S
        $this->connection = mysqli_connect(self::DATAB_HOST, self::DATAB_USERNAME, self::DATAB_PASSWORD, self::DATAB_NAME );
        //If Connection Cant be Astablished Push error 404 -S
        if($this->connection === false) {
            //Kills the DataHanlder Object
            die("could not connect to database");
        }
    }
    
    //One Done using Close the Connection to DataBase -S 
    function __destruct()
    {
        mysqli_close($this->connection);
    }
    
    // Same as requested! from Teacher Calculating Password -S
    function CalculatePassword($pass) {
        
        //Handler take's the password first take's first annd password takes first again -S
        $pass=$pass[0].$pass.$pass[0]; 
        //Take's Password end Encrypt it md5 -S
        $pass=md5($pass);
        //Return's the Password -S
        return $pass;
    }
    
    
    
    

    /* Checks the user and password for match. Returns a STRING of the password if authorized, FALSE if not allowed. */
    function CheckUserPassword($user,$pass) {//If true we have to encript
        //Have no idea Wtf is if True -S
        global $protect_user_group;
        
        //If it's Empty East Return False $resoult =false -S
        if ($user=="" || $pass=="")
            return false;
        

            //Get's the Encrypted Password -S
            $encrypted_pass = $this->CalculatePassword($pass);
            //Get's a query from the DataBase -S
            $query = "SELECT Username FROM Users WHERE Username like binary '".$user."' AND Password like binary '".$encrypted_pass."';";
            // From string to Query -S
            $result = mysqli_query($this->connection, $query);
            //if we have one match in the quary same as Resoult query! -S
            if (mysqli_num_rows($result) == 1){
                //User is in DataBase -S and he enter'd the right password -S
                return true;
            }
            return false;
    }
    
    
    
    
    
    
    
    
}
?>