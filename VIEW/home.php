<div class="container">

    <?php
    /*
     * Message d'erreur si modification de mot de passe de l'utilisateur pas bien fait
     * */
    if (isset($_SESSION['errorpwd'])) {
        $msg = $_SESSION['errorpwd'];
        echo '<div class="alert alert-danger">' . $msg . '</div>';
        unset($_SESSION['errorpwd']);
    }
    /*
    * Message pour avertir que le mot de passse a bien été modifié
    */
    if (isset($_SESSION['successpwd'])) {
        $msgSuccess = $_SESSION['successpwd'];
        echo '<div class="alert alert-success">' . $msgSuccess . '</div>';
        unset($_SESSION['successpwd']);
    }

    ?>
    <div class="container my-4">
        <h2>Dernier ajout</h2>
        <hr class="my-4">

        <!--Carousel Wrapper-->
        <div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">

            <!--Slides-->
            <div class="carousel-inner" role="listbox">

                <!--First slide-->
                <div class="carousel-item active">

                    <div class="row">
                        <?php
                        for($i = 0; $i<3; $i++)
                        {
                            echo '<div class="col-md-4">
                            <div class="card mb-2">
                                <img class="card-img-top" src="../VIEW/img/'.$cars->data[$i]->picture.'"
                                     alt="Card image cap">
                                <div class="card-body">
                                    <h4 class="card-title">'.$cars->data[$i]->model.'</h4>
                                    <p class="card-text">
                                    <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><i class="fas fa-euro-sign"></i></i> '.number_format($cars->data[$i]->unitprice, 2, ',', ' ').'</li>
                                    <li class="list-group-item"><i class="fas fa-road"></i></i> '.number_format($cars->data[$i]->kilometer, 2, ',', ' ').' Km</li>
                                    <li class="list-group-item"><i class="fas fa-gas-pump"></i> ' . $cars->data[$i]->fuel . '</li>
                                    </ul>
                                        </p>
                                    <a href="../CONTROL/cars.php" class="btn btn-warning"><i class="far fa-eye"></i></a>
                                </div>
                            </div>
                        </div>';
                        };
                        ?>
                    </div>
                </div>
                <!--/.First slide-->
            </div>
            <!--/.Slides-->
        </div>
        <!--/.Carousel Wrapper-->

    </div>

    <div class="container my-4">
        <h2>Dernière vente</h2>
        <hr class="my-4">
        <table class="table table-hover">

            <th scope="col">Modèle</th>
            <th scope="col">Prix de base</th>
            <th scope="col">Prix de vente</th>
            <th scope="col">Vendu par</th>

            <tbody>

            <?php
            foreach ($orderDetails->data as $k)
            {
                echo '<tr>';

                echo '<td>'.$k->model.'</td>';
                echo '<td>'.number_format($k->unitprice, 2, ',', ' ').' €</td>';
                if($k->priceUnitOrder == $k->unitprice){
                    echo '<td style="color: green">'.number_format($k->priceUnitOrder, 2, ',', ' ').' €</td>';
                }else{
                    echo '<td style="color: red">'.number_format($k->priceUnitOrder, 2, ',', ' ').' €</td>';

                }
                echo '<td>'.$k->name.' '.$k->firstname.'</td>';
                echo '</tr>';
            }
            ?>
            </tbody>
        </table>
    </div>


</div>


