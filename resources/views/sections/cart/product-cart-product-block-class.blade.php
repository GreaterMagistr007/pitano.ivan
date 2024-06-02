<script>
    class ProductCartProductsBlock {
        productBlockElement;
        settings;
        products = [];


        constructor(productBlockElement) {
            this.productBlockElement = productBlockElement;
            this.loadProductsFromLocalStorage();
        }

        setSettings(settings) {
            console.log('Устанавливаем настройки ProductCartProductsBlock');
            this.settings = settings;

            // let products = this.getProducts();
            // for (let i in products) {
            //     products[i].render();
            // }
        }

        loadProductsFromLocalStorage()
        {
            if (localStorage.getItem('Cart')) {
                this.clearProductBlock();
                let products = JSON.parse(localStorage.getItem('Cart'));

                this.products = [];
                for (let id in products) {
                    this.products.push(
                        new ProductCartProductsBlockProduct(
                            id,
                            products[id].title,
                            products[id].image,
                            products[id].count,
                            products[id].price,
                            this
                        )
                    )
                }

                console.log(this.products);

                for (let i in this.products) {
                    this.products[i].render();
                }
            }
        }

        getProductBlock()
        {
            let cartContent = document.querySelector('#mCSB_2_container');
            if(!cartContent){
                cartContent =document.querySelector('.cart-content')
            }

            return cartContent;
        }

        clearProductBlock()
        {
            this.getProductBlock().innerHTML = '';
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

        getBlock()
        {
            if (!this.block) {
                this.block = this.productBlock.productBlockElement.querySelector(`.productBlock[data-id="${this.id}"]`);
            }

            return this.block;
        }

        getCountInput()
        {
            if (!this.countInput) {
                this.countInput = this.getBlock().querySelector('.cartProductBlockProductCountInput');
            }

            return this.countInput;
        }

        render() {
            console.log('Рендерим продукт');
            console.log(this);


            this.deleteBlock();
            if (!this.getCount()) {
                console.log('!this.getCount()');
                return;
            }
            if (this.isDeleted) {
                console.log('this.isDeleted');
                return;
            }

            this.block = create_element('div', this.productBlock.getProductBlock());
            this.block.classList.add('cart-row','productBlock');
            this.block.setAttribute('data-id', this.id);

            let template = `
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
            `;

            this.block.innerHTML = template;

            // this.productBlock.getProductBlock().innerHTML += template;

            console.log('this.productBlock.productBlockElement:');
            console.log(this.productBlock.productBlockElement);

            // this.block = this.productBlock.productBlockElement.querySelector(`.productBlock[data-id="${this.id}"]`);
            // this.countInput = this.getBlock().querySelector(`.cartProductBlockProductCountInput`);

            console.log('this.block:', this.getBlock());

            this.setListeners();
        }

        setListeners()
        {
            let self = this;

            this.getCountInput().addEventListener('change', function(e){
                self.countInputChange();
            });

            this.getBlock().querySelectorAll('.cartPlus').forEach(function(el){
                el.addEventListener('click', function(e){
                    self.plusButtonClick();
                });
            });

            this.getBlock().querySelectorAll('.cartMinus').forEach(function(el){
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
