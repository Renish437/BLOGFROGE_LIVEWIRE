  <button wire:loading.attr="disabled"  wire:click="toggleLike()" class="flex items-center">



       
        <div class="dot-spinner" wire:loading.delay wire:target="toggleLike" >
    <div class="dot-spinner__dot"></div>
    <div class="dot-spinner__dot"></div>
    <div class="dot-spinner__dot"></div>
    <div class="dot-spinner__dot"></div>
    <div class="dot-spinner__dot"></div>
    <div class="dot-spinner__dot"></div>
    <div class="dot-spinner__dot"></div>
    <div class="dot-spinner__dot"></div>
</div>
    


                                           
@if(!Auth::user()->likes()->where('post_id', $post->id)->exists())
   <svg wire:loading.delay.remove wire:target="toggleLike"  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
</svg>
@else
       <svg wire:loading.delay.remove wire:target="toggleLike" 
     class="w-6 h-6 text-red-600 "
     xmlns="http://www.w3.org/2000/svg" 
     viewBox="0 0 24 24" 
     fill="currentColor">
  <path d="M11.645 20.91a.75.75 0 01-.704 0c-.13-.07-.383-.219-.383-.219a25.18 25.18 0 01-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0112 5.052 5.5 5.5 0 0116.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.18 25.18 0 01-4.244 3.17c-.13.07-.383.219-.383.219z"/>
</svg> 

@endif
                                           


                                                <span class="text-gray-600 dark:text-gray-100 ml-2">
                                                    {{ $post->likes->count() }}
                                                </span>
                                            </button>   