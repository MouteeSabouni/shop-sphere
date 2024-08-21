<x-layouts.app>
    @if(auth()->user()->sellerRequest()->count() === 1)
        <div class="flex flex-col items-center my-10 mx-20 font-medium">
            <span class="text-2xl">Thank you for submitting the form.</span>
            <span class="text-2xl pt-1 pb-6">We will contact you soon once we review it.</span>
            <span>If you would like to change something or cancel your request, please feel free to reach out.</span>
        </div>
    @else
        <div class="flex items-center mx-20 my-10">
            <div class="flex flex-col w-1/2 mx-auto">
                <span class="font-bold text-[1.35rem]">Thank you for your interest in selling with us!</span>
                <span class="font-medium pt-1">Please read the instructions carefully to fill out the form.</span>

                <div class="text-sm space-y-1 mt-4 mb-6">
                    <li>
                        <span class="font-medium">Full name:</span>
                        <span>write your full name as it is on your passport.</span>
                    </li>
                    <li>
                        <span class="font-medium">Email address:</span>
                        <span>this will be the main contact method.</span>
                    </li>
                    <li>
                        <span class="font-medium">Phone number:</span>
                        <span>enter country code followed by 9-digit number.</span>
                    </li>
                    <span class="pl-5 text-blue-700">(e.g., +1XXXXXXXXXX only)</span>
                    <li>
                        <span class="font-medium">Business name:</span>
                        <span>tell us your business name if you have any.</span>
                    </li>
                    <li>
                        <span class="font-medium">Social links:</span>
                        <span>You may enter one link or multiple links separated by a comma.</span>
                    </li>
                    <span class="pl-5 text-blue-700">(e.g., https://twitter.com/username, https://facebook.com/username)</span>
                    <li>
                        <span class="font-medium">Products:</span>
                        <span>Enter your products and/or categories names separated by a comma.</span>
                    </li>
                    <span class="pl-5 text-blue-700">(e.g., Electronics, iPhone 15, mobile phones, clothes, etc.)</span>
                </div>

                @error('photos.*') <span class="error">{{ $message }}</span> @enderror

                @if ($errors->any())
                    <div class="alert alert-danger text-sm text-red-600 font-medium">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </div>
                @endif
            </div>

            <form class="w-3/5 mx-auto py-10 border rounded-xl px-10" action="/become-seller" method="POST">
                @csrf

                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="relative z-0 w-full mb-5 mt-2">
                        <input type="text" value="{{old('name')}}" name="name" placeholder=" " required
                        @class([
                            'block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer',
                            'border-b-[0.01rem] border-gray-300' => $errors->missing('name'),
                            'border-b-2 border-red-600' => $errors->has('name'),
                        ])
                    />
                        <label for="name" class="peer-focus:font-medium absolute text-sm {{ $errors->has('name') ? 'text-red-600 font-medium' : 'text-gray-500' }} duration-300 transform -translate-y-7 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-7">
                            Full name
                        </label>
                    </div>

                    <div class="relative z-0 w-full mb-5 mt-2">
                        <input type="email" value="{{old('email')}}" name="email" placeholder=" " required
                        @class([
                            'block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer',
                            'border-b-[0.01rem] border-gray-300' => $errors->missing('email'),
                            'border-b-2 border-red-600' => $errors->has('email'),
                        ])
                    />
                        <label for="email" class="peer-focus:font-medium absolute text-sm {{ $errors->has('email') ? 'text-red-600 font-medium' : 'text-gray-500' }} duration-300 transform -translate-y-7 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-7">
                            Email address
                        </label>
                    </div>
                </div>

                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="relative z-0 w-full mb-5 mt-2">
                        <input type="text" value="{{old('number')}}" name="number" placeholder=" " required
                        @class([
                            'block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer',
                            'border-b-[0.01rem] border-gray-300' => $errors->missing('number'),
                            'border-b-2 border-red-600' => $errors->has('number'),
                        ])
                    />
                        <label for="number" class="peer-focus:font-medium absolute text-sm {{ $errors->has('number') ? 'text-red-600 font-medium' : 'text-gray-500' }} duration-300 transform -translate-y-7 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-7">
                            Phone number
                        </label>
                    </div>

                    <div class="relative z-0 w-full mb-5 mt-2">
                        <input type="text" value="{{old('business_name')}}" name="business_name" placeholder=" " required
                        @class([
                            'block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer',
                            'border-b-[0.01rem] border-gray-300' => $errors->missing('business_name'),
                            'border-b-2 border-red-600' => $errors->has('business_name'),
                        ])
                    />
                        <label for="business_name" class="peer-focus:font-medium absolute text-sm {{ $errors->has('business_name') ? 'text-red-600 font-medium' : 'text-gray-500' }} duration-300 transform -translate-y-7 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-7">
                            Business name (if applicable)
                        </label>
                    </div>
                </div>

                <div class="relative z-0 w-full mb-7">
                    <input type="text" value="{{old('social_links')}}" name="social_links" placeholder=" " required
                    @class([
                        'block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer',
                        'border-b-[0.01rem] border-gray-300' => $errors->missing('social_links'),
                        'border-b-2 border-red-600' => $errors->has('social_links'),
                    ])
                />
                    <label for="social_links" class="peer-focus:font-medium absolute text-sm {{ $errors->has('social_links') ? 'text-red-600 font-medium' : 'text-gray-500' }} duration-300 transform -translate-y-7 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-7">
                        Social links (optional)
                    </label>
                </div>

                <div class="relative z-0 w-full mb-5">
                    <input type="text" value="{{old('products')}}" name="products" placeholder=" " required
                    @class([
                        'block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer',
                        'border-b-[0.01rem] border-gray-300' => $errors->missing('products'),
                        'border-b-2 border-red-600' => $errors->has('products'),
                    ])
                />
                    <label for="products" class="peer-focus:font-medium absolute text-sm {{ $errors->has('products') ? 'text-red-600 font-medium' : 'text-gray-500' }} duration-300 transform -translate-y-7 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-7">
                        Products
                    </label>
                </div>

                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-1.5 text-center">Submit</button>
            </form>
        </div>
    @endif
</x-layouts.app>
