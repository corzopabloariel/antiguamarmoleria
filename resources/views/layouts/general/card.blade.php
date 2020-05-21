<div class="mt-2">
    <div class="card-columns" id="wrapper-tabla"></div>
    @isset( $paginate )
    <div class="mt-5 d-flex flex-wrap justify-content-center">
        {{ $paginate->links() }}
    </div>
    @endisset
</div>