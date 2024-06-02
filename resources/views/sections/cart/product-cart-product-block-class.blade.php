
<script>
    class ProductCartProductBlock
    {
        productBlockElement;
        products = [];


        constructor(productBlockElement) {
            this.productBlockElement = productBlockElement;
        }

        setProducts(products)
        {
            this.products = [];
            for (let i in products) {
                this.products.push(products[i])
            }
        }

        setSettings(settings)
        {
            console.log('Устанавливаем настройки ProductCartProductBlock');
        }
    }
</script>
