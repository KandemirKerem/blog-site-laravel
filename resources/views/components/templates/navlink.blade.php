@props(['active' => false])
<a class="hover:text-base {{ $active ? 'text-base' : '' }}" {{ $attributes }} >{{$slot}}</a>
