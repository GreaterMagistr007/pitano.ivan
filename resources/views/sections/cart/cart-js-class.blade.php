<script>
    class ProductCart
    {
        apuUrl = '/cart';

        settings;
        products;

        // html сущности
        cartButton; // кнопка корзины вверху сайта
        cartFrom; // Форма корзины

        constructor()
        {
            this.init();
        }

        async init() {
            let result = await this.load();
            console.warn(result);
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

        setSettings(settings)
        {
            this.settings = settings;

            for (let key in this.settings) {

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
