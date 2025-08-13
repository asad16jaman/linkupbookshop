@forelse($wish['products'] as $wish)
          <li class="list-group-item bg-transparent d-flex justify-content-between lh-sm">
            <div>
            <h5 style="font-size:16px">
            <a href="index.html">{{ $wish->book->name }}</a>
            </h5>
            <small>{{ $wish->book->author }}<small>
            <div class="d-flex justify-content-between">
              <form action="{{ route('updateWishList', ['id' => $wish->id]) }}" method="post">
              @csrf
              <input type="submit" value="Remove" class="fw-medium text-capitalize mt-2"
              style="bckground:red">
              </form>

              <a type="button" onclick="addToCard({{ $wish->id }})" style="font-size:16px" class="d-block fw-medium text-capitalize mt-2">Add to cart</a>
            </div>

            </div>
            <span class="text-primary">${{ $wish->book->price }}</span>
          </li>

          @empty

          <li class="list-group-item bg-transparent d-flex justify-content-between lh-sm">
            <div>
            <h5 style="font-size:16px">
            <a type="p">No Product Found</a>
            </h5>

          </li>

          @endforelse