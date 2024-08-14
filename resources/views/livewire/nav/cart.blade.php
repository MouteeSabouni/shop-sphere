<a href="/user/cart">
    <div class="flex flex-col items-center w-[60px]">
        <div class="relative">
            <img src="/images/button-icons/cart.svg" class="w-[33px] h-[33px]" />
            <div class="absolute bottom-[13.5px] right-[6px] text-center text-[12.5px] font-semibold text-white h-[18px] w-[18px]">
                {{ auth()->user()->itemsInCart() }}
            </div>
        </div>
        <div class="text-xs font-medium -mt-0.5">
            ${{ auth()->user()->cartTotal() }}
        </div>
    </div>
</a>
