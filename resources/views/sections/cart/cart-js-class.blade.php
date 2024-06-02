@include('sections.cart.product-cart-header-cart-button-class')
@include('sections.cart.product-cart-form-class')
<script>
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
            this.cartFrom = new ProductCartForm(this.cartFormSelector);
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
