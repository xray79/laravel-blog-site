@props(['name'])

<x-form.field>
    <label class="block mb-2 uppercase font-bold text-xs text-gray-700 "
    for="{{ $name }}"
    >
        {{ ucwords($name) }}
    </label>

    <textarea class="border border-gray-200 rounded p-2 w-full" type="text" name="{{ $name }}" id="{{ $name }}" required>{{ $slot ?? old($name) }}</textarea>

    <x-form.error name="{{ $name }}" />
</x-form.field>