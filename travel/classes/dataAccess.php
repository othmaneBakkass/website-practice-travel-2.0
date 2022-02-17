<?php
class Dataaccess
{

    public static  function connextion()
    {
        try {
            $bdd = new PDO('mysql:host=localhost;dbname=travel', 'root', '');

            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $bdd;
        } catch (Exception $e) {
            echo ('Erreur : ' . $e->getMessage());
        }
    }

    //methode de mise à jour

    public static function report($req)
    {
        try {
            $bdd = Dataaccess::connextion();
            $maj = $bdd->exec($req);
            return $maj;
        } catch (Exception $e) {
            echo ('Erreur : ' . $e->getMessage());
        }
        $bdd = null;
    }

    public static function check($req)
    {
        try {
            $bdd = Dataaccess::connextion();
            $result = $bdd->query($req);
            $maj = $result->rowCount();
            return $maj;
        } catch (Exception $e) {
            echo ('Erreur : ' . $e->getMessage());
        }
        $bdd = null;
    }


    //Methode de selection

    public static function selection($req)
    {
        try {
            $bdd = self::connextion();
            $rep = $bdd->query($req);
            return $rep;
        } catch (Exception $e) {
            echo ('Erreur : ' . $e->getMessage());
        }
        $bdd = null;
    }
}
