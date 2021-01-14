<?php
 
    //récupère tout les block
    function getAllBlocks($id)
    {
        $user="sql7386611";
        $pass="PbMqaKCgWu";
        $temp="";
        $data=[];
        $index=0;
        $db="sql7386611"; // pour sqli
        
        $dsn = "mysql:dbname=".$db.";host=sql7.freesqldatabase.com"; // pour pdo
        
        $conn=new PDO($dsn,$user,$pass) or die("Connection Failed");
        
        $query='SELECT * FROM block'; //ici le code sql
        
        $res  = $conn->query($query);
        
        while($test = $res->fetch(PDO::FETCH_ASSOC)) {
            $data[$index]=$test;
            $index=$index+1;
        }
        
        if (empty($data)){
            return "not_found";
        }
        else{
            return array_values($data);
        }
    }

    //récupère un block avec l'id
    function getBlocksNameAndPictureFromArray($id)
    {
        $user="sql7386611";
        $pass="PbMqaKCgWu";
        $temp="";
        $data=[];
        $index=0;
        $db="sql7386611"; // pour sqli
        
        $dsn = "mysql:dbname=".$db.";host=sql7.freesqldatabase.com"; // pour pdo
        
        $conn=new PDO($dsn,$user,$pass) or die("Connection Failed");
        
        $query='SELECT block.nom, block.image FROM block WHERE id IN ('.$id.')'; //ici le code sql
        
        $res  = $conn->query($query);
        
        while($test = $res->fetch(PDO::FETCH_ASSOC)) {
            $data[$index]=$test;
            $index=$index+1;
        }
        
        if (empty($data)){
            return "not_found";
        }
        else{
            return array_values($data);
        }
    }

    //récupère les blocks contenu dans une palette avec l'id
    function getBlocksFromPalette($id)
    {
        $user="sql7386611";
        $pass="PbMqaKCgWu";
        $temp="";
        $data=[];
        $index=0;
        $db="sql7386611"; // pour sqli
        
        $dsn = "mysql:dbname=".$db.";host=sql7.freesqldatabase.com"; // pour pdo
        
        $conn=new PDO($dsn,$user,$pass) or die("Connection Failed");
        
        $query='SELECT block.nom, block.image FROM block where id in ( SELECT palette_block.block_id FROM `palette_block` WHERE palette_block.palette_id = '.$id.')'; //ici le code sql
        
        $res  = $conn->query($query);
        
        while($test = $res->fetch(PDO::FETCH_ASSOC)) {
            $data[$index]=$test;
            $index=$index+1;
        }
        
        if (empty($data)){
            return "not_found";
        }
        else{
            return array_values($data);
        }
    }

    //récupère les informations d'une palette avec l'id
    function getPaletteWithId($id)
    {
        $user="sql7386611";
        $pass="PbMqaKCgWu";
        $temp="";
        $data=[];
        $index=0;
        $db="sql7386611"; // pour sqli
        
        $dsn = "mysql:dbname=".$db.";host=sql7.freesqldatabase.com"; // pour pdo
        
        $conn=new PDO($dsn,$user,$pass) or die("Connection Failed");
        
        $query='SELECT * FROM palette WHERE id ='.$id; //ici le code sql
        
        $res  = $conn->query($query);
        
        while($test = $res->fetch(PDO::FETCH_ASSOC)) {
            $data[$index]=$test;
            $index=$index+1;
        }
        
        if (empty($data)){
            return "not_found";
        }
        else{
            return array_values($data);
        }
    }

    //récupère toute les palettes
    function getAllPalette($id)
    {
        $user="sql7386611";
        $pass="PbMqaKCgWu";
        $temp="";
        $data=[];
        $index=0;
        $db="sql7386611"; // pour sqli
        
        $dsn = "mysql:dbname=".$db.";host=sql7.freesqldatabase.com"; // pour pdo
        
        $conn=new PDO($dsn,$user,$pass) or die("Connection Failed");
        
        $query='SELECT * FROM palette'; //ici le code sql
        
        $res  = $conn->query($query);
        
        while($test = $res->fetch(PDO::FETCH_ASSOC)) {
            $data[$index]=$test;
            $index=$index+1;
        }
        
        if (empty($data)){
            return "not_found";
        }
        else{
            return array_values($data);
        }
    }

    //récupère tout les types
    function getAllTypes($id)
    {
        $user="sql7386611";
        $pass="PbMqaKCgWu";
        $temp="";
        $data=[];
        $index=0;
        $db="sql7386611"; // pour sqli
        
        $dsn = "mysql:dbname=".$db.";host=sql7.freesqldatabase.com"; // pour pdo
        
        $conn=new PDO($dsn,$user,$pass) or die("Connection Failed");
        
        $query='SELECT * FROM block_type'; //ici le code sql
        
        $res  = $conn->query($query);
        
        while($test = $res->fetch(PDO::FETCH_ASSOC)) {
            $data[$index]=$test;
            $index=$index+1;
        }
        
        if (empty($data)){
            return "not_found";
        }
        else{
            return array_values($data);
        }
    }

    //upload la palette dans la base de donnée (photo est en base64 et $palette est un string modifier en array d'id)
    function uploadPalette($id)
    {
        $user="sql7386611";
        $pass="PbMqaKCgWu";
        $temp="";
        $data=[];
        $index=0;
        $db="sql7386611"; // pour sqli
        
        $dsn = "mysql:dbname=".$db.";host=sql7.freesqldatabase.com"; // pour pdo
        
        $conn=new PDO($dsn,$user,$pass) or die("Connection Failed");

        $photo;
        $palette;
        $titre;

        list($titre, $photo, $palette) = explode('*', $id);

        if($photo == "NULL"){
            $query='INSERT INTO palette (titre, photo)
            VALUES (\''.$titre.'\', NULL)'; //ici le code sql
        }
        else{
            $query='INSERT INTO palette (titre, photo)
            VALUES (\''.$titre.'\', \''.$photo.'\')'; //ici le code sql
        }

        $conn->query($query);

        //1 : trouver l'id de la palette qu'on vient de créer
        $cool = 1;

        $query='SELECT id FROM palette ORDER BY id DESC LIMIT 0, 1'; //ici le code sql
        
        $res  = $conn->query($query);
        
        while($test = $res->fetch(PDO::FETCH_ASSOC)) {
            $data[$index]=$test;
            $index=$index+1;
        }
        
        if (empty($data)){
            return "not_found";
        }
        else{
            $cool = $data[0]['id']; //récuperer l'id le plus grand
        }

        //2 : chopper les id de block et les mettre dans la table palette_block
        $tempString = '';
        for($i = 0; $i < strlen($palette); $i++){
            if($palette[$i] != '.'){
                $tempString += $palette[$i];
            } else {
                $query='INSERT INTO palette_block (palette_id, block_id)
                    VALUES ('.$cool.', '.$tempString.')'; //ici le code sql
                $conn->query($query);
                $tempString = '';
            }
        } 
       return "my work here is done";
    }
?>
