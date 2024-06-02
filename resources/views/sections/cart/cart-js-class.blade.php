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



    class ProductCart
    {
        apuUrl = '/cart';

        settings;
        products;

        // html сущности
        cartButton; // кнопка корзины вверху сайта
        cartFrom; // Форма корзины

        cartFormSelector = '#cartForm';
        cartHeaderButtonSelector = '#headerCartButton';



        constructor()
        {
            this.init();
        }

        async init() {
            this.cartFrom = document.querySelector(this.cartFormSelector);
            this.cartButton = new ProductCartHeaderCartButton(this.cartHeaderButtonSelector);

            await this.load();
        }

        async load()
        {
            let self = this;
            fetch(this.apuUrl)
                .then(response => response.json())
                .then(function(data) {
                    console.log(data)
                    if (data.products) {
                        self.setProducts(data.products)
                    }
                    if (data.settings) {
                        self.setSettings(data.settings)
                    }
                })
                .catch(error => console.error(error));
        }

        async addProduct(category, id, count = 1)
        {

        }

        setSettings(settings)
        {
            this.settings = settings;

            this.cartButton.setSettings(settings);

            for (let key in this.settings) {
                switch (key) {
                    // case
                }
            }
            console.log('Установка settings:');
            console.log(settings);
        }

        setProducts(products)
        {
            this.products = products
            console.log('Установка продуктов:');
            console.log(products);
        }

        post()
        {

        }

        loadLocalStorageProducts()
        {

        }

        loadSessionProducts()
        {

        }
    }

    let cart = new ProductCart();
</script>
