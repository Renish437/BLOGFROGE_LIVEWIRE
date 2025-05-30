    @props(['post'])
    <div class="mt-10 comments-box border-t border-gray-100 dark:text-gray-100 pt-10" wire:keydown.enter="postComment">
                <h2 class="text-2xl font-semibold text-gray-900 dark:text-gray-100 mb-5">Discussions</h2>
                @auth
                <textarea
                wire:model.live="comment"
                    class="w-full rounded-lg p-4 bg-gray-50 focus:outline-none text-sm text-gray-700 dark:text-gray-500 border-gray-200 placeholder:text-gray-400"
                    cols="30" rows="7"></textarea>
                    @error('comment')
                        <div class="text-sm text-red-500">{{ $message }}</div>
                        
                    @enderror
                <button
                    wire:click="postComment()"
                    class="mt-3 inline-flex items-center justify-center h-10 px-4 font-medium tracking-wide text-white dark:text-gray-100 transition duration-200 bg-gray-900 rounded-lg hover:bg-gray-800 focus:shadow-outline focus:outline-none">
                    Post Comment
                </button>
                 @else
               <a wire:navigate class="text-purple-500 dark:text-gray-100 underline py-1" href="{{ route('login') }}"> Login to Post Comments</a> 
 
               @endauth
                <div class="user-comments px-3 py-2 mt-5">
                    @forelse ($this->comments as $comment)
                        
                    <div class="comment [&:not(:last-child)]:border-b border-gray-100 py-5">
                        <div class="user-meta flex mb-4 text-sm items-center">
                            {{-- <img class="w-7 h-7 rounded-full mr-3" src="{{ $comment->user->profile_photo_url }}" alt="mn">
                            <span class="mr-1">{{ $comment->user->name }}</span> --}}
                            <x-posts.author :author="$comment->user" size="sm"/>
                            <span class="text-gray-500 dark:text-gray-100">. {{ $comment->created_at->diffForHumans() }}</span>
                        </div>
                        <div class="text-justify text-gray-700  dark:text-gray-100 text-sm">
                            {{ $comment->comment }}
                        </div>
                       
                    </div>
                    @empty 

                    <div class="text-gray-500 text-center">
                          <span class="text-gray-500 dark:text-gray-100"> No Comments Posted</span>
                      </div> 
                    @endforelse
                    
                </div>
                <div class="my-2">
                     {{ $this->comments->links() }}
                </div>
            </div>