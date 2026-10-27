@if ($errors->any())
    <?php 
        $bag = $errors->getBag('default')
    ?>
    @if ($bag->has("$slot"))
        <span class="alert-error">{{$bag->first("$slot")}}</span>
    @endif
@endif