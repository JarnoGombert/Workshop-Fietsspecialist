<section class="contentVervolgMain">
    <div class="container mx-auto">
        <?php include 'php/breadcrumbs.php'; ?>
       <div class="title"><?=$row['item1'];?></div>

        <?php
            if($row['id'] == '4') {
                include 'php/contact.php';
            }
        ?> 
    </div>
</section>