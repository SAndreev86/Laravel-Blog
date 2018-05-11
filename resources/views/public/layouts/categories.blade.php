<div class="card my-4">
    @if($categories->count())
        <h5 class="card-header">Категории</h5>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6">
                    <ul class="list-unstyled mb-0">
                        @include('public.layouts.categories_list', [
                            'categories' => $categories,
                            'delimiter' => ''
                        ])
                    </ul>
                </div>
            </div>
        </div>
    @endif
</div>