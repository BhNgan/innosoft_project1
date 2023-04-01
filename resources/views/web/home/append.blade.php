<!-- ########## Carousel Append AXIOS -->

@forelse ($products as $product)
<div class="carousel-cell col-9 col-md-6 col-lg-4 mx-3 mx-md-0 py-2">
    @include('web.card.product-carousel')
</div>
@empty

@endforelse