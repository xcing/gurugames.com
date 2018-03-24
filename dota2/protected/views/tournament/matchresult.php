<script type="text/javascript">
    function checkValue() {
        var raceWon = $('#raceWon:checked').val();
        var screenshotValue = $('#screenshotValue').val();

        if (raceWon == 1 && screenshotValue == '') {
            alert('กรุณาใส่ภาพตารางคะแนนตอนจบด้วยครับ');
        }
        else {
            document.forms["matchResultForm"].submit();
        }
    }
    $(document).ready(function() {
        $('input[type=radio]').change(function() {
            if ($("#freeWon:checked").val() == '0') {
                $('#screenshotContainer').hide();
            }
            if ($("#raceWon:checked").val() == '1') {
                $('#screenshotContainer').show();
            }
        });
    });
</script>
<div class="content page1">
    <div class="container_24">
        <div class="grid_5">
            <?php $this->renderPartial('leftside'); ?>
        </div>
        <div class="grid_19" style="padding-left:30px;">
            <h2>
                แจ้งผลการแข่งขัน
                <?php if ($amount > 1) { ?>
                    เกมที่ <?= $game; ?>
                <?php } ?>
            </h2>
            <?php if ($canResult) { ?>
                <form method="POST" id="matchResultForm">
                    <input type="hidden" name="matchId" value="<?= $matchId; ?>"/>
                    <input type="hidden" name="game" value="<?= $game; ?>"/>
                    <input type="hidden" name="amount" value="<?= $amount; ?>"/>
                    <input type="hidden" name="isFinalRound" value="<?= $isFinalRound; ?>"/> 
                    <div>
                        <input type="radio" name="MatchResult[type]" id="raceWon" value="1" checked/> แข่งชนะ 
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="MatchResult[type]" id="freeWon" value="0" /> ชนะบาย
                    </div>
                    <div id="screenshotContainer" style="margin-top:20px;">
                        ภาพตารางคะแนนตอนจบ<input type="text" name="MatchResult[screenshot]" id="screenshotValue" style="width:100%;"/>
                    </div>
                    <div style="margin-top:20px;">
                        <input type="button" class="btn btn-primary" value="submit" onclick="checkValue();"/>
                    </div>
                </form>
            <?php } else { ?>
                <div>สามารถแจ้งผลการแข่งได้หลังจากเวลา 20:30 ของวันที่แข่งเท่านั้น</div>
            <?php } ?>
        </div>
    </div>
</div>