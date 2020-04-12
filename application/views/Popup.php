
<div class="container">
    <h2>Pop Up Change</h2>
    <div>
        <div class="form-check tooltip-custome">
            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="type1">
            <label class="form-check-label" for="exampleRadios1">
                type1
            </label>
            <span class="tooltiptext-custome">
                type1
                <div class="down-arrow"></div>
            </span>
        </div>
    </div>
    <div>
        <div class="form-check tooltip-custome">
            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="type2">
            <label class="form-check-label" for="exampleRadios2">
                type2
            </label>
            <span class="tooltiptext-custome">
                type2
                <div class="down-arrow"></div>
            </span>
        </div>
    </div>
    <a href=<?=base_url('result')?>>
        <button type="button" class="btn btn-primary save-result" disabled>Save</button>
    </a>
</div>
<script>
    $('.form-check').mouseover(function() {
        $('.form-check-input').attr('checked', false);
        $(this).find('.form-check-input').attr('checked', true);
        $('.save-result').attr('disabled', true);
    });
    $('.form-check').mouseleave(function() {
        $('.save-result').attr('disabled', false);
        localStorage.save_res = $(this).find('.form-check-input').attr('value');
        console.log($(this).find('.form-check-input').attr('value'))
    });
</script>