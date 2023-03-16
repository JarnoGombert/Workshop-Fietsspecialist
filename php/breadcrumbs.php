<section id="breadcrumbs">
    <div class="container mx-auto">
        <ul itemscope itemtype="https://schema.org/BreadcrumbList">
            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                <a itemprop="item" href="<?=$url;?>">        
                    <span itemprop="name">Home</span>
                    <meta itemprop="position" content="1" />
                </a>
            </li>
            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                <a itemprop="item">        
                    <span itemprop="name"><?=$row['item1'];?></span>
                    <meta itemprop="position" content="2" />
                </a>
            </li>
        </ul>
    </div>
</section>
