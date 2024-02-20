<div>
    <style>
        /* carousel */
        .media-carousel {
            margin-bottom: 0;
            padding: 0 40px 30px 40px;
            margin-top: 30px;
        }

        /* Previous button  */
        .media-carousel .carousel-control.left {
            left: -12px;
            background-image: none;
            background: none repeat scroll 0 0 #222222;
            border: 4px solid #FFFFFF;
            border-radius: 23px 23px 23px 23px;
            height: 40px;
            width: 40px;
            margin-top: 30px
        }

        /* Next button  */
        .media-carousel .carousel-control.right {
            right: -12px !important;
            background-image: none;
            background: none repeat scroll 0 0 #222222;
            border: 4px solid #FFFFFF;
            border-radius: 23px 23px 23px 23px;
            height: 40px;
            width: 40px;
            margin-top: 30px
        }

        /* Changes the position of the indicators */
        .media-carousel .carousel-indicators {
            right: 50%;
            top: auto;
            bottom: 0px;
            margin-right: -19px;
        }

        /* Changes the colour of the indicators */
        .media-carousel .carousel-indicators li {
            background: #c0c0c0;
        }

        .media-carousel .carousel-indicators .active {
            background: #333333;
        }

        .media-carousel img {
            width: 250px;
            height: 100px
        }

        /* End carousel */
    </style>
    <div class="page-wrapper">
        <div class="cart shopping">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="block">
                            <div class="product-list">
                                <form method="post">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="">Item Name</th>
                                                <th class="">Crust</th>
                                                <th class="">Crust Options</th>
                                                <th class="">Item Price</th>
                                                <th class="">Actions</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($cartItems as $item)
                                                <tr class="">
                                                    <td class="">
                                                        <div class="product-info">
                                                            <img width="80"
                                                                src="{{ asset('pizza_images/' . $item->pizza->image) }}"
                                                                alt="" />
                                                            <a href="#!">{{ $item->pizza->name }}</a>
                                                        </div>
                                                    </td>

                                                    <td>
                                                        @foreach ($crusts as $item2)
                                                            @if ($item2->id == $item->crust_option_id)
                                                            <img width="40"
                                                                src="{{ asset('crust_images/' . $item2->image) }}"
                                                                alt="" />
                                                                {{ $item2->name }}
                                                            @endif
                                                        @endforeach

                                                    </td>
                                                    <td>
                                                        <select class="form-control form-select">
                                                            <option value="">Select Crust</option>
                                                            @foreach ($crusts as $c)
                                                                <option value="{{ $c->id }}">{{ $c->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        <button type="button" style="width: 20" wire:click="updateCartItem({{ $item->id }}, $event.target.previousElementSibling.value)" class="btn pull-right ms-4">Update</button>
                                                    </td>

                                                    <td class="">${{ $item->pizza->price }}</td>
                                                    <td class="">
                                                        <button type="button" style="border: none ; background: none"
                                                            wire:click="removeFromCart({{ $item->id }})"
                                                            class="text-danger">Remove</button>
                                                    </td>
                                                    <td>
                                                    </td>
                                                </tr>
                                            @endforeach

                                            <tr>
                                                <td colspan="4"><b>Addons</b></td>
                                            </tr>

                                            @foreach ($cartAddons as $item)
                                                <tr class="">
                                                    <td class="">
                                                        <div class="product-info">
                                                            <img width="80" height="100"
                                                                src="{{ asset('cold_drink_images/' . $item->coldDrink->image) }}"
                                                                alt="" />
                                                            <a href="#!">{{ $item->coldDrink->name }} -
                                                                {{ $item->coldDrink->size }}</a>
                                                        </div>
                                                    </td>
                                                    <td class="">${{ $item->coldDrink->price }}</td>

                                                    <td>
                                                        <button type="button" style="border: none ; background: none"
                                                            wire:click="removeAddonsFromCart({{ $item->id }})"
                                                            class="text-danger">Remove</button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <p>Total Amount: ${{ $this->calculateTotalAmount() }}</p>

                                    <a href="{{ route('checkout') }}" class="btn btn-main pull-right ms-4">Checkout</a>
                                </form>


                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <div class="container">
                <div class="row">
                    <h4>Add Cold Drinks</h4>
                </div>
                <div class='row'>
                    <div class='col-md-12'>
                        <div class="carousel slide media-carousel" id="media">
                            <div class="carousel-inner">

                                <div class="item  active">
                                    <div class="row">

                                        @foreach ($cold as $item)
                                            <div class="col-md-4">
                                                <button type="button" wire:click="addToCartAddon({{ $item->id }})"
                                                    type="button" class="thumbnail" href="#"><img alt=""
                                                        src="{{ asset('cold_drink_images/' . $item->image) }}"></button>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                            </div>
                            <a data-slide="prev" href="#media" class="left carousel-control">‹</a>
                            <a data-slide="next" href="#media" class="right carousel-control">›</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('livewire:load', function () {

        Livewire.on('itemremoved', function () {
            alert('Item Removed from Cart');
        });
        Livewire.on('addonremoved', function () {
            alert('Addon Removed from Cart');
        });
    });
</script>
</div>

