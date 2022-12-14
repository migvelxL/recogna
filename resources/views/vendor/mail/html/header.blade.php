<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<p> Recogna </p>
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
