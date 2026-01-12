@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="https://nova-blog.com/android-chrome-192x192.png" style="width: 50px; height: 50px;" class="logo" alt="Novablog Logo">
@else
{!! $slot !!}
@endif
</a>
</td>
</tr>
