<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <link rel="stylesheet" href="style.css">
        <title>Echecs PHP</title>
    </head>


    <body>
        <section id="wrapper">
            <div id="plateau">
                <?php

                    // APPEL DES FONCTIONS -----------------------------------------

                    echo createEchiquier();

                    // --------------------------------------------------



                    // FONCTIONS -----------------------------------------

                    // Fonctionne qui retourne une STRING qui permet de générer une case avec en ID ses coordonnées
                    // au format lettre-nombre. Exemples : D-1, H-3, B-7.
                    function createCase(Int $rowNb, Int $column){

                        $letter = convertirCoordNombreEnLettre($rowNb);

                        // variable pouvant contenir la valeur "noir" (classe CSS) pour afficher la case
                        // en noir. Si la valeur est "", le CSS affichera la case blanche par défaut.
                        $class = "";

                        // Cette conditionnelle permet d'alterner les couleurs des cases.
                        if($rowNb % 2 == 1){    
                            if($column % 2 == 0){
                                $class.= "noir";
                            }
                        }
                        else{
                            if($column % 2 == 1){
                                $class.= "noir";
                            }
                        }
                        return "<div id='$letter-$column' class='caseEchec $class'>".imgPiece($letter, $column)."</div>";
                    }

                    function createRow(Int $rowNb, $nbColumn){
                        $str = "<div class='rowEchec'>";
                        $caseNb = 1;
                        for($i = 1; $i <= $nbColumn; $i++){
                            $str.= createCase($rowNb, $caseNb);
                            $caseNb++;
                        }
                        $str.= "</div>";
                        return $str;
                    }

                    function createPlateau(Int $nbRow, Int $nbColumn){
                        $str = "<div class='echiquier'>";
                        for($i = 1; $i <= $nbRow; $i++){
                            $rowNb = $i;
                            $str.= createRow($rowNb, $nbColumn);
                        }
                        $str.= "</div>";
                        return $str;
                    }

                    function createEchiquier(){
                        createPlateau(8,8);
                    }






                    function convertirCoordNombreEnLettre(Int $nombre){
                        // Comme la génération du plateau se fait de haut en bas,
                        // la ligne 1 (A) se trouve tout en haut du plateau alors
                        // qu'elle devrait se trouver tout en bas. Pour contourner
                        // le problème, le numéro réel de la ligne est le complément
                        // du $nombre pour arriver à 9.
                        $nombreInverse = 9 - $nombre;
                        $tabCorrespondance = ["A", "B", "C", "D", "E", "F", "G", "H"];
                        return $tabCorrespondance[$nombreInverse - 1];
                    }


                    // Fonction qui renvoie en une STRING, une balise image avec l'url correspondant
                    // à l'image à afficher dans la bonne case.
                    // Si la case ne doit pas contenir d'image, la fonction renvoie
                    // une chaine de caractères vide.
                    function imgPiece($letter, $column){
                        // Ce premier if permet d'alléger l'exécution du programme
                        // en n'effectuant les instruction uniquement sur les lignes
                        // nécessaires.
                        if($letter == "A" || $letter == "B" || $letter == "G" || $letter == "H"){

                            $tabPieces = ["tour", "cavalier", "fou", "reine", "roi", "fou", "cavalier", "tour", "pion"];

                            // Cette conditionnelle permet de déterminer la couleurs de la pièce suivant la ligne
                            // sur laquelle elle se trouve.
                            // La valeur de cette variable DOIT être identique au nom du dossier dans lequel se trouvent
                            // pièces voulues. (par défaut img/$colour/<nom_de_la_pièce>.png)
                            if($letter == "A" || $letter == "B"){
                                $colour = "blancs";
                            }
                            else $colour = "noirs";

                            // Une conditionnelle qui décide quelle pièce afficher. B et G étant les lignes pour les pions,
                            // il suffit de "boucler" sur $tabPieces uniquement pour les autres pièces.
                            if($letter == "A" || $letter == "H"){
                                // supposons une colonne = une pièce. Ce qui permet d'ailleurs d'avoir les
                                // deux reines l'une en face de l'autre.
                                return "<img src='img/$colour/".$tabPieces[$column-1].".png'>";
                            }
                            // les pions utilisant la même image, une seule récurrence dans le tableau est nécessaire.
                            else return "<img src='img/$colour/".$tabPieces[8].".png'>";
                        }
                        else return "";
                    }



                    // --------------------------------------------------

                ?>
            </div>
        </section>
    </body>
</html>