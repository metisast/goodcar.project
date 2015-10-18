<div id="slider">
    <div id="cbp-fwslider" class="cbp-fwslider">
        <ul>
            <li><a href="#"><img src="/guest-res/img/1.jpg" alt="img01"/></a></li>
            <li><a href="#"><img src="/guest-res/img/2.jpg" alt="img02"/></a></li>
            <li><a href="#"><img src="/guest-res/img/3.jpg" alt="img03"/></a></li>
            <li><a href="#"><img src="/guest-res/img/4.jpg" alt="img04"/></a></li>
            <li><a href="#"><img src="/guest-res/img/5.jpg" alt="img05"/></a></li>
        </ul>
    </div>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script defer src="/guest-res/js/jquery.cbpFWSlider.min.js"></script>
    <script>
        $('document').ready(function(){
            // init slider
            $('#cbp-fwslider').cbpFWSlider();

            /**
             Set a 3 seconds interval
             if next button is visible (so is not the last slide) click next button
             else it finds first dot and click it to start from the 1st slide
             **/
            setInterval( function(){
                if($('.cbp-fwnext').is(":visible"))
                {
                    $('.cbp-fwnext').click();

                }
                else{
                    $('.cbp-fwdots').find('span').click();
                }
            } ,5000 );
        });
    </script>
</div>