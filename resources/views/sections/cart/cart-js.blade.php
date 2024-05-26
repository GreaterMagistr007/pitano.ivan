<script>
    window.addEventListener('load',function(){
        var notWorkingNow = document.querySelector('.order.form.form-small.notWorkingNow');
        if(notWorkingNow){
            // var notWorkingNowItems = notWorkingNow.children;
            // for(var i=0;i<notWorkingNowItems.length;i++){
            //     notWorkingNowItems[i].style.display = 'none!important';
            // }
            // var image = document.createElement('img');
            // image.src = "/img/notWorking.jpg";
            // image.style.width = '70%';
            // notWorkingNow.appendChild(image);


            notWorkingNow.innerHTML='<img src="/img/notWorking.jpg" alt="" style="width: 70%;">';
        }
    })

    function setSamovivoz(elem){
        elem.querySelector('.samovivoz').classList.toggle('active');
        var cartBlock = document.querySelector('header form.order');
        cartBlock.querySelectorAll('.deactivate').forEach(function(elem){elem.classList.toggle('hidden');});
        if(elem.querySelector('.samovivoz.active')){
            cartBlock.querySelector('#order-street').removeAttribute('required');
            cartBlock.querySelector('.payment-row input').click();

            document.querySelector('#DeliveryOrSam').value='Самовывоз';

        }else{
            cartBlock.querySelector('#order-street').setAttribute('required',true);
            document.querySelector('#DeliveryOrSam').value='Доставка';
        }
        repaintCart();
    }

    let check_samovivoz_selector = '.order-head .samovivoz_selector_in_cart_block';
    document.querySelectorAll(check_samovivoz_selector).forEach(function(el){
        el.classList.add('unselectable');
        el.addEventListener('click',function(){
            let old_elem = document.querySelector('.order-head .samovivoz_selector_in_cart_block.active');
            document.querySelectorAll(check_samovivoz_selector).forEach(function(elem){elem.classList.remove('active')});
            this.classList.add('active');

            if(old_elem!=this){
                setSamovivoz(document.querySelector('.order-head .samovivoz_selector_in_cart_block.really_samovivoz'));
            }
        });
    });
</script>
