@props(['name'])

<x-label name="{{ $name }}" />

<textarea class="border border-gray-200 p-2 w-full rounded" type="text" name="{{ $name }}"
    id="{{ $name }}" required>{{ $slot ?? old($name) }}</textarea>
<x-error name="{{ $name }}" />
