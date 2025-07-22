<div class="d-flex flex-wrap gap-4" x-data="postModal">

    @foreach($posts as $post)
        <livewire:post-card :post="$post" />
    @endforeach

</div>
