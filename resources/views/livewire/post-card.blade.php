<div class="card w-25">
    <div class="card-body d-flex flex-column">
        <h5 class="card-title" x-on:click="showModal({{$post->id}})" style="cursor: pointer;">{{ $post->title }}</h5>
        <p class="card-text" id="card-text-{{$post->id}}" x-init="loadDescription({{$post->body}})"></p>

        <a class="mt-auto link link-secondary" x-on:click="showModal({{$post->id}})">Читать подробнее</a>
    </div>

    <div
        class="modal fade"
        style="background: rgba(0, 0, 0, 0.2)" id="modal-{{$post->id}}"
        :class="openPostId == {{$post->id}} ? 'show d-block' : '' "
        x-transition
        x-on:mousedown.self="() => {closeModal(); editing = false;}"
        x-data='editorModal({{$post->id}}, @json($post->body) )' x-init="initEditor(postData)"
    >
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body" wire:ignore>

                    <h3 class="mb-3">{{ $post->title }}</h3>

                    <div class="post-body p-2" id="post-body-{{$post->id}}" x-show="!editing" x-on:click="editing = true"></div>

                    <div class="editor" x-show="editing">
                        <div class="post-editor" id="post-editor-{{$post->id}}"></div>
                    </div>

                    <div class="d-flex gap-2">
                        <button class="btn btn-primary mt-3" x-on:click="updatePost" x-show="editing">Сохранить</button>
                        <button class="btn btn-secondary mt-3" x-on:click="editing = false" x-show="editing">Отмена</button>
                        <button class="btn btn-primary mt-3" x-on:click="editing = true" x-show="!editing">Редактировать</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
