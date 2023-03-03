<div class="flexslider basis-slider">
        <div class="swiper mySwiper">
        <div class="swiper-wrapper">
                <?php for($i = 1; $i <= 4; $i++){ 
                       echo '<div class="swiper-slide"><img src="'.$url.'Images/foto_'.$i.'.png" alt=""></div>';   
                } ?>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-pagination"></div>
        </div>	
</div>