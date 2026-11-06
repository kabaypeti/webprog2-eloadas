@isset ($feedback)
    @if ($feedback["$slot"] !== null)
        <span class="alert-ok" style="padding-top:2px;padding-bottom:2px">{{$feedback["$slot"]}}</span>
    @endif
@endisset