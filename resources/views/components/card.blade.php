<div {{ $attributes->merge(['class' => 'bg-gray-50 border border-gray-200 rounded p-6'])
}}>
    {{-- to have closing tag --}}
    {{$slot}}
</div>