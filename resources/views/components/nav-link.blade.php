@props(['active' => false])

<a
    class="{{ $active ? 'font-bold scale-110 underline font-bold': 'hover:font-bold hover:scale-110 font-medium'}} text-sm py-2"
    aria-current = "{{ $active ? 'page': 'false'}}"
    {{ $attributes }}
    >{{$slot}}
</a>
