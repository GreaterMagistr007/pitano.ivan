@include('sections.cart.product-cart-product-block-class')
<script>
    class ProductCartForm
    {
        productCartFormElement;
        productCartProductBlock;
        productCartProductBlockSelector = '#productCartProductBlock';

        constructor(selector)
        {
            this.productCartFormElement = document.querySelector(selector);
            this.productCartProductBlock = new ProductCartProductBlock(this.findElement(this.productCartProductBlockSelector));
        }

        setSettings(settings = {})
        {
            this.productCartProductBlock.setSettings(settings);
            for (let key in settings) {
                let value = settings[key];


            }
        }

        findElement(selector)
        {
            return this.productCartFormElement.querySelector(selector);
        }
    }
</script>
