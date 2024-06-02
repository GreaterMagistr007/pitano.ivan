<script>
    class ProductCartHeaderCartButton
    {
        cartButtonElement;
        productCountBadge;

        constructor(selector)
        {
            this.cartButtonElement = document.querySelector(selector);
            this.productCountBadge = this.cartButtonElement.querySelector('.header-cart__num');
        }

        setSettings(settings = {})
        {
            for (let key in settings) {
                let value = settings[key];
                if (key === 'cart_button_inner_image') {
                    // Изображение кнопки "Корзина"
                    this.cartButtonElement.querySelectorAll('img').forEach(function(el) {
                        el.src = value;
                    });
                }
                if (key === 'cart_button_product_count_badge_background_color') {
                    // Цвет заднего фона баджи количества товаров кнопки "Корзина"
                    this.productCountBadge.style.backgroundColor = value;
                }
                if (key === 'cart_button_product_count_badge_font_color') {
                    // Цвет шрифта баджи количества товаров кнопки "Корзина"
                    this.productCountBadge.style.color = value;
                }
            }
        }

        setProductCount(count)
        {
            let c = parseInt(count);
            if (c < 1) {
                c = '';
            }
            this.productCountBadge.innerHTML = c;
        }
    }
</script>
