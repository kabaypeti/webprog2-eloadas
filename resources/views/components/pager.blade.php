<div class="col-6">
    <?php
    ?>
    <div class="row aln-center">
        <div class="col-2 aln-center">
            <form method="GET">
                <input type="hidden" name="page" value="{{ $page - 1 }}"/>
                <input type="hidden" name="per_page" value="{{ $perpage }}"/>
                <button type="submit" class="material-symbols-outlined page-btn" @if ($page <= 1) disabled @endif>
                    arrow_back
                </button>
            </form>
        </div>
        <div class="col-2 aln-center">
            <h3 class="page-txt">{{ $page }}/{{ $maxpages }}</h3>
        </div>
        <div class="col-2 aln-center">
            <form method="GET">
                <input type="hidden" name="page" value="{{ $page + 1 }}"/>
                <input type="hidden" name="per_page" value="{{ $perpage }}"/>
                <button type="submit" class="material-symbols-outlined page-btn" @if ($page >= $maxpages) disabled @endif>arrow_forward</button>
            </form>
        </div>
    </div>
</div>