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
                    if (data.settings) {
                        self.setSettings(data.settings)
                    }
                    if (data.products) {
                        self.setProducts(data.products)
                    }
                })
                .catch(error => console.error(error));
        }

        async addProduct(category, id, count = 1)
        {

        }

        getProductBlock(productId)
        {
            productId = parseInt(productId);
            return this.cartFrom.productCartProductsBlock.getProductBlockByProductId(productId);
        }

        setSettings(settings)
        {
            this.settings = settings;

            this.cartButton.setSettings(settings);
            this.cartFrom.setSettings(settings);

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
            for (let i in products) {
                if (products[i].id) {
                    let title = (title in products[i]) ? products[i].title : null;
                    let image = (image in products[i]) ? products[i].image : null;
                    let count = (count in products[i]) ? products[i].count : 0;
                    let price = (price in products[i]) ? products[i].price : null;

                    this.products.push(
                        new CartProduct(products[i].id, title, image, count, price, this)
                    );
                }
            }

            console.log('Установка продуктов:');
            console.log(this.products);
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
