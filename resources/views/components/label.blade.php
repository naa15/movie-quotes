@props(['name'])

<label class="block mb-2 uppercase font-bold text-sm text-black mt-6" for="{{ $name }}">
    {{ ucwords($name) }}
</label>