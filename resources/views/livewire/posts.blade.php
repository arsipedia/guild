<div>
    <div wire:poll.30s>
        @foreach($posts as $post)
            <div class="mt-6">
                <div class="max-w-4xl px-10 py-6 bg-white border border-gray-100 rounded-lg shadow-sm">
                    <div class="flex items-center justify-between"><span
                            class="font-light text-gray-600">{{ $post->created_at->format('h:m - d/ M/Y') }}</span>
                    </div>
                    <div class="mt-2">
                        <p class="mt-2 text-gray-600">
                            {!! Markdown::convertToHtml($post->body) !!}
                        </p>
                    </div>
                    <div class="flex items-center justify-between mt-4">
                        <div>
                            @if(auth()->user()->id === $post->user_id)
                                <a wire:click.prevent="delete({{ $post->id }})" role="button" href="#"
                                    class="text-red-500 hover:underline">Delete
                                </a>
                            @endif
                        </div>
                        <div>
                            <a class="flex items-center"><img
                                    src="{{ $post->user->profile_photo_url }}"
                                    alt="avatar"
                                    class="hidden object-cover w-10 h-10 mx-4 rounded-full sm:block">
                                <h1 class="font-bold text-gray-700 hover:underline">{{ $post->user->name }}</h1>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<script type="text/javascript">
    window.onscroll = function(ev) {
        if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
            window.livewire.emit('load-more');
        }
    };
</script>
