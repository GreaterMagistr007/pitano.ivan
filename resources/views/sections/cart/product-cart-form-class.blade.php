@include('sections.cart.product-cart-product-block-class')
<script>
    class ProductCartForm
    {
        productCartFormElement;
        productCartProductsBlock;
        productCartProductsBlockSelector = '#productCartProductsBlock';

        constructor(selector)
        {
            this.productCartFormElement = document.querySelector(selector);
            this.productCartProductsBlock = new ProductCartProductsBlock(this.findElement(this.productCartProductsBlockSelector));
        }

        setSettings(settings = {})
        {
            this.productCartProductsBlock.setSettings(settings);
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
