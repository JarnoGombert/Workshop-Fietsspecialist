<?php
    //Product Categorie items ophalen
    $sql = $mysqli->prepare(
        "SELECT * FROM digifixx_producten WHERE paginaurl = ? AND status = 'actief'"
    ) or die($mysqli->error . __LINE__);
    $voorwaarde = "product/" . basename($path);
    $sql->bind_param("s", $voorwaarde);
    $sql->execute();
    $result = $sql->get_result();
    $rowFiets = $result->fetch_assoc();

    if(isset($_POST['submit'])){
        // Get the user ID and product ID from the request parameters
        header('Location: ' . $url. "wijzig-winkelwagen?pd=" . $_POST['product_id'] . "&q=" . $_POST['quantity'] . "&opslaan=ja");
        exit;	
    } 
    ?>
<section class="contentProductMain">
    <div class="container mx-auto">
        <?php include 'php/breadcrumbs.php'; ?>
        <div class="product-detail">
        <div class="content">
            <aside>
                <div class="image-wrapper">
                    <div class="img">
                        <?php
                            $queryFIMG = $mysqli->query("SELECT * FROM digifixx_images WHERE product_id = ".$rowFiets['id']."");
                            $rowIMG = $queryFIMG->fetch_assoc();
                            if($queryFIMG->num_rows > 0)
                            {
                                $imageURL = 'img/'.$rowIMG["file_name"];
                            }else
                            {
                                $imageURL = 'img/noimg.jpg';
                            }
                        ?>
                        <img src="<?=$url;?><?=$imageURL;?>" height="100%" width="100%" alt="">
                    </div>
                </div>
            </aside>
            <article id="shopping-info">
                <div class="ProductDetailInfo">
                    <span class="title"><?=$rowFiets['merk'];?> <?=$rowFiets['model'];?> <?=$rowFiets['naam'];?></span>
                    <div class="productPrice">
                        <?php if($rowFiets['prijs_korting'] != "0"){?>
                                <span class="PrijsPproduct">€ <?=$rowFiets['prijs'];?></span><br/>
                                <span>Prijs: € <?=$rowFiets['prijs_korting'];?></span>
                        <?php } else { ?>
                            <span>Prijs: € <?=$rowFiets['prijs'];?></span>
                        <?php } ?>
                    </div>
                    <div class="product-informatie">
                        <?=$rowFiets['extras'];?>
                    </div>
                </div>
                <form id="taw" method="POST" action="#">
                    <label for="aantal">Aantal</label>
                    <input type="number" min="1" max="25" name="quantity" id="quantity">

                    <input type="hidden" name="product_id" value="<?=$rowFiets['id'];?>">

                    <input type="submit" name="submit" id="winkelwagenAdd" class="btn" value="Toevoegen aan winkelwagen">
                </form>
            </article>
        </div>
        </div>
    </div>
</section>