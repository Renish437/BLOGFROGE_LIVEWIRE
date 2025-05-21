    @props(['author','size'])
    @php
        $imageSize= match ($size ?? null){
        'xs' => 'w-7 h-7',
        'sm' => 'w-8 h-8',
        'md' => 'w-10 h-10',
        'lg' => 'w-12 h-12',
        'xl' => 'w-16 h-16',
        '2xl' => 'w-20 h-20',
        default => 'w-10 h-10',
        };
    $textSize= match ($size ?? null){
        'xs' => 'text-xs',
        'sm' => 'text-sm',
        'md' => 'text-md',
        'lg' => 'text-lg',
        'xl' => 'text-xl',
        '2xl' => 'text-2xl',
        default => 'text-base',
    };
    @endphp
    <img class="{{ $imageSize }} rounded-full mr-3"
        src="{{ $author->profile_photo_url }}"
        alt="{{ $author->name }}">
    <span class="mr-1 {{ $textSize }} dark:text-gray-100">{{ $author->name }}</span>