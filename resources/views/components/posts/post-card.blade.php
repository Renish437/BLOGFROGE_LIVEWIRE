       @props(['post'])
       <div >
                            <a href="#">
                                <div>
                                    <img class="w-full rounded-xl"
                                        src="{{ $post->image }}" alt="">
                                </div>  
                            </a>
                            <div class="mt-3">
                                <div class="flex items-center mb-2">
                                    <a href="#" class="bg-red-500 
                                        text-white 
                                        rounded-xl px-3 py-1 text-sm mr-3">
                                        Laravel
                                    </a>
                                    <p class="text-gray-500 text-sm">{{ $post->published_at }}</p>
                                </div>
                                <a href="#" class="text-xl font-bold text-gray-900 dark:text-gray-100">{{ $post->title }} #34</a>
                            </div>

                        </div>