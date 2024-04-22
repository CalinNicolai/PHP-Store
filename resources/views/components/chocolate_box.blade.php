<div class="box">
    <div class="img-box">
        <img src="{{ $chocolate['image_url'] }}" alt="{{ $chocolate['name'] }}">
    </div>
    <div class="detail-box">
        <h6>{{ $chocolate['name'] }}</h6>
        <h5>${{ $chocolate['price'] }}</h5>
        <a href="#"
           onclick="event.preventDefault(); document.getElementById('add-to-cart-{{$chocolate['id']}}').submit();">
            ADD TO CART
        </a>
        <form id="add-to-cart-{{$chocolate['id']}}" action="{{route('cart.add')}}" method="POST">
            @csrf
            <input type="hidden" name="product_id" value="{{ $chocolate['id'] }}">
        </form>
    </div>
</div>
