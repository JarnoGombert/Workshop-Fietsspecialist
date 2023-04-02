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
    } ?>
<section class="contentProductMain">
    <div class="container mx-auto">
        <?php include 'php/breadcrumbs.php'; ?>
        <div class="title"><?=$rowFiets['merk'];?> <?=$rowFiets['model'];?> <?=$rowFiets['naam'];?></div>
        <div class="product-detail">
            <aside id="images">

            </aside>
            <article id="shopping-info">
                <form id="taw" method="POST" action="#">
                    <label for="aantal">Aantal</label>
                    <input type="number" name="quantity" id="quantity">

                    <input type="hidden" name="product_id" value="<?=$rowFiets['id'];?>">

                    <input type="submit" name="submit" id="winkelwagenAdd" class="btn" value="Toevoegen aan winkelwagen">
                </form>
            </article>
        </div>
    </div>
</section>