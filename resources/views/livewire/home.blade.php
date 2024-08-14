<div>
    <x-home.header />

    <x-home.top-rated-products :$topRatedSkus />

    <x-home.categorized-products :$electronicsSkus :$wearingSkus />

    <x-home.user-testimonials :$testimonies />

    <x-home.contact />
</div>
