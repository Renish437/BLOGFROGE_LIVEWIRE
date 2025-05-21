 <div   id="recommended-topics-box gap-3">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 gap-3 mb-3">Recommended Topics</h3>
                  <div class="flex gap-2 flex-wrap">
                      @foreach ($categories as $category)
                        
                    <div class="topics flex flex-wrap  gap-3 justify-start">
                          <x-posts.category-badge :category="$category" />
                    </div>
                    @endforeach
                  </div>
                </div>