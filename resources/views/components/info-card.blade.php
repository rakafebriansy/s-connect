@props(['href', 'icon', 'color', 'title'])

<a href="{{ $href }}"
    class="flex items-center gap-4 p-4 bg-white rounded-xl shadow hover:shadow-lg transition duration-300 text-center">
    <div class="text-3xl text-{{ $color }}-600">{{ $icon }}</div>
    <h2 class="text-xl font-semibold text-{{ $color }}-600">{{ $title }}</h2>
</a>
