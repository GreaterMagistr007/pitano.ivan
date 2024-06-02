<script>
    class ProductCartProductsBlock {
        productBlockElement;
        settings;
        products = [];


        constructor(productBlockElement) {
            this.productBlockElement = productBlockElement;
        }

        setProducts(products)
        {
            this.deleteProducts();
            for (let i in products) {

                this.products.push(products[i])
            }
        }

        getProducts()
        {
            let hasChanges = false;

            // Проверим на наличие удаленных продуктов
            for (let i in this.products) {
                try {
                    if (!this.products[i].getCount() || this.products[i].isDeleted) {
                        hasChanges = true;
                    }
                } catch (e) {
                    this.products[i].isDeleted = true;
                    hasChanges = true;
                }
            }

            // Есть изменения. Пересоберем массив продуктов:
            if (hasChanges) {
                let newProductsArr = [];
                for (let i in this.products) {
                    if (!this.products[i].isDeleted) {
                        newProductsArr.push(this.products[i]);
                    }
                }

                this.products = newProductsArr;
            }

            return this.products;
        }

        deleteProducts()
        {
            for (let i in this.products) {
                this.products[i].deleteProduct();
            }

            this.products = [];
        }

        deleteProduct(id)
        {
            id = parseInt(id);
            let products = this.getProducts();
            for (let i in products) {
                if (parseInt(products[i].id) === id) {
                    products[i].deleteProduct();
                }
            }

            this.getProducts();
        }

        setSettings(settings) {
            console.log('Устанавливаем настройки ProductCartProductsBlock');
            this.settings = settings;

            let products = this.getProducts();
            for (let i in products) {
                products[i].render();
            }
        }

        deleteProductFromCart(id)
        {

        }

        getProductBlockByProductId(productId)
        {
            console.log('this.products:', this.products);
            console.log('productId:', productId);
            for (let i in (this.products)) {
                if (this.products[i].id === productId) {
                    return this.products[i];
                }
            }

            return null;
        }
    }

    class ProductCartProductsBlockProduct {
        id;
        title;
        image;
        count;
        price;
        productBlock;

        isDeleted = false;

        block;
        countInput;

        constructor(id, title, image, count, price, productBlock) {
            this.id = id;
            this.title = title;
            this.image = image;
            this.count = count;
            this.price = price;
            this.productBlock = productBlock;
        }

        getSumm()
        {
            return this.block ?
                (this.price * this.getCount()) :
                0;
        }

        deleteBlock()
        {
            if (this.block) {
                this.block.remove();
                this.block = null;
            }
        }

        // Цвет шрифта блока товаров
        getProductFontColor()
        {
            let defaultValue = '#000';
            try {
                if (this.productBlock.settings.product_block_font_color) {
                    return this.productBlock.settings.product_block_font_color;
                }
            } catch (e) {}

            return defaultValue;
        }

        // Цвет рамки количества товара
        getQuantityBorderColor()
        {
            let defaultValue = '#f15a29';
            try {
                if (this.productBlock.settings.product_block_quantity_border_color) {
                    return this.productBlock.settings.product_block_quantity_border_color;
                }
            } catch (e) {}

            return defaultValue;
        }

        // Кнопка уменьшения количества товара
        getMinusButtonImage()
        {
            let defaultValue = '/img/minus.svg';
            try {
                if (this.productBlock.settings.product_block_minus_button) {
                    return this.productBlock.settings.product_block_minus_button;
                }
            } catch (e) {}

            return defaultValue;
        }

        // Кнопка увеличения количества товара
        getPlusButtonImage()
        {
            let defaultValue = '/img/plus.svg';
            try {
                if (this.productBlock.settings.product_block_plus_button) {
                    return this.productBlock.settings.product_block_plus_button;
                }
            } catch (e) {}

            return defaultValue;
        }

        render() {
            this.deleteBlock();
            if (!this.getCount()) {
                return;
            }
            if (this.isDeleted) {
                return;
            }

            let template = `
                <div class="cart-row productBlock" data-id="${this.id}">
                    <div class="cart-item">
                        <div class="cart-item__image">
                            <img src="${this.image}" alt="alt" class="mCS_img_loaded productBlockImage">
                        </div>
                        <div class="cart-item__content">
                            <div class="cart-item__head productBlockTitle" style="color: ${this.getProductFontColor()};">${this.title}</div>
                            <div class="cart-item__content-bottom">
                                <div class="cart-nav">
                                    <div class="quantity">
                                        <input class="cartProductBlockProductCountInput" type="number" min="1" max="9" step="1" value="${this.count}" style="border-color: ${this.getQuantityBorderColor()};">
                                        <div class="quantity-nav">
                                            <div class="quantity-button quantity-up cartPlus" style="background: url(${this.getPlusButtonImage()}) no-repeat center center;"></div>
                                            <div class="quantity-button quantity-down cartMinus" style="background: url(${this.getMinusButtonImage()}) no-repeat center center;"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="cart-item__price productBlockPrice">${this.price}р.</div>
                                <div class="cart-item__delete" onclick="deleteFromCart('${this.id}');"></div>
                            </div>
                        </div>
                    </div>
                </div>
            `;
            this.productBlock.productBlockElement.innerHTML += template;

            this.block = this.productBlock.productBlockElement.querySelector(`.productBlock[data-id="${this.id}"]`);
            this.countInput = this.block.querySelector(`.cartProductBlockProductCountInput`);

            this.setListeners();
        }

        setListeners()
        {
            let self = this;

            this.countInput.addEventListener('change', function(e){
                self.countInputChange();
            });

            this.block.querySelectorAll('.cartPlus').forEach(function(el){
                el.addEventListener('click', function(e){
                    self.plusButtonClick();
                });
            });

            this.block.querySelectorAll('.cartMinus').forEach(function(el){
                el.addEventListener('click', function(e){
                    self.minusButtonClick();
                });
            });
        }

        plusButtonClick()
        {
            this.countInput.value = this.getCount() + 1;
            this.countInputChange();
        }

        minusButtonClick()
        {
            this.countInput.value = this.getCount() - 1;
            this.countInputChange();
        }

        countInputChange()
        {
            let newValue = parseInt(this.countInput.value);
            this.setCount(newValue);
        }

        setCount(newCount)
        {
            newCount = parseInt(newCount);
            if (newCount < 1 || this.isDeleted) {
                this.count = 0;
                return this.deleteProduct();
            }

            this.count = newCount;
        }

        getCount()
        {
            this.count = parseInt(this.count);
            if (this.count < 1) {
                this.isDeleted = true;
                this.setCount(0);
            }

            if (this.isDeleted) {
                this.setCount(0);
            }

            return this.isDeleted ? 0 : parseInt(this.count);
        }

        deleteProduct()
        {
            this.deleteBlock();
            this.isDeleted = true;
        }
    }

    class CartProduct
    {
        id;
        title;
        image;
        count;
        price;
        productBlock;

        cart;

        isDeleted = false;

        constructor(id, count, title, image, price, cart) {
            console.log('новый товар');
            this.id = id;
            this.title = title;
            this.image = image;
            this.count = count;
            this.price = price;
            this.cart = cart;

            if (!title || !image || !price) {
                this.fetchDataById()
            }

            console.log('новый товар');
        }

        fetchDataById()
        {
            let self = this;
            fetch(`{!! route('getProductData') !!}/${this.id}`)
                .then(response => response.json())
                .then(function(data) {
                    console.log('Получили продукт ' + self.id)
                    console.log(data)
                    if (data.error) {
                        return console.error(data.error);
                    }

                    self.render();
                })
                .catch(error => console.error(error));
        }

        getBlock()
        {
            if (!this.productBlock) {
                this.productBlock = this.cart.getProductBlock(this.id);
            }

            console.log('this.productBlock:', this.productBlock);

            return this.productBlock;
        }

        delete()
        {

        }

        render()
        {
            this.getBlock().render();
        }
    }

</script>
