<?php

        try {
        $db = new PDO('mysql:localhost;dbname=deckbuilder','deckbuilder','deckbuilder');
        $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            try {
                $prep = $db->prepare("SELECT * FROM deckbuilder.cards");
                $prep->execute();
                $result = $prep->fetchAll(PDO::FETCH_ASSOC);

                echo json_encode($result);
            
            } catch(PDOException $th) {
                echo "Error en quwery". $th->getMessage();
            }

        }catch(PDOException $th) {
            echo $th->getMessage();
        }


?>