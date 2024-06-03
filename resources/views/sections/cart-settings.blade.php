<?php
/**
 * В этом файле получаем настройки корзины и применяем их
 */
?>

<style>
    /** Блок товаров */
    .cart-row.productBlock .productBlockTitle {
        color: {!! $Cart->product_block_font_color !!};
    }
    .cart-row.productBlock .cart-item__content-bottom .quantity input {
        border-color: {!! $Cart->product_block_quantity_border_color !!};
    }
    .cart-row.productBlock .cart-item__content-bottom .quantity-up {
        background: url("{!! $Cart->product_block_plus_button !!}");
    }
    .cart-row.productBlock .cart-item__content-bottom .quantity-down {
        background: url("{!! $Cart->product_block_minus_button !!}");
    }
</style>

<style>
    /** Блок способа доставки / самовывоза */
    form.order .order-head .samovivoz_selector_in_cart_block {
        color: {!! $Cart->tab_font_color !!};
    }
    form.order .order-row label.form-small__label {
        color: {!! $Cart->field_title_font_color !!};
    }
</style>

<style>
    /** Блок десерта */
    form.order .order-row.productBlock.cartDessertBlock .productBlockTitle {
        color: {!! $Cart->desert_block_product_title_font_color !!};
    }
    form.order .order-row.productBlock.cartDessertBlock .card__content-text_content {
        color: {!! $Cart->desert_block_product_description_font_color !!};
    }
    form.order .order-row.productBlock.cartDessertBlock .productBlockPrice {
        color: {!! $Cart->desert_block_product_price_font_color !!};
        background: url("{!! $Cart->desert_block_product_price_background_image !!}") no-repeat center center;
        background-size: contain;
    }
</style>

<style>
    /** Общие настройки: */
    form.order .deliveryError {
        color: {!! $Cart->error_font_color !!};
    }
    form.order .order-toggler {
        color: {!! $Cart->block_title_font_color !!};
    }
    form.order .btn-promo {
        background-color: {!! $Cart->active_button_background_color !!};
        border: 1px solid {!! $Cart->active_button_background_color !!};
    }
    form.order .payment-choose input + label {
        background-color: {!! $Cart->inactive_button_background_color !!};
        color: {!! $Cart->inactive_button_font_color !!}
    }
    form.order .payment-choose input:checked + label {
        background-color: {!! $Cart->active_button_background_color !!};
        color: {!! $Cart->active_button_font_color !!}
    }
</style>


<script>

</script>
