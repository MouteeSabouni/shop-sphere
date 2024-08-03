@props(['active' => false])

<a
    class="{{ $active ? 'border-b-[3px] border-blue-600 roudned-xl px-2 py-2 font-bold': 'hover:font-bold hover:scale-110 font-medium'}} text-sm py-2"
    aria-current = "{{ $active ? 'page': 'false'}}"
    {{ $attributes }}
    >{{$slot}}
</a>
