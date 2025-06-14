@props(['active'])

<a {{ $attributes->merge([
    'style' => $active ? '' : 'color: #999; text-decoration: none;'
]) }}>
    {{ $slot }}
</a>
