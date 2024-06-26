@props(['name'])

@if ($name === 'down-arrow')
<svg {{ $attributes(['class' => 'transform -rotate-90']) }} width="22" height="22" viewbox="0 0 22 22">
    <g fill="none" fill-rule="evenodd">
       <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="m21 1v20.16h.84v1z">
       </path>
       <path fill="#222"
             d="m13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z"></path>
    </g>
    </svg>
@endif
