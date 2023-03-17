<section class="contentVervolgMain">
    <div class="container mx-auto">
        <?php include 'php/breadcrumbs.php'; ?>
        <div class="title"><?=$row['item1'];?></div>
        <div class="content">
            <aside><?php include 'php/afbeeldingen-zijkant.php'; ?></aside>
            <article><?=$row['tekst'];?></article>
        </div>
        <?php
            if($row['id'] == '4') {
                include 'php/contact.php';
            }
            if($row['id'] == '2') {
                include 'php/producten.php';
            }
        ?> 
    </div>
</section>