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

                    // EVENTS -------------------------------------------
                        // bouton submit ECHECS
                    $nbEchecs = 0;
                    $nbDames = 0;
                    function genererEchecs(){
                        nbEchecs += 1
                        console.log(document.querySelector("#plateau").appendChild(createPlateau(8)))
                        let rows = document.querySelector("#echiquier" + nbEchecs).childNodes
                        let tabPieces = ["tour", "cavalier", "fou", "reine", "roi", "fou", "cavalier", "tour", "pion", "pion", "pion", "pion", "pion", "pion", "pion", "pion"]
                        for(let i = 0; i < 8; i++){
                            if(i <= 1){   // pour éviter de boucler pour rien sur les rows en milieu de plateau
                                // Pièces du joueur noir
                                let cases = rows[i].childNodes
                                for(let j = 0; j < 8 ; j++){
                                    let x = (i == 1) ? j+8 : j
                                    cases[j].innerHTML = "<img src='img/noirs/" + tabPieces[x] + ".png'>"
                                }
                            }
                            if(i >= 6){
                                // Pièces du joueur blanc
                                let cases = rows[i].childNodes
                                let k = 0
                                for(let j = 7; j >= 0 ; j--){
                                    let x = (i == 6) ? j+8 : j
                                    cases[k].innerHTML = "<img src='img/blancs/" + tabPieces[x] + ".png'>"
                                    k++
                                }
                            }
                        }
                    }

                        // bouton submit DAMES 
                    document.querySelector("#formDames").addEventListener("submit", (event) => {
                        event.preventDefault()
                        nbDames += 1
                        console.log(document.querySelector("#plateau").appendChild(createPlateau(10)))
                        let rows = document.querySelector("#damier" + nbDames).childNodes
                        for(let i = 0; i < 10; i++){
                            if(i <= 3){
                                let cases = rows[i].childNodes
                                for(let j = 0; j < 10; j++){
                                    if(j % 2 === 1){
                                        cases[j].innerHTML = "<img src='img/noirs/pion.png'>"
                                    }
                                }
                            }
                            if (i >= 6){
                                let cases = rows[i].childNodes
                                for(let j = 0; j < 10; j++){
                                    if(j % 2 === 1){
                                        cases[j].innerHTML = "<img src='img/blancs/pion.png'>"
                                    }
                                }
                            }
                        }
                    })
                    // --------------------------------------------------

                    // FONCTIONS ----------------------------------------
                    function createCase(nb){

                        let casePlateau = document.createElement("div")

                        if(nb === 8){
                            casePlateau.classList.add("caseEchec")
                            return casePlateau
                        }
                        else if(nb === 10){
                            casePlateau.classList.add("caseDames")
                            return casePlateau
                        }

                    }

                    function createRow(nb){     // Permet de créer une ligne avec nb cases

                        let rowPlateau = document.createElement("div")

                        rowPlateau.classList.add("rowPlateau")
                        for(let i = 1; i <= nb; i++) {
                            rowPlateau.appendChild(createCase(nb))
                        }
                        return rowPlateau
                    }

                    function createPlateau(nb){

                        let plateau = document.createElement("div")

                        if(nb === 8){
                            plateau.classList.add("echiquier")
                            plateau.id = "echiquier" + nbEchecs
                            for(let i = 1; i <= nb; i++) {
                                plateau.appendChild(createRow(nb))
                            }
                            return plateau
                        }
                        else if(nb === 10){
                            plateau.classList.add("damier")
                            plateau.id = "damier" + nbDames
                            for(let i = 1; i <= nb; i++) {
                                plateau.appendChild(createRow(nb))
                            }
                            return plateau
                        }
                    }
                    // --------------------------------------------------
                ?>
            </div>
        </section>
    </body>
</html>