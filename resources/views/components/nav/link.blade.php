@props(['active' => false])

<a
    class="{{ $active ? 'bg-gray-200 rounded-xl px-3 py-2 font-bold': 'hover:scale-110'}} font-medium text-sm py-2"
    aria-current = "{{ $active ? 'page': 'false'}}"
    {{ $attributes }}
    >{{$slot}}
</a>
