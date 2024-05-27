<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <?php
        // $slides = [
        //     ["src" => "image1.jpg", "alt" => "Первый слайд"],
        //     ["src" => "image2.jpg", "alt" => "Второй слайд"],
        //     ["src" => "image3.jpg", "alt" => "Третий слайд"],
        // ];

        // foreach ($slides as $index => $slide) {
        //     $activeClass = $index === 0 ? 'class="active"' : '';
        //     echo "<li data-target='#carouselExampleIndicators' data-slide-to='$index' $activeClass></li>";
        // }
        ?>
    </ol>
    <div class="carousel-inner">
        <?php
        // foreach ($slides as $index => $slide) {
        //     $activeClass = $index === 0 ? 'active' : '';
        //     echo "
        //     <div class='carousel-item $activeClass'>
        //         <img src='{$slide['src']}' class='d-block w-100' alt='{$slide['alt']}'>
        //     </div>";
        // }
        ?>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>