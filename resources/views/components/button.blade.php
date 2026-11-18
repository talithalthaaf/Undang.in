@props(['type' => 'submit'])

<button type="{{ $type }}" {{ $attributes->class(['btn-primary']) }}>
    {{ $slot }}
</button>